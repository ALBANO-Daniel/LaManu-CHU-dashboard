<?php
require_once(__DIR__ . '/../helpers/functions/Database.php');
require_once(__DIR__ . '/../models/Patient.php');


// fisrt time it loads, tehre is a GET method, because tehre is a Form? or because is php archive... ?
// once is submited with data the form request  will enter the IF statement:
if ($_Server['request_method'] == 'POST') {

    // netoyage et validation DATA

    //email, add a test to test if user allready registered  if Patient::emailExist($email) --> $error

    // lastname, firstname, birthdate, email, phone
    
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
