import React from "react";
import { Route, Switch } from "react-router-dom";
import Dashboard from "./views/dashboard";
import SelfTest from "./views/selftest";
import Languages from "./views/languages";
import Fences from "./views/fences";

const AppRoutes = [
    { name: "Dashboard", path: "/" },
    { name: "Selftest", path: "/selftest" },
    { name: "Fences", path: "/fences" },
    {
        name: "Configure",
        colapse: true,
        paths: [{ name: "Languages", path: "/languages" }],
    },
];

function DashRoutes() {
    return (
        <Switch>
            <Route path="/" exact component={Dashboard} />
            <Route path="/selftest" component={SelfTest} />
            <Route path="/languages" component={Languages} />
            <Route path="/fences" component={Fences} />
        </Switch>
    );
}

export { AppRoutes, DashRoutes };
