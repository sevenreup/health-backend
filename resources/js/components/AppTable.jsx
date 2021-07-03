import React from "react";
import {
    Box,
    Table,
    TableContainer,
    Paper,
    IconButton,
    TableCell,
    TableHead,
    TableBody,
    TableRow,
    Toolbar,
    makeStyles,
    TextField,
    Dialog,
    DialogTitle,
    DialogContent,
    MenuItem,
    Button,
    LinearProgress,
    FormControl,
    Typography,
} from "@material-ui/core";
import AddCircleIcon from "@material-ui/icons/AddCircle";

export default function AppTable({
    headers,
    children,
    handleNewClick,
    loading,
}) {
    return (
        <TableContainer component={Paper}>
            <Toolbar>
                <span style={{ flexGrow: 1 }}></span>
                <IconButton onClick={handleNewClick}>
                    <AddCircleIcon />
                </IconButton>
            </Toolbar>
            {loading && <LinearProgress />}
            <Table>
                <TableHead>{headers}</TableHead>
                <TableBody>{children}</TableBody>
            </Table>
        </TableContainer>
    );
}
