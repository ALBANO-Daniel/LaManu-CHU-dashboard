// btn to edit inputs on form
var inputs = document.querySelectorAll('input');
var editBtn = document.getElementById('editBtn');
var saveBtn = document.getElementById('saveBtn');

editBtn.onclick = () => {
    inputs.forEach(input => {
        input.removeAttribute('disabled');      
    });
    saveBtn.classList.remove('disabled');
    editBtn.classList.add('disabled');
};
saveBtn.onclick = () => {
    inputs.forEach(input => {
        input.setAttribute('disabled', '');      
    });
    saveBtn.classList.add('disabled');
    editBtn.classList.remove('disabled');
}

