<main class="container">
    <br>
    <!-- error/sucess output  -->
    <!-- error/sucess output  -->
    <?php
    if (SessionFlash::exist()) {
        $msg = SessionFlash::get();
        if ($msg[0] == true) { ?>
            <p class='green center white-text'>
            <?php
        } else { ?>
            <p class='red center white-text'>
            <?php
        }
        print_r($msg[1]) ?>
            </p>
        <?php
    } ?>
        <!-- main card  -->
        <div class="card center">
            <section class="listPatient">
                <nav class=" light-blue darken-4">
                    <h2 class="center flex">LISTE DES RENDEZ-VOUS</h2>
                </nav>
                <br>
                <!-- appointment list  -->
                <?php
                foreach ($patientList as $patient) { ?>
                    <div class="card row">
                        <div class="col s11 m5"><?= $patient->firstname ?></div><span class="s1 m1"><a href="/patientprofile?id=<?= $patient->id ?>"><i class="material-icons">person</i></a></span>
                        <div class="col s11 m5"><?= strtoupper($patient->lastname) ?></div><span class="s1 m1"><a href="/patientdelete?deleteid=<?= $patient->id ?>"><i class="material-icons red-text">delete_forever</i></a></span>
                    </div>
                <?php } ?>

                <!-- pagination list  -->
                <ul class="row pagination">
                    <?php if ($patientListPagesActual != 0) { ?>
                        <li class="waves-effect"><a href="?page=<?= $patientListPagesActual - 1 ?>"><i class="material-icons">chevron_left</i></a></li>
                    <?php } else { ?>
                        <li class="waves-effect hidden"><a href="?page=<?= $patientListPagesActual - 1 ?>"><i class="material-icons">chevron_left</i></a></li>
                    <?php } ?>

                    <?php if ($totalPages <= $pagesPerPagination) {
                        for ($page = 0; $page <= $totalPages; $page++) { ?>
                            <li class="<?= $patientListPagesActual == $page ? 'active' : 'waves-effect' ?>">
                                <a href="?page=<?= $page ?>"><?= $page + 1 ?></a>
                            </li>
                        <?php } ?>
                        <?php } else if ($patientListPagesActual < $pagesPerPagination - 1) {

                        for ($page = 0; $page < $pagesPerPagination; $page++) { ?>
                            <li class="<?= $patientListPagesActual == $page ? 'active' : 'waves-effect' ?>">
                                <a href="?page=<?= $page ?>"><?= $page + 1 ?></a>

                            </li>
                        <?php } ?>
                        <span> . . . </span>
                        <a href="?page=<?= $totalPages ?>"><?= $totalPages ?></a>

                    <?php } else if ($patientListPagesActual >= $pagesPerPagination - 1 && $patientListPagesActual < ($totalPages - $halfUpPagesPerPagination)) { ?>

                        <a href="?page=<?= 0 ?>">0</a>
                        <span> . . . </span>

                        <?php for ($page = $patientListPagesActual - $halfPagesPerPagination; $page <= $patientListPagesActual + $halfPagesPerPagination; $page++) { ?>
                            <li class="<?= $patientListPagesActual == $page ? 'active' : 'waves-effect' ?>">
                                <a href="?page=<?= $page ?>"><?= $page + 1 ?></a>
                            </li>
                        <?php } ?>

                        <span> . . . </span>
                        <a href="?page=<?= $totalPages ?>"><?= $totalPages ?></a>

                    <?php } else { ?>
                        <a href="?page=<?= 0 ?>">0</a>
                        <span> . . . </span>

                        <?php for ($page = $currentPage - $halfPagesPerPagination; $page <= $totalPages; $page++) { ?>
                            <li class="<?= $currentPage == $page ? 'active' : 'waves-effect' ?>">
                                <a href="?page=<?= $page ?>"><?= $page + 1 ?></a>
                            </li>
                        <?php } ?>

                    <?php } ?>

                    <?php if ($patientListPagesActual != $totalPages) { ?>
                        <li class="waves-effect"><a href="?page=<?= $patientListPagesActual + 1 ?>"><i class="material-icons">chevron_right</i></a></li>
                    <?php } else { ?>
                        <li class="waves-effect hidden"><a href="?page=<?= $patientListPagesActual + 1 ?>"><i class="material-icons">chevron_right</i></a></li>
                    <?php } ?>
                </ul>

            </section>
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
        </div>

</main>