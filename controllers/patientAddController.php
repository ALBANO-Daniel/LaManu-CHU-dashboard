<?php
require_once(__DIR__ . '/../helpers/functions/Database.php');
require_once(__DIR__ . '/../models/Patient.php');


// fisrt time it loads, tehre is a GET method, because tehre is a Form? or because is php archive... ?
// once is submited with data the form request  will enteder the IF statement:
if ($_Server['request_method'] == 'POST') {

    // netoyage et validation DATA
    // lastname, firstname, birthdate, email, phone
    
    // add a new if to test error 

    if (empty($error)) {
        try {

            $patient = new Patient();
            $patient->setFirstname($fistname);
            $patient->setLastName($lastname);
            $patient->setBirthdate($birthdate);
            $patient->setPhone($phone);
            $patient->setEmail($email);

            // $patient->add()  // this resquest data on DBase

            $isAddedPatient = $patient->add();  //  true||false   if  false manage error ...   // e.g. if user exists allready... 
            
            

        } catch (PDOException $e) {
            die('ERREUR :' . $e->getMessage());
        };
    }
}



include(__DIR__ . '/../views/templates/header.php');

include(__DIR__ . '/../views/templates/navBar.php');

include(__DIR__ . '/../views/patientAdd.php');

include(__DIR__ . '/../views/templates/footer.php');
