<?php

$patientList[0]["id"] = 1;
$patientList[0]["firstname"] = 'Rogger';
$patientList[0]["lastname"] = 'Lecroix';
$patientList[0]["birthdate"] = '15 Mai 1981';
$patientList[0]["email"] = 'roggerthat@gmail.com';
$patientList[0]["cellphone"] = '0504932312';

$patientList[1]["id"] = 3;
$patientList[1]["firstname"] = 'Marie';
$patientList[1]["lastname"] = 'Souflet';
$patientList[1]["birthdate"] = '26 Aout 1951';
$patientList[1]["email"] = 'mariesouf@gmail.com';
$patientList[1]["cellphone"] = '0940393542';

$patientListPages = [0,1,2,3,4,5];

$patientListPagesActual = $_GET['page'];
?>

<main class="container">
    <div class="card center">

        <h1>Patient List</h1>
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
            <!-- patient list  -->
            <div class="row">
                <div class="col m2">Name</div>
                <div class="col m2">Surname</div>
                <div class="col m2">birthdate</div>
                <div class="col m3">email</div>
                <div class="col m2">cellphone</div>
                <div class="col m1">
                </div>
            </div>
            <?php
            foreach ($patientList as $key => $value) { ?>
                <div class="row">
                    <div class="col m2"><?= $patientList[$key]["firstname"] ?></div>
                    <div class="col m2"><?= $patientList[$key]["lastname"] ?></div>
                    <div class="col m2"><?= $patientList[$key]["birthdate"] ?></div>
                    <div class="col m3"><?= $patientList[$key]["email"] ?></div>
                    <div class="col m2"><?= $patientList[$key]["cellphone"] ?></div>
                    <div class="col m1">
                        <a href="/patientprofile?profilepatient=<?= $patientList[$key]["id"] ?>"><i class="material-icons">person</i></a></li>
                        <a href="/patientprofile?deletepatient=<?= $patientList[$key]["id"] ?>"><i class="material-icons red-text">delete_forever</i></a></li>
                    </div>
                </div>
            <?php } ?>
            <!-- pagination list  -->
            <ul class="row pagination">
                <li class="waves-effect"><a href="?page=<?= $patientListPagesActual - 1 ?>"><i class="material-icons">chevron_left</i></a></li>

                <?php foreach ($patientListPages as $key => $value) { ?>
                    <li class="<?= $patientListPagesActual == $key ? 'active' : 'waves-effect' ?>">
                        <a href="?page=<?= $patientListPages[$key] ?>"><?= $key + 1 ?></a>
                    </li>
                <?php } ?>

                <li class="waves-effect"><a href="?page=<?= $patientListPagesActual + 1 ?>"><i class="material-icons">chevron_right</i></a></li>
            </ul>
        </section>
    </div>

</main>