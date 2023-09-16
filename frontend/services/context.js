import React, { createContext, useContext, useEffect, useState } from "react";
import api from "./axios";
import jwt from "jwt-decode";
import cogoToast from "cogo-toast";
import Router from "next/router";
import { getCookieFromBrowser, removeCookie, setCookie } from "./cookies";

const ServiceApiContext = createContext({});

export const ServiceApiProvider = ({ children }) => {
    const [user, setUser] = useState(null);
    const [loading, setLoading] = useState(true);

    useEffect(() => {
        async function loadUserFromCookies() {
            const token = getCookieFromBrowser("token");
            if (token) {
                try {
                    api.defaults.headers.Authorization = `Bearer ${token}`;
                    const userData = jwt(token);
                    const { data: user } = await api.get(`/user`);
                    if (user) setUser(user);
                } catch (e) {
                    if (401 === e.response.status) {
                        removeCookie("token");
                        setUser(null);
                        cogoToast.error("Session expiré, veuillez vous reconnecter");
                    }
                }
            }
            setLoading(false);
        }
        loadUserFromCookies();
    }, []);

    const login = async (email, password) => {
        const { data: response } = await api.post("/login", {
            email,
            password
        });
        if (!response.return) {
            cogoToast.error(response.result.message);
            return false
        }
        const token = response.authorisation.token;
        if (token) {
            setCookie("token", token);
            api.defaults.headers.Authorization = `Bearer ${token}`;
            const userData = jwt(token);
            const { data: user } = await api.get(`/user`);
            setUser(user);
            await Router.push("/");
        }
    };

    const logout = () => {
        removeCookie("token");
        setUser(null);
        Router.push("/");
    };

    return (
        <ServiceApiContext.Provider
            value={{
                isAuthenticated: !!user,
                user,
                login,
                loading,
                logout
            }}
        >
            {children}
        </ServiceApiContext.Provider>
    );
};

export default function useAuth() {
    return useContext(ServiceApiContext);
}
