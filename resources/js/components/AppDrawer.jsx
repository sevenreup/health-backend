import React, { Fragment, useState } from "react";
import {
    Collapse,
    Divider,
    Drawer,
    IconButton,
    List,
    ListItem,
    ListItemText,
    makeStyles,
} from "@material-ui/core";
import ChevronRightIcon from "@material-ui/icons/ChevronRight";
import ExpandLess from "@material-ui/icons/ExpandLess";
import ExpandMore from "@material-ui/icons/ExpandMore";
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

const DrawerCollapse = ({ label, paths }) => {
    const [open, setOpen] = useState(false);

    const handleClick = () => {
        setOpen(!open);
    };

    return (
        <Fragment>
            <ListItem button onClick={handleClick}>
                <ListItemText primary={label} />
                {open ? <ExpandLess /> : <ExpandMore />}
            </ListItem>
            <Collapse in={open} timeout="auto" unmountOnExit>
                <List component="div" disablePadding>
                    {paths.map((route, index) => (
                        <DrawerLink
                            label={route.name}
                            to={route.path}
                            key={index}
                            activeOnlyWhenExact={true}
                        />
                    ))}
                </List>
            </Collapse>
        </Fragment>
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
                {AppRoutes.map((route, index) => {
                    return route.colapse ? (
                        <DrawerCollapse
                            label={route.name}
                            paths={route.paths}
                            key={index}
                        />
                    ) : (
                        <DrawerLink
                            label={route.name}
                            to={route.path}
                            key={index}
                            activeOnlyWhenExact={true}
                        />
                    );
                })}
            </List>
        </Drawer>
    );
}
