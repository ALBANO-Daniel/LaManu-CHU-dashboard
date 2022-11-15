<?php

require_once(__DIR__ . '/../config/config.php');
require_once(__DIR__ . '/../helpers/functions/Database.php');
require_once(__DIR__ . '/../models/Patient.php');
require_once(__DIR__ . '/../models/Appointment.php');





include(__DIR__ . '/../views/templates/header.php');

include(__DIR__ . '/../views/templates/navBar.php');

include(__DIR__ . '/../views/patientAdd.php');

include(__DIR__ . '/../views/appointmentAdd.php');

include(__DIR__ . '/../views/templates/footer.php');
