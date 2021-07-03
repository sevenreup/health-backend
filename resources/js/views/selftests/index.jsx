import React from "react";
import { TableCell, TableRow } from "@material-ui/core";
import AppTable from "../../components/AppTable";
import { useHistory } from "react-router-dom";

const selftestes = [{ id: 1, title: "ass", active: true, date: "" }];

export default function SelfTestAll() {
    const history = useHistory();

    const onRowClick = (test) => {
        history.push(`/selftest/${test.id}`);
    };

    return (
        <div>
            <AppTable
                headers={
                    <TableRow>
                        <TableCell></TableCell>
                        <TableCell>Title</TableCell>
                        <TableCell>Date</TableCell>
                        <TableCell>Active</TableCell>
                    </TableRow>
                }
            >
                {selftestes.map((test, index) => (
                    <TableRow
                        key={index}
                        hover
                        onClick={() => onRowClick(test)}
                    >
                        <TableCell></TableCell>
                        <TableCell>{test.title}</TableCell>
                        <TableCell>{test.date}</TableCell>
                        <TableCell>{test.active + ""}</TableCell>
                    </TableRow>
                ))}
            </AppTable>
        </div>
    );
}
