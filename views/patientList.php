a -> add new patient
a -> profil patient
<?php
$patientList[0]["firstname"] = 'Rogger';
$patientList[0]["lastname"] = 'Lecroix';
$patientList[0]["birthdate"] = '15 Mai 1981';
$patientList[0]["email"] = 'roggerthat@gmail.com';
$patientList[0]["cellphone"] = '0504932312';


?>

<main class="container">
    <div class="card center">

        <h1>Patient List</h1>
        <section class="listPatient">
            <div class="row">
                <div class="col m2">Name</div>
                <div class="col m2">Surname</div>
                <div class="col m2">birthdate</div>
                <div class="col m2">email</div>
                <div class="col m2">cellphone</div>
                <div class="col m2">
                </div>
            </div>
            <div class="row">
                <div class="col m2">Junior</div>
                <div class="col m2">Lecroix</div>
                <div class="col m2">25/03/1987</div>
                <div class="col m2">blabla@bal.com</div>
                <div class="col m2">0 998231285</div>
                <div class="col m2">
                    <a href="#!"><i class="material-icons">person</i></a></li>
                    <a href="#!"><i class="material-icons">delete_forever</i></a></li>
                </div>
            </div>
            <!-- patient list  -->
            <?php
            foreach ($patientList as $key => $value) { ?>
                <div class="row">
                    <div class="col m2"><?= $patientList[$key]["firstname"] ?></div>
                    <div class="col m2"><?= $patientList[$key]["lastname"] ?></div>
                    <div class="col m2"><?= $patientList[$key]["birthdate"] ?></div>
                    <div class="col m2"><?= $patientList[$key]["email"] ?></div>
                    <div class="col m2"><?= $patientList[$key]["cellphone"] ?></div>
                    <div class="col m2">
                        <a href="?profilpatient=<?= $key ?>"><i class="material-icons">person</i></a></li>
                        <a href="?deletepatient=<?= $key ?>"><i class="material-icons">delete_forever</i></a></li>
                    </div>
                </div>
            <?php } ?>
            <!-- pagination list  -->
            <ul class="row pagination">
                <li class="disabled"><a href="?page=<?= $patientListPagesActual + 1 ?>"><i class="material-icons">chevron_left</i></a></li>

                <li class="active"><a href="?page=<?= $patientListPages[0] ?>">1</a></li>
                <?php foreach ($patientListPages as $key => $value) { ?>
                    <li class="<? $isSelectedPatientListPage ? 'active' : 'waves-effect' ?>">
                        <a href="?page=<?= $patientListPages[$key] ?>"><?= $key ?></a>
                    </li>
                <?php } ?>
                <li class="waves-effect"><a href="#!">2</a></li>

                <li class="waves-effect"><a href="?page=<?= $patientListPagesActual + 1 ?>"><i class="material-icons">chevron_right</i></a></li>
            </ul>
        </section>
    </div>

</main>