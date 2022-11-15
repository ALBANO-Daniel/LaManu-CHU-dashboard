<main class="container">
    <br>
    <br>
    <!-- USER PROFILE  -->
    <div class="card">
        <nav class=" light-blue darken-4">
            <h2 class="center">PROFIL PATIENT</h2>
        </nav>
        <br>

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

            <!-- // example of action prop  "?status=delete&id=2" -->
            <form id="registerForm" class="container" action="?id=<?= $patientId ?>" method="post" enctype="multipart/form-data">
                <!-- Name input  -->
                <div class="row">
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix light-blue-text text-darken-4">account_circle</i>
                        <input disabled="disabled" name="firstname" id="firstname" type="text" class="validate" value="<?= $patientDisplay->firstname ?>" label="Prenom" pattern="^[A-Za-z-éèêëàâäôöûüç' ]+$" />
                        <label for="firstname">Prenom</label>
                        <span class="helper-text" data-error="prenom incorrect" data-sucess=""><span class="error-text"><?= $error['firstname'] ?? '' ?></span></span>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="display-none material-icons prefix light-blue-text text-darken-4">account_circle</i>
                        <input disabled="disabled" name="lastname" id="lastname" type="text" class="validate" value="<?= $patientDisplay->lastname ?>" label="Nom" pattern="^[A-Za-z-éèêëàâäôöûüç' ]+$" />
                        <label for="lastname" class="">Nom</label>
                        <span class="helper-text" data-error="nom incorrect" data-sucess=""><span class="error-text"><?= $error['lastname'] ?? '' ?></span></span>
                    </div>
                </div>
                <!-- Birthday Input -->
                <div class="row">
                    <div id="datePicker" class="input-field col s12">
                        <i class="material-icons prefix light-blue-text text-darken-4">date_range</i>
                        <input disabled="disabled" name="birthdate" id="birthdate" type="text" class="datepicker validate" value="<?= $patientDisplay->birthdate ?>" />
                        <label for="birthdate">Date Naissance</label>
                        <span class="helper-text" data-error="date obligatoire" data-sucess=""><span id="birthdateError" class="error-text"><?= $error['birthdate'] ?? '' ?></span></span>
                    </div>
                </div>
                <!-- Cellhpone/Fixe Input  -->
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix light-blue-text text-darken-4">phone</i>
                        <input disabled="disabled" name="phone" id="phone" type="text" class="validate" pattern="^[0-9]+$" value="<?= $patientDisplay->phone ?>">
                        <label for="phone">N. telefone</label>
                        <span class="helper-text" data-error="telephone incorrect" data-sucess=""><span class="error-text"><?= $error['phone'] ?? '' ?></span></span>
                    </div>
                    <!-- v2.0 -> checkbox, 'is not mine' number, JS-> show other box for phone`s owner  -->
                </div>
                <!-- email input  -->
                <div class="row">
                    <div class="input-field col s12 m12">
                        <i class="material-icons prefix light-blue-text text-darken-4">email</i>
                        <input disabled="disabled" name="email" class="validate" type="email" id="email" value="<?= $patientDisplay->email ?>">
                        <label for="email">Email</label>
                        <span class="helper-text" data-error="email incorrect" data-sucess=""><span class="error-text"><?= $error['email'] ?? '' ?></span></span>
                    </div>
                </div>
                <!-- submit button  -->
                <div class="row white-text">
                    <div class="col s12 m4">
                        <a id="editBtn" class="btn waves-effect waves-light light-blue darken-4">
                            <i class="material-icons right hide-on-small-only">create</i>
                            Editer
                        </a>
                    </div>
                    <div class="col s12 m4 ">
                        <button id="saveBtn" class="btn disabled right waves-effect waves-light light-blue darken-4" type="submit">
                            sauvegarder
                            <i class="material-icons right hide-on-small-only">send</i>
                        </button>
                    </div>
                    <div class="clearfix hide-on-med-and-up"><br></div>
                    <!-- delete user modal and btn  -->
                    <div class="col s12 m4">
                        <!-- Modal Trigger -->
                        <a id="deletePatientBtn" class="btn modal-trigger waves-effect waves-light red darken-4" href="#deleteUserModal">
                            <i class="material-icons right hide-on-small-only">delete_forever</i>
                            DELETE
                        </a>
                        <!-- Modal Structure -->
                        <div id="deleteUserModal" class="modal deleteUserModal black-text">
                            <div class="row modal-content center">
                                <h4 class="center red-text">DELETE USER</h4>
                                <p>Are you sure you want to delete this user :</p>
                                <br>
                                <p><?= $patientDisplay->firstname . ' ' . strtoupper($patientDisplay->lastname)  ?></p>
                            </div>
                            <div class="modal-footer">
                                <a id="deletePatientBtn" class="col s12 m6 btn waves-effect waves-light red darken-4" href="/patientdelete?deleteid=<?= $patientId ?>">
                                DELETE
                            </a>
                                <a href="#registerForm" class="col s12 m6 modal-close waves-effect waves-green btn">CANCEL</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        <br>
    </div>

    <!-- RENDEZ-VOUS  -->
    <section id="appointmentList" class="card">
        <nav class=" light-blue darken-4">
            <h2 class="center">PATIENT RENDEZ-VOUS</h2>
        </nav>
        <br>
        <div class="row">
            <div class="col m4"></div>
            <div class="col s12 m4">
                <a class="btn waves-effect waves-light light-blue darken-4" href="/appointmentadd?id=<?=$patientId ?>"><i class="material-icons left hide-on-small-only">date_range</i>Nouveaux</a>
            </div>
            <div class="col m4"></div>
        </div>
        <!-- appointment list  -->
        <?php
                foreach ($appointmentList as $appointment) { 
                    $dateHour = explode(' ', $appointment->datehour);
                    $date = $dateHour[0];
                    $time = $dateHour[1];
                    $time = explode(':', $time);
                    $time = $time[0] . ':' . $time[1];
                    ?>
                    <div class="card row">
                        <div class="col s11 m5"><?= $date .' -- '. $time ?></div><span class="s1 m1"><a href="/appointmentdelete?id=<?= $appointment->id ?>"><i class="material-icons red-text">delete_forever</i></a></span>
                    </div>
                <?php } ?>
<!-- TEST TEST TEST  -->
                <a href="#appointmentList&?id=<?= $patientId?>&?page=1"><?= $page + 1 ?></a>

                <!-- pagination list  -->
                <ul class="row pagination">
                    <?php if ($appointmentListPagesActual != 0) { ?>
                        <li class="waves-effect"><a href="?id=<?= $patientId?>&?page=<?= $appointmentListPagesActual - 1 ?>"><i class="material-icons">chevron_left</i></a></li>
                    <?php } else { ?>
                        <li class="waves-effect hidden"><a href="?id=<?= $patientId?>&?page=<?= $appointmentListPagesActual - 1 ?>"><i class="material-icons">chevron_left</i></a></li>
                    <?php } ?>

                    <?php if ($totalPages <= $pagesPerPagination) {
                        for ($page = 0; $page <= $totalPages; $page++) { ?>
                            <li class="<?= $appointmentListPagesActual == $page ? 'active' : 'waves-effect' ?>">
                                <a href="?id=<?= $patientId?>&?page=<?= $page ?>"><?= $page + 1 ?></a>
                            </li>
                        <?php } ?>
                        <?php } else if ($appointmentListPagesActual < $pagesPerPagination - 1) {

                        for ($page = 0; $page < $pagesPerPagination; $page++) { ?>
                            <li class="<?= $appointmentListPagesActual == $page ? 'active' : 'waves-effect' ?>">
                                <a href="?id=<?= $patientId?>&?page=<?= $page ?>"><?= $page + 1 ?></a>

                            </li>
                        <?php } ?>
                        <span> . . . </span>
                        <a href="?id=<?= $patientId?>&?page=<?= $totalPages ?>"><?= $totalPages ?></a>

                    <?php } else if ($appointmentListPagesActual >= $pagesPerPagination - 1 && $appointmentListPagesActual < ($totalPages - $halfUpPagesPerPagination)) { ?>

                        <a href="?id=<?= $patientId?>&?page=<?= 0 ?>">0</a>
                        <span> . . . </span>

                        <?php for ($page = $appointmentListPagesActual - $halfPagesPerPagination; $page <= $appointmentListPagesActual + $halfPagesPerPagination; $page++) { ?>
                            <li class="<?= $appointmentListPagesActual == $page ? 'active' : 'waves-effect' ?>">
                                <a href="?id=<?= $patientId?>&?page=<?= $page ?>"><?= $page + 1 ?></a>
                            </li>
                        <?php } ?>

                        <span> . . . </span>
                        <a href="?id=<?= $patientId?>&?page=<?= $totalPages ?>"><?= $totalPages ?></a>

                    <?php } else { ?>
                        <a href="?id=<?= $patientId?>&?page=<?= 0 ?>">0</a>
                        <span> . . . </span>

                        <?php for ($page = $currentPage - $halfPagesPerPagination; $page <= $totalPages; $page++) { ?>
                            <li class="<?= $currentPage == $page ? 'active' : 'waves-effect' ?>">
                                <a href="?id=<?= $patientId?>&?page=<?= $page ?>"><?= $page + 1 ?></a>
                            </li>
                        <?php } ?>

                    <?php } ?>

                    <?php if ($appointmentListPagesActual != $totalPages) { ?>
                        <li class="waves-effect"><a href="?id=<?= $patientId?>&?page=<?= $appointmentListPagesActual + 1 ?>"><i class="material-icons">chevron_right</i></a></li>
                    <?php } else { ?>
                        <li class="waves-effect hidden"><a href="?id=<?= $patientId?>&?page=<?= $appointmentListPagesActual + 1 ?>"><i class="material-icons">chevron_right</i></a></li>
                    <?php } ?>
                </ul>

        
    </section>

</main>