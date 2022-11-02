<?php

// form  -  action '' method post clas adduserform..

// action = "/controleru?id="

// "?status=delete&id=2"

// input === pattern- regex   vs regex framework<?php label for acessibility, value <?= #$fistname ?? ''
// input API adress code postal ville pays ....



// allways NOVALIDATE test to test full block backend

var_dump($_GET);



?>



<main class="container">
    <br>
    <h1 class="center">Nouveaux Patient</h1>
    <br>
    <div class="container">
        <div class="card">
            <br>
            <form id="registerForm" action="#" class="container">
                <!-- Name input  -->
                <div class="row">
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix light-blue-text text-darken-4">account_circle</i>
                        <input name="firstname" id="firstname" type="text" class="validate" value="<?= $firstname ?? '' ?>" pattern="^[A-Za-z-éèêëàâäôöûüç' ]+$" />
                        <label for="firstname">Prenom</label>
                        <span class="helper-text" data-error="<?= $error["firstname"] ?? 'prenom incorrect' ?>" data-sucess=""></span>
                    </div>
                    <div class="col s1"></div>
                    <div class="input-field col s11 m6">
                        <input name="lastname" id="lastname" type="text" class="validate" value="<?= $lastname ?? '' ?>" pattern="^[A-Za-z-éèêëàâäôöûüç' ]+$" />
                        <label for="lastname" class="">Nom</label>
                        <span class="helper-text" data-error="<?= $error["lastname"] ?? 'nom incorrect' ?>" data-sucess=""></span>
                    </div>
                </div>
                <!-- Birthday Input -->
                <div class="row">
                    <div id="datePicker" class="input-field col s12">
                        <i class="material-icons prefix light-blue-text text-darken-4">date_range</i>
                        <input name="birthdate" id="birthdate" type="text" class="datepicker validate" value="<?= $birthdate ?? '' ?>" />
                        <label for="birthdate">Date Naissance</label>
                        <span class="helper-text" data-error="<?= $error["birthdate"] ?? 'date obligatoire' ?>" data-sucess=""></span>
                    </div>
                </div>
                <!-- Cellhpone/Fixe Input  -->
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix light-blue-text text-darken-4">phone</i>
                        <input name="phone" id="phone" type="text" class="validate" pattern="^[0-9]+$" value="<?= $phone ?? '' ?>">
                        <label for="phone">N. telefone</label>
                        <span class="helper-text" data-error="<?= $error["phone"] ?? 'telephone incorrect' ?>" data-sucess=""></span>
                    </div>
                    <!-- v2.0 -> checkbox, 'is not mine' number, JS-> show other box for phone`s owner  -->
                </div>
                <!-- email input  -->
                <div class="row">
                    <div class="input-field col s12 m12">
                        <i class="material-icons prefix light-blue-text text-darken-4">email</i>
                        <input name="email" class="validate" type="email" id="email" value="<?= $email ?? '' ?>">
                        <label for="email">Email</label>
                        <span class="helper-text" data-error="<?= $error["email"] ?? 'email incorrect' ?>" data-sucess=""></span>
                    </div>
                </div>
                <!-- submit button  -->
                <div class="row white-text">
                    <div class="col s12 center">
                        <button class="btn waves-effect waves-light light-blue darken-4" type="submit">
                            Envoyer
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
            </form>
            <br>
        </div>
    </div>

</main>