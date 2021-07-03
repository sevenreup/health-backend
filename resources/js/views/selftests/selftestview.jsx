import React, { useEffect, useState } from "react";
import TreeView from "@material-ui/lab/TreeView";
import ExpandMoreIcon from "@material-ui/icons/ExpandMore";
import ChevronRightIcon from "@material-ui/icons/ChevronRight";
import {
    Select,
    Typography,
    MenuItem,
    makeStyles,
    IconButton,
    Dialog,
    Button,
    DialogActions,
    DialogContent,
} from "@material-ui/core";
import { StyledTreeItem } from "../../components/TreeComponent";
import AddCircleIcon from "@material-ui/icons/AddCircle";

const data = {
    languages: [
        { name: "en", data: { title: "", subtitle: "", type: 2, node: "" } },
    ],
};

const newTestTemplate = {
    name: "",
    data: { title: "", subtitle: "" },
};

const availableLanguages = [
    {
        id: 1,
        country: "United States of America",
        language: "en",
        language3: "eng",
        languageName: "English",
        code_2: "US",
        code_3: "USA",
    },
    {
        id: 2,
        country: "Malawi",
        language: "ny",
        language3: "nya",
        languageName: "Chichewa",
        code_2: "MW",
        code_3: "MWI",
    },
];

const useTestNodeStyles = makeStyles((theme) => ({
    labelRoot: {
        display: "flex",
        alignItems: "center",
        justifyContent: "space-between",
        padding: theme.spacing(0.5, 0),
    },
    flex: {
        flex: 1,
    },
}));

export default function SelfTestView() {
    const [open, setOpen] = useState(false);
    const [testData, setTestDta] = useState({ languages: [] });
    const [newLanguage, setNewLanguage] = useState("");
    const classes = useTestNodeStyles();

    useEffect(() => {
        setTestDta(data);
    }, []);

    const handleLanguageChange = (event) => {
        console.log(event);
        setNewLanguage(event.target.value);
    };

    const onAddNewLanguage = () => {
        setOpen(false);
        const copy = testData;
        const test = newTestTemplate;
        test.name = newLanguage;
        copy.languages.push(test);
        setTestDta(copy);
    };

    const renderNode = (node, index) => (
        <StyledTreeItem
            label={node.name}
            key={index}
            nodeId={`${index}_language`}
        >
            <StyledTreeItem label="Title" nodeId={`${index}_title`} />
            <StyledTreeItem label="subtitle" nodeId={`${index}_subtitle`} />
            <StyledTreeItem
                nodeId={`${index}_type`}
                label={
                    <div className={classes.labelRoot}>
                        <Typography className={classes.flex}>Type</Typography>
                        <Select className={classes.flex}>
                            <MenuItem value="22">Multiple choice</MenuItem>
                        </Select>
                    </div>
                }
            />
        </StyledTreeItem>
    );
    return (
        <div>
            <TreeView
                defaultCollapseIcon={<ExpandMoreIcon />}
                defaultExpandIcon={<ChevronRightIcon />}
            >
                {testData.languages.map((node, index) =>
                    renderNode(node, index)
                )}
                <StyledTreeItem
                    nodeId="add_new"
                    label={
                        <IconButton onClick={() => setOpen(true)}>
                            <AddCircleIcon />
                        </IconButton>
                    }
                />
            </TreeView>
            <Dialog
                open={open}
                fullWidth
                maxWidth="xs"
                disableBackdropClick
                disableEscapeKeyDown
            >
                <DialogContent>
                    <Select
                        fullWidth
                        autoFocus
                        value={newLanguage}
                        onChange={handleLanguageChange}
                    >
                        {availableLanguages.map((lang, index) => (
                            <MenuItem key={index} value={lang.language}>
                                {`${lang.languageName} (${lang.code_2}/${lang.language})`}
                            </MenuItem>
                        ))}
                    </Select>
                </DialogContent>
                <DialogActions>
                    <Button onClick={() => setOpen(false)} color="primary">
                        Cancel
                    </Button>
                    <Button color="primary" onClick={onAddNewLanguage}>
                        Ok
                    </Button>
                </DialogActions>
            </Dialog>
        </div>
    );
}
