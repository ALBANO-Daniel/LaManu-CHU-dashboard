<main class="container">
    <br>
    <!-- error/sucess output  -->
    <?php
    if(SessionFlash::exist()){
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
    }?>
    <br>
    <div class="row">
        <div class="col s12 m6">
            <a class="white-text" href='/patientadd'>
                <div class="card light-blue darken-4">
                    <div class="center card-content">
                        <span class="card-title"><i class="large material-icons">account_circle</i></span>
                        <p>Ajouter un Patient</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col s12 m6">
            <a class="white-text" href='/appointmentadd'>
                <div class="card light-blue darken-4">
                    <div class="center card-content">
                        <span class="card-title"><i class="large material-icons">access_time</i></span>
                        <p>Ajouter un Rendez-vous</p>
                    </div>
                </div>
            </a>
        </div>
    </div>

</main>