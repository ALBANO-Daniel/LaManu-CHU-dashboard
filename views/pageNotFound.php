<main class="container">
    <h1>404 : page not found..</h1>
    <a href="/">Retour a l'accueil</a>
    <br>
    <?php if(SessionFlash::exist()){ ?><p><?=SessionFlash::get()?></p><?php }?>
    
</main>