<?php

require_once(__DIR__ . '/../models/Patient.php');
require_once(__DIR__ . '/../models/Appointment.php');



// set-up how many lines/elements to be showed per page
$elementsPerPage = 8;

// set-up number of showed pages in pagination component
$pagesPerPagination = 5;

$halfPagesPerPagination = intval($pagesPerPagination / 2);
$halfUpPagesPerPagination = ceil($pagesPerPagination / 2);



// get number of elements  $appointmentsListPagesTotal 
$totalElements = Appointment::getTotalNumberOf();
// setup patient list total number of pages
if ($totalElements % $elementsPerPage == 0) {
    $totalPages = intval($totalElements / 8) - 1;
} else {
    $totalPages = intval($totalElements / 8);
}

// show actual page 
$page = intval(filter_input(INPUT_GET, 'page', FILTER_SANITIZE_NUMBER_INT));
$appointmentListPagesActual = $page ?? 0;
// $currentPage = $_GET['page'] ?? 0;

// get all patients info for the actual page
$appointmentList = Appointment::getAll($appointmentListPagesActual, $elementsPerPage);



include(__DIR__ . '/../views/templates/header.php');

include(__DIR__ . '/../views/templates/navBar.php');

include(__DIR__ . '/../views/appointmentList.php');

include(__DIR__ . '/../views/templates/footer.php');