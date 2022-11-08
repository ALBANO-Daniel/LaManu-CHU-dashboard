<!-- Dropdown rendez-vous -->
<ul id="rdvsMenu" class="light-blue darken-4 dropdown-content">
    <li><a class="white-text" href="/appointmentadd">nouvelle</a></li>
    <li><a class="white-text" href="/appointmentlist">liste</a></li>
</ul>
<!-- Dropdown patients -->
<ul id="patientsMenu" class="light-blue darken-4 dropdown-content">
    <li><a class="white-text" href="/patientadd">Ajouter</a></li>
    <li><a class="white-text" href="/patientlist">liste</a></li>
</ul>

<nav class=" light-blue darken-4">
    <div class="container nav-wrapper">
        <div class="logoDiv">
            <a href="/home"><img class="left white circle" height="55px" src="/assets/img/logo-medicine.svg" alt="logo"></a>
        </div>
        <a href="#" data-target="mobile-demo" class="right sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
            <li><a href="/">Accueil</a></li>
            <li><a class="dropdown-trigger" href="#!" data-target="rdvsMenu">rendez-vous<i class="material-icons right">arrow_drop_down</i></a></li>
            <li><a class="dropdown-trigger" href="#!" data-target="patientsMenu">patients<i class="material-icons right">arrow_drop_down</i></a></li>
        </ul>
    </div>
</nav>

<ul class="sidenav blue lighten-5 center" id="mobile-demo">
    <li class="logoDivMobile center-align">
        <img class="" width="80%" src="/assets/img/logo-medicine.svg" alt="logo site">
    </li>
    <li class="divider"></li>
    <li><a href="/">Accueil</a></li>
    <li><a href="/patientadd">Ajouter un patient</a></li>
    <li><a href="/patientlist">Liste des patients</a></li>
    <li><a href="/appointmentadd">Ajouter une rendez-vous</a></li>
    <li><a href="/appointmentlist">Liste de rendez-vous</a></li>
</ul>