import React from "react";
import {
    Divider,
    Drawer,
    IconButton,
    List,
    ListItem,
    ListItemText,
    makeStyles,
} from "@material-ui/core";
import ChevronRightIcon from "@material-ui/icons/ChevronRight";
import { AppRoutes } from "../route";
import { useHistory, useRouteMatch } from "react-router-dom";

const drawerWidth = 240;

const useStyles = makeStyles((theme) => ({
    drawer: {
        width: drawerWidth,
        flexShrink: 0,
    },
    drawerPaper: {
        width: drawerWidth,
    },
    drawerHeader: {
        display: "flex",
        alignItems: "center",
        padding: theme.spacing(0, 1),
        // necessary for content to be below app bar
        ...theme.mixins.toolbar,
        justifyContent: "flex-end",
    },
}));

const DrawerLink = ({ label, to, activeOnlyWhenExact }) => {
    const history = useHistory();
    let match = useRouteMatch({
        path: to,
        exact: activeOnlyWhenExact,
    });
    return (
        <ListItem
            button
            onClick={() => {
                history.push(to);
            }}
            selected={match != null}
        >
            <ListItemText primary={label} />
        </ListItem>
    );
};

export default function AppDrawer({ handleDrawerClose, open }) {
    const classes = useStyles();

    return (
        <Drawer
            className={classes.drawer}
            variant="persistent"
            anchor="left"
            open={open}
            classes={{
                paper: classes.drawerPaper,
            }}
        >
            <div className={classes.drawerHeader}>
                <IconButton onClick={() => handleDrawerClose()}>
                    <ChevronRightIcon />
                </IconButton>
            </div>
            <Divider />
            <List>
                {AppRoutes.map((route, index) => (
                    <DrawerLink
                        label={route.name}
                        to={route.path}
                        key={index}
                        activeOnlyWhenExact={true}
                    />
                ))}
            </List>
        </Drawer>
    );
}
