<?php

require_once(__DIR__ . '/../models/Patient.php');

if(isset($_GET['deleteid']))
{
    $patientDeletedId = intval(filter_input(INPUT_GET, 'deleteid', FILTER_SANITIZE_NUMBER_INT));
    Patient::delete($patientDeletedId);
    SessionFlash::set(true,'Patient suprime avec sucess!');
} 
else { SessionFlash::set(false,'Impossible de effacer le patient!'); }

header('Location: /patientlist');
exit;


