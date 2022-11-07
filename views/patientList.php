<?php
require_once(__DIR__ . '/../models/Patient.php');

// setup patient list total number of pages
$patientListPagesTotal = Patient::getTotalNumberOf();
if($patientListPagesTotal%8 == 0){
    $patientListPagesTotal = intval($patientListPagesTotal/8) - 1;
} else {
    $patientListPagesTotal = intval($patientListPagesTotal/8);
}

// show actual page 
$patientListPagesActual = $_GET['page'] ?? 0;

// get all patients info for the actual page
$patientList = Patient::getAll($patientListPagesActual);

?>

<main class="container">
    <br>
    <br>
    <?= 'delete : ' . $_GET['deleteid'] ?>
    <br>
    <br>
    <div class="card center">
        <div class="row">
            <div class="col s6 m6">
                <a class="white-text" href='/patientadd'>
                    <div class="card light-blue darken-4">
                        <div class="center card-content">
                            <span class="card-title"><i class="material-icons">account_circle</i></span>
                            <p>Ajouter un Patient</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col s6 m6">
                <a class="white-text" href='/appointmentadd'>
                    <div class="card light-blue darken-4">
                        <div class="center card-content">
                            <span class="card-title"><i class="material-icons">access_time</i></span>
                            <p>Ajouter un Rendez-vous</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <section class="listPatient">
            <h3 class="">Patient List</h3>
            <!-- patient list  -->
            <?php
            foreach ($patientList as $patient) { ?>
                <div class="card row">
                    <div class="col s11 m5"><?= $patient->firstname ?></div><span class="s1 m1"><a href="/patientprofile?id=<?= $patient->id ?>"><i class="material-icons">person</i></a></span>
                    <div class="col s11 m5"><?= strtoupper($patient->lastname) ?></div><span class="s1 m1"><a href="/?deleteid=<?= $patient->id ?>"><i class="material-icons red-text">delete_forever</i></a></span>
                </div>
            <?php } ?>
            <!-- pagination list  -->
            <ul class="row pagination">
                <li class="waves-effect"><a href="?page=<?= $patientListPagesActual - 1 ?>"><i class="material-icons">chevron_left</i></a></li>

                <?php

                for ($i = 0; $i < $patientListPagesTotal+1 ; $i++) { ?>
                    <li class="<?= $patientListPagesActual == $i ? 'active' : 'waves-effect' ?>">
                        <a href="?page=<?= $i ?>"><?= $i + 1?></a>
                    </li>
                <?php } ?>


                <li class="waves-effect"><a href="?page=<?= $patientListPagesActual + 1 ?>"><i class="material-icons">chevron_right</i></a></li>
            </ul>
        </section>
    </div>

</main>