<?php
require_once(__DIR__ . '/../config/config.php');
require_once(__DIR__ . '/../helpers/functions/Database.php');
require_once(__DIR__ . '/../models/Patient.php');


// fisrt time it loads, tehre is a GET method, because tehre is a Form? or because is php archive... ?
// once is submited with data the form request  will enter the IF statement:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //===================== firstname : Nettoyage et validation =======================
    $firstname = trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS));
    if (empty($firstname)) {
        $error["firstname"] = "Vous devez entrer un prenom!!";
    } else {
        $isOk = filter_var($lastname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NO_NUMBER . '/')));
        if (!$isOk) {
            $error["firstname"] = "Le prenom n'est pas au bon format!!";
        } else {
            if (strlen($firstname) <= 1 || strlen($firstname) >= 70) {
                $error["firstname"] = "La longueur du prenom n'est pas bon";
            }
        }
    }

    //===================== lastname : Nettoyage et validation =======================
    $lastname = trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS));
    if (empty($lastname)) {
        $error["lastname"] = "Vous devez entrer un nom!!";
    } else {
        $isOk = filter_var($lastname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NO_NUMBER . '/')));
        if (!$isOk) {
            $error["lastname"] = "Le nom n'est pas au bon format!!";
        } else {
            if (strlen($lastname) <= 1 || strlen($lastname) >= 70) {
                $error["lastname"] = "La longueur du nom n'est pas bon";
            }
        }
    }
    //===================== birthdate : Nettoyage et validation =======================
    $birthdate = trim(filter_input(INPUT_POST, 'birthdate', FILTER_SANITIZE_SPECIAL_CHARS));

    if (!empty($birthdate)) {
        $test = filter_var($email, FILTER_VALIDATE_EMAIL);
        if (!$test) {
            $error["birthdate"] = "La date n'est pas au bon format!!";
        }
    } else {
        $error["birthdate"] = "La date de naissance est obligatoire!!";
    }

    //===================== email : Nettoyage et validation =======================
    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
    if (!empty($email)) {
        $testEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
        if (!$testEmail) {
            $error["email"] = "L'adresse email n'est pas au bon format!!";
        }
    } else {
        $error["email"] = "L'adresse mail est obligatoire!!";
    }

    //===================== phone : Nettoyage et validation =======================
    $phone = trim(filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS));
    if (!empty($phone)) {
        $test = filter_var($phone, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_ONLY_NUMBER . '/')));
        if (!$test) {
            $error["phone"] = "Le telephone n'est pas au bon format!!";
        }
    } else {
        $error["phone"] = "Le telephone est obligatoire!!";
    }

    //email, add a test to test if user allready registered  if Patient::emailExist($email) --> $error

    // add a new 'if' to test error

    if (empty($error)) {
        try {
            $patient = new Patient();
            $patient->setFirstname($fistname);
            $patient->setLastName($lastname);
            $patient->setBirthdate($birthdate);
            $patient->setPhone($phone);
            $patient->setEmail($email);
            // a non-insertion will not be detected by PDOException...
            //...$isAdded serve to UX output the Sucess/fail to create $patient on DBase
            // manage error 'user allready exists' && 'something went wrong
            $isAddedPatient = $patient->add();
        } catch (PDOException $e) {
            $errorPdo = "ERREUR : " . $e->getMessage();
            //redirect to 404 with "generic error msg" and a "more" btn with $errorPdo
        };
    }
}

include(__DIR__ . '/../views/templates/header.php');

include(__DIR__ . '/../views/templates/navBar.php');

include(__DIR__ . '/../views/patientAdd.php');

include(__DIR__ . '/../views/templates/footer.php');
