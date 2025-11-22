function loadOperation(){
    fetch("loadOperation.php")
    .then(response => response.text())
    .then(data=> {
        document.getElementById("table").innerHTML = data;

    });
}
window.addEventListener("load", function(){
    loadOperation();
});

document.addEventListener("DOMContentLoaded", function(){
    flatpickr("#expected_finish", {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        minDate: "today",
        time_24hr: false,
        defaultDate: new Date(Date.now() + 86400000),
        defaultHour: 17,
        defaultMinute: 0,
        minuteIncrement: 15
    });
    document.getElementById("insertForm").addEventListener("submit", function(e){
        e.preventDefault();
        let name = document.getElementById("operation_name").value;
        let description = document.getElementById("description").value;
        let expectedDL = document.getElementById("expected_finish").value;

        let formatexpectedDL = expectedDL.replace('', 'T');
        let data = new FormData();
        data.append("operation_name", name);
        data.append("description", description);
        data.append("expected_finish", formatexpectedDL);

        fetch("func/insertoperations.php", {
            method: 'POST',
            body: data
        })
        .then(response => response.json())
        .then(result =>{
            alert(result.message);
            loadOperation();
        })
        .catch(error =>{
            alert(error.message);
            loadOperation();
        });
    });
});