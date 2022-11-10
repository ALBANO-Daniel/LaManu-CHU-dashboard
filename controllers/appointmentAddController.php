<?php
require_once(__DIR__ . '/../config/config.php');
require_once(__DIR__ . '/../helpers/functions/Database.php');
require_once(__DIR__ . '/../models/Appointment.php');

if(empty($_GET)){
    SessionFlash::set(false,'Merci de choisir une patient pour aditioner une rendez-vous.');
    header('location: /patientlist'); exit;
}

$patientId = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

$patient = Patient::getOne($patientId);

try {
    $error = [];
    $addedPatientId = '';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        //===================== firstname : Nettoyage et validation =======================
        $firstname = trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS));
        if (empty($firstname)) {
            $error['firstname'] = "Vous devez entrer un prenom!!";
        } else {
            $isOk = filter_var($firstname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NO_NUMBER . '/')));
            if (!$isOk) {
                $error['firstname'] = 'Le prenom n\'est pas au bon format!!';
            } else {
                if (strlen($firstname) <= 1 || strlen($firstname) >= 70) {
                    $error['firstname'] = "La longueur du prenom n'est pas bon";
                }
            }
        }

        //===================== lastname : Nettoyage et validation =======================
        $lastname = trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS));
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
    }
} catch (\Throwable $th) {
    SessionFlash::set(false,$th);
    header("Location: /error404"); exit;
}


include(__DIR__ . '/../views/templates/header.php');

include(__DIR__ . '/../views/templates/navBar.php');

include(__DIR__ . '/../views/appointmentAdd.php');

include(__DIR__ . '/../views/templates/footer.php');