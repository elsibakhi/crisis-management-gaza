

function changeModalData(data) {

    document.getElementById("kt_form_1").setAttribute("action",`extensions/${data[0]}`);
    document.getElementById("modalInput").value=data[1];

}
