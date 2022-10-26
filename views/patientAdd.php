<form id="registerForm" action="" class="container">
    a -> to fucking nowhere then... wtf

    <!-- Name input  -->
    <div class="row">
        <div class="input-field col s6">
            <i class="material-icons prefix">account_circle</i>
            <input id="firstName" type="text" class="validate counter" max-length="10">
            <label for="firstName">Prenom</label>
        </div>
        <div class="input-field col s6">
            <input id="last_name" type="text" class="validate">
            <label for="last_name">Nom</label>
        </div>
    </div>

    <!-- Birthday Input -->
    <div id="datePicker" class="input-field col s12 m6">
        <i class="material-icons prefix">date_range</i>
        <input id="birthdate" type="text" class="datepicker validate" />
        <label for="birthdate">Date Naissance</label>
    </div>

    <!-- email input  -->
    <div class="row">
        <div class="input-field col s12 m6">
            <i class="material-icons prefix">email</i>
            <input class="validate" type="email" id="user" data-length="20" max-length="20">
            <label for="user">Email</label>
            <span class="helper-text" data-error="format incorrect" data-sucess=""></span>
        </div>
    </div>