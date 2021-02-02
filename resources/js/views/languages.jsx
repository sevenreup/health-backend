import React, { useState, useEffect, Fragment } from "react";
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
import CloseIcon from "@material-ui/icons/Close";
import CountryLanguage from "country-language";
import { Formik } from "formik";
import Autocomplete from "@material-ui/lab/Autocomplete";
import api from "../api";
import AlertDialog from "../components/AlertDialog";
import DeleteIcon from "@material-ui/icons/Delete";

const malawiLanguages = {
    ny: {
        code: "ny",
        name: "Chichewa",
    },
    tn: {
        code: "tn",
        name: "Tonga",
    },
};

const useStyles = makeStyles((theme) => ({
    closeButton: {
        position: "absolute",
        right: theme.spacing(1),
        top: theme.spacing(1),
        color: theme.palette.grey[500],
    },
}));

const CreateLanguage = ({ handleClose, open, hashed }) => {
    const [countryList, setCountryList] = useState([]);
    const [country, setCountry] = useState({});
    let languageNames = new Intl.DisplayNames(["en"], { type: "language" });
    const classes = useStyles();

    useEffect(() => {
        setCountryList(CountryLanguage.getCountries());
    }, []);

    return (
        <Dialog
            aria-labelledby="customized-dialog-title"
            open={open}
            fullWidth
            maxWidth="md"
        >
            <DialogTitle>
                <Typography>Add new language</Typography>
                <IconButton
                    aria-label="close"
                    onClick={handleClose}
                    className={classes.closeButton}
                >
                    <CloseIcon />
                </IconButton>
            </DialogTitle>
            <DialogContent dividers>
                <Formik
                    initialValues={{
                        country: "",
                        language: "",
                        languageName: "",
                        code_2: "",
                        code_3: "",
                    }}
                    onSubmit={(values) => {
                        data.push(values);
                        console.log(values);
                        handleClose();
                    }}
                >
                    {({
                        handleSubmit,
                        handleChange,
                        handleBlur,
                        values,
                        touched,
                        isValid,
                        errors,
                        setFieldValue,
                    }) => (
                        <form onSubmit={handleSubmit}>
                            <FormControl fullWidth>
                                <Autocomplete
                                    id="country-select-demo"
                                    options={countryList}
                                    autoHighlight
                                    fullWidth
                                    onChange={(event, newValue) => {
                                        console.log(event);
                                        console.log(newValue);
                                        setCountry(newValue);
                                    }}
                                    getOptionLabel={(option) => option.name}
                                    renderOption={(option) => (
                                        <React.Fragment>
                                            {option.name}
                                        </React.Fragment>
                                    )}
                                    renderInput={(params) => (
                                        <TextField
                                            {...params}
                                            label="Choose a country"
                                            variant="outlined"
                                            inputProps={{
                                                ...params.inputProps,
                                                autoComplete: "new-password", // disable autocomplete and autofill
                                            }}
                                        />
                                    )}
                                />
                            </FormControl>
                            <Box m={4} />
                            {country && country.languages ? (
                                <TextField
                                    id="outlined-select-currency"
                                    select
                                    label="Select"
                                    name="language"
                                    fullWidth
                                    helperText="Please select your currency"
                                    variant="outlined"
                                    value={values.language}
                                    onChange={handleChange}
                                >
                                    {country.code_2 == "MW"
                                        ? Object.values(malawiLanguages).map(
                                              ({ code, name }, index) => {
                                                  if (
                                                      !hashed.includes(
                                                          `MW/${code}`
                                                      )
                                                  )
                                                      return (
                                                          <MenuItem
                                                              key={index}
                                                              value={code}
                                                          >
                                                              {name}
                                                          </MenuItem>
                                                      );
                                              }
                                          )
                                        : country.languages.map(
                                              (language, index) => {
                                                  if (
                                                      !hashed.includes(
                                                          `${language.code_2}/${language.language}`
                                                      )
                                                  )
                                                      return (
                                                          <MenuItem
                                                              key={index}
                                                              value={language}
                                                          >
                                                              {languageNames.of(
                                                                  language
                                                              )}
                                                          </MenuItem>
                                                      );
                                              }
                                          )}
                                </TextField>
                            ) : (
                                <p>
                                    no languages available choose a valid
                                    country
                                </p>
                            )}
                            <Box m={4} />
                            <Button
                                color="primary"
                                variant="contained"
                                fullWidth
                                type="submit"
                                onClick={() => {
                                    setFieldValue("country", country.name);
                                    setFieldValue("code_2", country.code_2);
                                    setFieldValue("code_3", country.code_3);
                                    if (country.code_2 == "MW")
                                        setFieldValue(
                                            "languageName",
                                            malawiLanguages[values.language]
                                                .name
                                        );
                                    else
                                        setFieldValue(
                                            "languageName",
                                            languageNames.of(values.language)
                                        );
                                }}
                            >
                                Submit
                            </Button>
                        </form>
                    )}
                </Formik>
            </DialogContent>
        </Dialog>
    );
};

