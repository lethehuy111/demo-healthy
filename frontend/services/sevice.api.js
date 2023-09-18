import api from "./axios";
import {getCookieFromBrowser } from "@/services/cookies";

const token = getCookieFromBrowser("token") ?? "";
api.defaults.headers.Authorization = `Bearer ${token}`;

export default {
    async get(url, params = {}) {
        try {
            const { data } = await api.get(url, { params });
            return data;
        } catch (error) {
            console.log(error)
        }
    },
}