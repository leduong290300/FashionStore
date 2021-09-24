function main() {
    postSlider()
}
main()
/*Handle post slider*/
function postSlider() {
    const confirmSlider = document.getElementById('confirm-slider');
    const formSlider = document.getElementById('form-slider');
    confirmSlider.onclick = function() {
        const uri = confirmSlider.dataset.url;
        formSlider.setAttribute('action',uri);
        formSlider.submit()
    }
}