export default function Languages() {
    const [open, setOpen] = useState(false);
    const [loading, setLoading] = useState(false);
    const [openDelete, setOpenDelete] = useState(false);
    const [languageData, setLanguageData] = useState([]);
    const [languageDataHash, setLanguageDataHash] = useState([]);
    const [deleteL, setDeleteL] = useState();

    const handleClickOpen = () => {
        setOpen(true);
    };
    const handleClose = () => {
        setOpen(false);
    };
    const deleteLanguage = () => {
        setLoading(true);
        api({
            url: `language/${deleteL.id}`,
            method: "DELETE",
        })
            .then(({ data }) => {
                setLoading(false);
                if (deleteL.index != -1) {
                    const copy = languageData;
                    copy.slice(deleteL.index);

                    setLanguageData(copy);
                }
            })
            .catch((err) => {
                console.log(err);
                setLoading(false);
            });
    };

    useEffect(() => {
        setLoading(true);

        api({
            url: "language",
            method: "GET",
        })
            .then(({ data }) => {
                setLanguageData(data.data);
                setLoading(false);

                const temp = data.data.map(
                    (lang) => `${lang.code_2}/${lang.language}`
                );
                console.log(temp);
                setLanguageDataHash(temp);
            })
            .catch((err) => {
                console.log(err);
                setLoading(false);
            });
    }, []);

    return (
        <div className="container">
            <TableContainer component={Paper}>
                <Toolbar>
                    <span style={{ flexGrow: 1 }}></span>
                    <IconButton onClick={handleClickOpen}>
                        <AddCircleIcon />
                    </IconButton>
                </Toolbar>
                {loading && <LinearProgress />}
                <Table>
                    <TableHead>
                        <TableRow>
                            <TableCell>Country</TableCell>
                            <TableCell>Country ISO</TableCell>
                            <TableCell>Language Name</TableCell>
                            <TableCell>Language</TableCell>
                            <TableCell></TableCell>
                        </TableRow>
                    </TableHead>
                    <TableBody>
                        {languageData.map((language, index) => (
                            <TableRow key={index}>
                                <TableCell>{language.country}</TableCell>
                                <TableCell>
                                    {language.code_2} / {language.code_3}
                                </TableCell>
                                <TableCell>{language.languageName}</TableCell>
                                <TableCell>{language.language}</TableCell>
                                <TableCell>
                                    <IconButton
                                        onClick={() => {
                                            setDeleteL({ language, index });
                                            setOpenDelete(true);
                                        }}
                                    >
                                        <DeleteIcon />
                                    </IconButton>
                                </TableCell>
                            </TableRow>
                        ))}
                    </TableBody>
                </Table>
            </TableContainer>
            <CreateLanguage open={open} handleClose={handleClose} hashed={languageDataHash}/>
            <AlertDialog
                title="Do you want to delete this language?"
                description="This action cannot be undone.."
                handleClose={() => {
                    setOpenDelete(false);
                }}
                open={openDelete}
                agree={deleteLanguage}
            />
        </div>
    );
}
