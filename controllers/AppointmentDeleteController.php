<?php

require_once( __DIR__ . '/../models/Appointment.php');

$id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

(Appointment::delete($id)) ? SessionFlash::set('Rendez-vous suprimer') : SessionFlash::set('Rendez-vous pas suprime');


// need to delete from multiple views ( profile, list, patient profile rdv list )
// header("Location: $_SERVER['HTTP_REFERER'] ");

header('location: /appointmentlist'); exit; 
