
<a href="/appointmentadd">new rdv</a>
<a href="/appointment?id">rdv info </a>
<a href="/appointment?id2">rdv info 2</a>

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