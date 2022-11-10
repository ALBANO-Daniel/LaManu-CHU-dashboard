<?php

require_once( __DIR__ . '/../models/Appointment.php');

$id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

(Appointment::delete($id)) ? SessionFlash::set(true,'Rendez-vous suprime') : SessionFlash::set(false,'Rendez-vous pas suprime');

// get and redirect to last previous page
$urlstring = basename($_SERVER['HTTP_REFERER']);
header('location: /'. $urlstring); exit; 