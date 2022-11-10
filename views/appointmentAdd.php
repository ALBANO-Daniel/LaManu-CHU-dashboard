<main class="container">
    <br>
    <!-- error/sucess output  -->
    <?php
    if (SessionFlash::exist()) {
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
    } ?>

    <div class="card">
        <nav class=" light-blue darken-4">
            <h2 class="center">NOUVEAUX APPOINTMENT</h2>
        </nav>
        <br>
        <form id="appointmentForm" class="container" action="" method="post" enctype="multipart/form-data">
            <!-- Name input  -->
            <div class="row">
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix light-blue-text text-darken-4">account_circle</i>
                    <input disabled="disabled" name="firstname" id="firstname" type="text" class="validate" value="<?= $firstname ?? '' ?>" label="Prenom" pattern="^[A-Za-z-éèêëàâäôöûüç' ]+$" />
                    <label for="firstname">Prenom</label>
                    <span class="helper-text" data-error="prenom incorrect" data-sucess=""><span class="error-text"><?= $error['firstname'] ?? '' ?></span></span>
                </div>
                <div class="input-field col s12 m6">
                    <i class="display-none material-icons prefix light-blue-text text-darken-4">account_circle</i>
                    <input disabled="disabled" name="lastname" id="lastname" type="text" class="validate" value="<?= $lastname ?? '' ?>" label="Nom" pattern="^[A-Za-z-éèêëàâäôöûüç' ]+$" />
                    <label for="lastname" class="">Nom</label>
                    <span class="helper-text" data-error="nom incorrect" data-sucess=""><span class="error-text"><?= $error['lastname'] ?? '' ?></span></span>
                </div>
            </div>
            <!-- Birthday Input -->
            <!-- control front to no weekends and no allready-full days  -->
            <div class="row">
                <div id="datePicker" class="input-field col s12">
                    <i class="material-icons prefix light-blue-text text-darken-4">date_range</i>
                    <input name="appointmentDate" id="appointmentDate" type="text" class="datepicker validate" value="<?= $appointmentDate ?? '' ?>" />
                    <label for="appointmentDate">Date Naissance</label>
                    <span class="helper-text" data-error="date obligatoire" data-sucess=""><span id="birthdateError" class="error-text"><?= $error['appointmentDate'] ?? '' ?></span></span>
                </div>
            </div>
            <!-- Time Input -->
            <div class="row">
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">access_time</i>
                    <!-- all times possibles -->
                    <!-- disabled if allready taken == need a regex ?? -->
                    <select name="appointmentTime">
                        <option class="greyText" value="" disabled selected>Choisir horaire</option>
                        <option class="greyText" value="" disabled selected>Matin</option>
                        <option>09:00</option>
                        <option>09:30</option>
                        <option>10:00</option>
                        <option>10:30</option>
                        <option>11:00</option>
                        <option>11:30</option>
                        <option>12:00</option>
                        <option>12:30</option>
                        <option class="greyText" value="" disabled selected>Apres-midi</option>
                        <option>14:00</option>
                        <option>14:30</option>
                        <option>15:00</option>
                        <option>15:30</option>
                        <option>16:00</option>
                        <option>16:30</option>
                        <option>17:00</option>
                        <option>17:30</option>
                        <option class="greyText" value="" disabled selected>Soir</option>
                        <option>19:00</option>
                        <option>19:30</option>
                        <option>20:00</option>
                        <option>20:30</option>
                        <option>21:00</option>
                        <option>21:30</option>
                        <option>22:00</option>
                        <option>22:30</option>
                        <option></option>
                    </select>
                </div>
            </div>
        </form>
    </div>
<main>