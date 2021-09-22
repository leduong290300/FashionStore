function run() {
    alert()
}
run()

//Handle click display alert
function alert() {
    const btnHidden = document.querySelector('.btn-hidden');
    const alert = document.querySelector('.hidden');
    btnHidden.onclick = function() {
        alert.style.display='none';
    }
}
