<main class="container">
    <br>
    <!-- error/sucess output  -->
    <?php if (SessionFlash::exist()){
            $msg = SessionFlash::get();
            if($msg[0] == true){ ?>
                <p class='green center white-text'>
            <?php } else { ?>
                <p class='red center white-text'>
            <?php }
            print_r($msg[1])?>
                </p> 
        <?php } ?>
    
    <!-- main card  -->
    <div class="card center">
        <section class="listPatient">
            <nav class=" light-blue darken-4">
                <h2 class="center flex">LISTE DES PATIENTS</h2>
            </nav>
            <br>
            <!-- patient list  -->
            <?php
            foreach ($patientList as $patient) { ?>
                <div class="card row">
                    <div class="col s11 m5"><?= $patient->firstname ?></div><span class="s1 m1"><a href="/patientprofile?id=<?= $patient->id ?>"><i class="material-icons">person</i></a></span>
                    <div class="col s11 m5"><?= strtoupper($patient->lastname) ?></div><span class="s1 m1"><a href="/patientdelete?deleteid=<?= $patient->id ?>"><i class="material-icons red-text">delete_forever</i></a></span>
                </div>
                <?php }
                    $i = count($patientList);
                    for($i ; $i < $elementsPerPage; $i++ ){ ?>
                        <div class="row emptyListItem"></div>
            <?php } ?>   
            
            <!-- pagination list  -->
            <ul class="row pagination">
            <?php if($page != 1){ ?>
                <li class="waves-effect"><a href="?page=<?= $page -1 ?>"><i class="material-icons">chevron_left</i></a></li>
                <?php } ?>
                
                <?php if( $totalPages <= $pagesPerPagination){
                    for($i = 1; $i <= $totalPages; $i++){ ?>
                        <li class="<?= $i == $page ? 'active' : 'waves-effect' ?>">
                            <a href="?page=<?= $i ?>"><?= $i ?></a>
                        </li>
                    <?php } ?>

                <?php } else if ($page < $pagesPerPagination - 1) {

                    for ($i = 1; $i < $pagesPerPagination; $i++) { ?>
                        <li class="<?= $i == $page ? 'active' : 'waves-effect' ?>">
                            <a href="?page=<?= $i ?>"><?= $i ?></a>

                        </li>
                    <?php } ?>
                    <span> . . . </span>
                    <li class="waves-efect"><a href="?page=<?= $totalPages ?>"><?= $totalPages ?></a></li>

                <?php } else if ($page >= $pagesPerPagination - 1 && $page < ($totalPages - $halfUpPagesPerPagination)) { ?>

                    <li class="waves-efect"><a href="?page=1">1</a></li>
                    <span> . . . </span>

                    <?php for ($i = $page - $halfPagesPerPagination; $i <= $page + $halfPagesPerPagination; $i++) { ?>
                        <li class="<?= $i == $page ? 'active' : 'waves-effect' ?>">
                            <a href="?page=<?= $i ?>"><?= $i ?></a>
                        </li>
                    <?php } ?>

                    <span> . . . </span>
                    <li class="waves-efect"><a href="?page=<?= $totalPages ?>"><?= $totalPages ?></a></li>

                <?php } else { ?>
                    <li class="waves-efect"><a href="?page=1">1</a></li>
                    <span> . . . </span>

                    <?php for ($i = $page - $halfPagesPerPagination; $i <= $totalPages; $i++) { ?>
                        <li class="<?= $i == $page ? 'active' : 'waves-effect' ?>">
                            <a href="?page=<?= $i ?>"><?= $i ?></a>
                        </li>
                    <?php } ?>
                <?php } ?>

                <?php if($page != $totalPages){ ?>
                    <li class="waves-effect"><a href="?page=<?= $page + 1 ?>"><i class="material-icons">chevron_right</i></a></li>
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