<main class="container">
    <br>
    <br>
    <div class="card">
        <nav class=" light-blue darken-4">
            <h2 class="center">PROFIL PATIENT</h2>
        </nav>
        <br>
        
    <!-- error/sucess output  -->
    <?php
    if(SessionFlash::exist()){
        $msg = SessionFlash::get();
        if ($msg[0] == true) { ?>
            <p class='green'>
            <?php
        } else { ?>
            <p class='red'>
            <?php
        }
        print_r($msg[1]) ?>
            </p>
        <?php
    }?>

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
                    <a class="btn waves-effect waves-light light-blue darken-4"><i class="material-icons left hide-on-small-only">date_range</i>RDV</a>
                </div>
                <div class="clearfix hide-on-med-and-up"><br></div>
                <div class="col s12 m4">
                    <a id="editBtn" class="btn waves-effect waves-light light-blue darken-4"><i class="material-icons right hide-on-small-only">create</i>Edite</a>
                </div>
                <div class="col s12 m4 ">
                    <button id="saveBtn" class="btn disabled right waves-effect waves-light light-blue darken-4" type="submit">
                        sauvegarder
                        <i class="material-icons right hide-on-small-only">send</i>
                    </button>
                </div>
            </div>
            <div class="row white-text">
                <div class="col m4"></div>
                <div class="col s12 m4">
                    <a href="/patientdelete?deleteid=<?= $patientId ?>" class="btn waves-effect waves-light red darken-4"><i class="material-icons right hide-on-small-only">delete_forever</i>DELETE</a>
                </div>
                <div class="col m4"></div>
            </div>
        </form>
        <br>
    </div>
    <section class="card">
        <nav class=" light-blue darken-4">
            <h2 class="center">PATIENT RENDEZ-VOUS</h2>
        </nav>
        <br>
        <!-- patient list  -->
        <?php
            foreach ($appointmentList as $appointment) { ?>
                <div class="card row">
                    <div class="col s11 m5"><?= $appointment->dateHour ?></div><span class="s1 m1"><a href="/patientprofile?id=<?= $patient->id ?>"><i class="material-icons">person</i></a></span>
                    <div class="col s11 m5"><?= strtoupper($appointment->doctorName) ?></div><span class="s1 m1"><a href="/patientdelete?deleteid=<?= $patient->id ?>"><i class="material-icons red-text">delete_forever</i></a></span>
                </div>
            <?php } ?>
    </section>

</main>