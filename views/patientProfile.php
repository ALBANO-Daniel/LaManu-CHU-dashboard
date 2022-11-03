<?php
$patientProfileId = $_GET['profilepatient'] ?? 'no profile to be showned';
$patientToBeDeleted = $_GET['deletepatient'] ?? 'dont delete me';

?>


<main class="container">
    <div class="card container">
        <?= 'id : ' . $patientProfileId ?>
        <br>
        <?= 'delete : ' . $patientToBeDeleted ?>

        <h1 class="row">profil patient</h1>
        <ul class="row">
            <li class="col s6">Prenom : </li>
            <li class="col s6">Nom : </li>
            <li class="col s6">Date naissance : </li>
            <li class="col s6">Telephone : </li>
            <li class="col s6"></li>
        </ul>
    </div>
    <a href="/">finish edition</a>
</main>