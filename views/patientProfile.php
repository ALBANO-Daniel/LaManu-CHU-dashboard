<?php
$patientProfileId = $_GET['profilepatient'] ?? 'no profile to be showned';

?>


<main class="container">
    <div class="card container">
        <?= 'id : ' . $patientProfileId ?>
        <br>
        <?= 'delete : ' . $patientToBeDeleted ?>

        <h1 class="row">profil patient</h1>
        <ul class="row">
            <li class="col s6">Prenom : <?= $patient->prenom ?></li>
            <li class="col s6">Nom : <?= $patient->prenom ?></li>
            <li class="col s6">Date naissance : <?= $patient->prenom ?></li>
            <li class="col s6">Telephone : <?= $patient->prenom ?></li>
            <li class="col s6"></li>
        </ul>
    </div>
    <a href="/">finish edition</a>
</main>