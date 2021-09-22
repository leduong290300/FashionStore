function main() {
    handleModalDelete();
}
main();

// Handle modal delete events
function handleModalDelete() {
    const btnDelete = document.querySelectorAll(".confirm");
    const btnAccessDelete = document.getElementById("btn-delete");
    const formDelete = document.getElementById("form-delete");
    for (let i = 0; i < btnDelete.length; i++) {
        btnDelete[i].onclick = () => {
            const url = btnDelete[i].dataset.url;
            formDelete.setAttribute("action", url);
        };
    }
    btnAccessDelete.onclick = () => {
        formDelete.submit();
    };
}
