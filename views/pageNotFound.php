<main class="container">
    <h1>404 : page not found..</h1>
    <?php if(SessionFlash::exist()){ ?><p><?=SessionFlash::get()?></p><?php }?>
    <a href="/home">Retour a l'accueil</a>
</main>