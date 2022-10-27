<?php

// form  -  action '' method post clas adduserform..

// action = "/controleru?id="

// "?status=delete&id=2"

// input === pattern- regex   vs regex framework<?php label for acessibility, value <?= #$fistname ?? ''
// input API adress code postal ville pays ....



// allways NOVALIDATE test to test full block backend

?>



<main class="container">
    <br>
    <h1 class="center">Nouveaux Patient</h1>
    <br>
    <div class="container">
        <div class="card">
            <br>
            <form id="registerForm" action="" class="container">
                <!-- Name input  -->
                <div class="row">
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="firstName" type="text" class="validate counter" max-length="10">
                        <label for="firstName">Prenom</label>
                    </div>
                    <div class="col s1"></div>
                    <div class="input-field col s11 m6">
                        <input id="last_name" type="text" class="validate">
                        <label for="last_name">Nom</label>
                    </div>
                </div>
                <!-- Birthday Input -->
                <div class="row">
                    <div id="datePicker" class="input-field col s12">
                        <i class="material-icons prefix">date_range</i>
                        <input id="birthdate" type="text" class="datepicker validate" />
                        <label for="birthdate">Date Naissance</label>
                    </div>
                </div>
                <!-- Cellhpone/Fixe Input  -->
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">phone</i>
                        <input id="phone" type="text" class="validate">
                        <label for="phone">N. telefone</label>
                    </div>
                    <!-- v2.0 -> checkbox, 'is not mine' number, JS-> show other box for phone`s owner  -->
                </div>
                <!-- email input  -->
                <div class="row">
                    <div class="input-field col s12 m12">
                        <i class="material-icons prefix">email</i>
                        <input class="validate" type="email" id="user" data-length="20" max-length="20">
                        <label for="user">Email</label>
                        <span class="helper-text" data-error="format incorrect" data-sucess=""></span>
                    </div>
                </div>
            </form>
            <br>
        </div>
    </div>

</main>