<main class="container">
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
    
    <div class="container">
        <nav class=" light-blue darken-4">
            <h2 class="center">Nouvelle Rendez-vous :</h2>
        </nav>
        <br>
        <ul class="row">
            <li class="col s6">Name</li>
            <li class="col s6">Surname</li>
        </ul>
    </div>
    <a href="/">Actualizer</a>
</main>