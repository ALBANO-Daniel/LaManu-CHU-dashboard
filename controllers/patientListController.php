<?php

require_once(__DIR__ . '/../models/Patient.php');


// set-up how many lines/elements to be showed per page
$elementsPerPage = ELEMENTS_PER_PAGE;

// set-up number of showed pages in pagination component(pages sequence UI)
$pagesPerPagination = 5;

$halfPagesPerPagination = intval($pagesPerPagination / 2);
$halfUpPagesPerPagination = ceil($pagesPerPagination / 2);


// get number of elements  $patientListPagesTotal 
$search = '';
$totalElements = Patient::getTotalNumberOf();

// setup patient list total number of pages
$totalPages = intval(ceil($totalElements / $elementsPerPage));


// show actual page 
$page = intval(filter_input(INPUT_GET, 'page', FILTER_SANITIZE_NUMBER_INT));
$page = $page == 0 ? 1 : $page;

// get all patients info for the actual page
$patientList = Patient::getAll($page, $elementsPerPage, $search);


include(__DIR__ . '/../views/templates/header.php');

include(__DIR__ . '/../views/templates/navBar.php');

include(__DIR__ . '/../views/patientList.php');

include(__DIR__ . '/../views/templates/footer.php');