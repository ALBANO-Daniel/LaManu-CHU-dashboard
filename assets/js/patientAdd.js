// datepicker configurations and translation to french
document.addEventListener('DOMContentLoaded', function () {
    var elems = document.querySelectorAll('.datepicker');
    var instances = M.Datepicker.init(elems,{
    i18n:{   // French setup
        clear: 'effacer',
        done: 'choisir',
        cancel: 'annuler',
        months: ['Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Julliet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Decembre'],
        monthsShort: ['Jan', 'Fev', 'Mar', 'Avr', 'Mai', 'Juin', 'Jul', 'Aout', 'Sept', 'Oct', 'Nov', 'Dec'],
        weekdays: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
        weekdaysShort: ['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam'],
        weekdaysAbbrev: ['D', 'L', 'M', 'M', 'J', 'V', 'S']
    },
    format: 'yyyy-mm-dd',
    showMonthAfterYear: true,
    yearRange: [1910,2022], 
    showClearBtn:true
})
})

// handle the erase of the inputs error mensages from the Back-end...
var inputs = document.querySelectorAll('.input-field')

inputs.forEach(e => {
    e.childNodes[3].addEventListener("focus", ()=> {
        e.childNodes[7].innerText = '';
    })
})
//birthdate need unique eventListener AS modals interf. DOM childNodes 
var calendarInput = document.getElementById("birthdate")
var spanError = document.getElementById("birthdateError")
calendarInput.addEventListener("focus", ()=> {
    spanError.innerText = '';
})