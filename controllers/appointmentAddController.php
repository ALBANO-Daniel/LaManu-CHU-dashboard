<?php
require_once(__DIR__ . '/../config/config.php');
require_once(__DIR__ . '/../helpers/functions/Database.php');
require_once(__DIR__ . '/../models/Appointment.php');
require_once(__DIR__ . '/../models/Patient.php');

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

        //===================== date : Nettoyage et validation =======================
        $date = trim(filter_input(INPUT_POST, 'date', FILTER_SANITIZE_SPECIAL_CHARS));


        if (!empty($birthdate)) {
            $test = filter_var($birthdate, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_DATE . '/')));
            if (!$test) {
                $error["birthdate"] = "La date n'est pas au bon format!!";
            }
        } else {
            $error["birthdate"] = "La date de naissance est obligatoire!!";
        }

        //===================== hour : Nettoyage et validation =======================
        $hour = trim(filter_input(INPUT_POST, 'hour', FILTER_SANITIZE_SPECIAL_CHARS));

        if (empty($hour)) {
            $error["hour"] = "Vous devez choisir une horaire!";
        } else {
            $isOk = filter_var($hour, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_HOUR . '/')));
            if (!$isOk) {
                $error["lastname"] = "Le nom n'est pas au bon format!!";
            } else {
                if (strlen($lastname) <= 1 || strlen($lastname) >= 70) {
                    $error["lastname"] = "La longueur du nom n'est pas bon";
                }
            }
        }

        $dateHour = $date . ' ' . $hour . ':00';

        $appointment = new Appointment;
        $appointment->setDateHour($dateHour);
        $appointment->setIdPatient($patientId);
        $isAdded = $appointment->add();
        if ($isAdded != false) {
            SessionFlash::set(true,'Le rendez-vous a bien etais ajoute');
        } else {
            SessionFlash::set(false,'Le rendez-vous n\'as pas etais ajoute!');
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