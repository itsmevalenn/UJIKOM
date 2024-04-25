var section = document.getElementById('main');
var display = 0;

function hideshow() {
    if (display == 1) {
        section.style.display = 'none';
        display = 0;
    } else {
        section.style.display = 'block';
        display = 1;
    }
}



// heart color
let is_liked = true;
function like() {
    if (is_liked == true) {
        $('#heart').attr('src', 'img/12.png')
        is_liked = false;
    } else {
        $('#heart').attr('src', 'img/5.png')
        is_liked = true;
    }

}

