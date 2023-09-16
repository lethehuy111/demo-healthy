import React, { useEffect } from "react";
import useAuth from "./context";
import { useRouter } from "next/router";

export function ProtectRoute(Component) {
    return () => {
        const { isAuthenticated, loading } = useAuth();
        const router = useRouter();

        useEffect(() => {
            if (!isAuthenticated && !loading) router.push("/login");
        }, [loading, isAuthenticated]);

        return <Component {...arguments} />;
    };
}
