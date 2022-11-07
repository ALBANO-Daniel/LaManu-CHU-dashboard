<main class="container">
    <br>
    <br>
    <div class="card">
        <br>
        <h3 class="center light-blue-text text-darken-4">Patient Profile</h3>
        <br>
        <!-- // example of action prop  "?status=delete&id=2" -->
        <form id="registerForm" class="container" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data">
            <!-- output test errors    -->
            <div class="row center">
                <p>Error PDO : <span class="error-text"></span><?= $errorPdo ?? '' ?></p>
                <p>Error Insertion(add) Patient : <span class="error-text"><?= $isEdited ? 'patient edited' : 'patient not edited' ?></span></p>
            </div>
            <!-- Name input  -->
            <div class="row">
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix light-blue-text text-darken-4">account_circle</i>
                    <input disabled="disabled" name="firstname" id="firstname" type="text" class="validate" value="<?= $patient->firstname ?>" label="Prenom" pattern="^[A-Za-z-éèêëàâäôöûüç' ]+$" />
                    <label for="firstname">Prenom</label>
                    <span class="helper-text" data-error="prenom incorrect" data-sucess=""><span class="error-text"><?= $error['firstname'] ?? '' ?></span></span>
                </div>
                <div class="input-field col s12 m6">
                    <i class="display-none material-icons prefix light-blue-text text-darken-4">account_circle</i>
                    <input disabled="disabled" name="lastname" id="lastname" type="text" class="validate" value="<?= $patient->lastname ?>" label="Nom" pattern="^[A-Za-z-éèêëàâäôöûüç' ]+$" />
                    <label for="lastname" class="">Nom</label>
                    <span class="helper-text" data-error="nom incorrect" data-sucess=""><span class="error-text"><?= $error['lastname'] ?? '' ?></span></span>
                </div>
            </div>
            <!-- Birthday Input -->
            <div class="row">
                <div id="datePicker" class="input-field col s12">
                    <i class="material-icons prefix light-blue-text text-darken-4">date_range</i>
                    <input disabled="disabled" name="birthdate" id="birthdate" type="text" class="datepicker validate" value="<?= $patient->birthdate ?>" />
                    <label for="birthdate">Date Naissance</label>
                    <span class="helper-text" data-error="date obligatoire" data-sucess=""><span class="error-text"><?= $error['birthdate'] ?? '' ?></span></span>
                </div>
            </div>
            <!-- Cellhpone/Fixe Input  -->
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix light-blue-text text-darken-4">phone</i>
                    <input disabled="disabled" name="phone" id="phone" type="text" class="validate" pattern="^[0-9]+$" value="<?= $patient->phone ?>">
                    <label for="phone">N. telefone</label>
                    <span class="helper-text" data-error="telephone incorrect" data-sucess=""><span class="error-text"><?= $error['phone'] ?? '' ?></span></span>
                </div>
                <!-- v2.0 -> checkbox, 'is not mine' number, JS-> show other box for phone`s owner  -->
            </div>
            <!-- email input  -->
            <div class="row">
                <div class="input-field col s12 m12">
                    <i class="material-icons prefix light-blue-text text-darken-4">email</i>
                    <input disabled="disabled" name="email" class="validate" type="email" id="email" value="<?= $patient->email ?>">
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
                    <button id="saveBtn" href="/patientprofile?editId=<?=$patientProfileId?>" class="btn disabled right waves-effect waves-light light-blue darken-4" type="submit">
                        sauvegarder
                        <i class="material-icons right hide-on-small-only">send</i>
                    </button>
                </div>
            </div>
        </form>
        <br>
    </div>

</main>