function loadOperation(){
    fetch("../loadDatas/loadOperation.php")
    .then(response => response.text())
    .then(data=> {
        document.getElementById("table").innerHTML = data;

    });
}
window.addEventListener("load", function(){
    loadOperation();
});

document.addEventListener("DOMContentLoaded", function(){
    document.getElementById("insertForm").addEventListener("submit", function(e){
        e.preventDefault();
        let name = document.getElementById("operation_name").value;
        let description = document.getElementById("description").value;
        let expectedDL = document.getElementById("expected_finish").value;

        let formatexpectedDL = expectedDL.replace(' ', 'T');
        let data = new FormData();
        data.append("operation_name", name);
        data.append("description", description);
        data.append("expected_finish", formatexpectedDL);

        fetch("../../func/insertoperations.php", {
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
    document.getElementById("table").addEventListener('click', function(e){
       if(e.target.classList.contains("fa-pen-to-square")){
            let row = e.target.closest("tr");

            row.querySelectorAll(".viewSpan").forEach(el => el.style.display = "none");
            row.querySelectorAll(".editInput").forEach(el => el.style.display = "block");

            e.target.style.display="none";
            row.querySelectorAll(".saveRowBtn").forEach(el => el.style.display = "inline-block");

        }
        if(e.target.classList.contains('fa-check')){
            let row = e.target.closest("tr");
            let id = e.target.dataset.id;

            let name = row.querySelector("input[name='operation_name']").value;
            let description = row.querySelector("input[name='description']").value;
            let expectedDL = row.querySelector("input[name='expected_finish'").value;

            let formatexpectedDL = expectedDL.replace(' ', 'T');
            let data = new FormData();
            data.append("operation_id", id);
            data.append("operation_name", name);
            data.append("description", description);
            data.append("expected_finish", formatexpectedDL);
            fetch("../../func/updateoperation.php", {
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
            })
        }
        if(e.target.classList.contains("fa-trash")){
            let id = e.target.dataset.id;
            let data = new FormData();

            data.append("operation_id", id);
            fetch("../../func/deleteoperation.php",{
                method:'POST',
                body: data
            })
            .then(response => response.json())
            .then(result => {
                alert(result.message);
                loadOperation();
            })
            .catch(error =>{
                alert(error.message);
                loadOperation();
            });
        }


});
});