// btn to edit inputs on form
var inputs = document.querySelectorAll('input');
var editBtn = document.getElementById('editBtn');
var saveBtn = document.getElementById('saveBtn');
var deleteBtn = document.getElementById('deletePatientBtn');

editBtn.onclick = () => {
    inputs.forEach(input => {
        input.removeAttribute('disabled');      
    });
    saveBtn.classList.remove('disabled');
    editBtn.classList.add('disabled');
};
saveBtn.onclick = () => {
    // BUG : disable switch handled by SUBMIT btn trigger empty-form sending...
    //... also theres no need, as refresh reset to true the disable attribute(on view)
        // inputs.forEach(input => {
        //     input.setAttribute('disabled', '');      
        // });
    saveBtn.classList.add('disabled');
    editBtn.classList.remove('disabled');
}

document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems);
});