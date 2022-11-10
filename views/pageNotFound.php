<main class="container">
    <h1>404 : page not found..</h1>
    <a href="/">Retour a l'accueil</a>
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
    
</main>