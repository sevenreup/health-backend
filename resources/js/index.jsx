import React from "react";
import { render } from "react-dom";
import { AppBar, Toolbar } from '@material-ui/core';

function App() {
    return <div className="container">
        <AppBar>
            <Toolbar>
                
            </Toolbar>
        </AppBar>
    </div>;
}

document.addEventListener("DOMContentLoaded", () => {
    render(<App />, document.getElementById("app"));
});
