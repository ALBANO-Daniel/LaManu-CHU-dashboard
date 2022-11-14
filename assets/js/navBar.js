// mobile side navbar
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems);
});

// drop down 
document.addEventListener('DOMContentLoaded', function() {
    var drop = document.querySelectorAll('.dropdown-trigger');
    var instances = M.Dropdown.init(drop,{
        coverTrigger: false,
        hover: true
    });
});

document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems);
});