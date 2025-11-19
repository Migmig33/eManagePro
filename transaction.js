
// show archived means false so, it will show the unarchived data's  //
let showarchived = 0;
// to load the table data from LoadTransaction.php //
function loadArchivedTransac() {
    fetch("loadTransaction.php?is_archived=" + (showarchived ? 1 : 0))
    .then(response => response.text())
    .then(data =>{
        document.getElementById("table").innerHTML = data;

    });
}   

document.getElementById("toggle-View").addEventListener('click', function(){
    showarchived = !showarchived;
    this.textContent = showarchived ? "View Recent" : "View Archived";
    document.getElementById("title-table").textContent = showarchived ? "Archived Transaction" : "Recent Transaction";
    loadArchivedTransac();
    if(!showarchived){

    }
});

window.addEventListener("load", function(){
    loadArchivedTransac();
});
// domcontentload so the html must load first before the script runs
document.addEventListener("DOMContentLoaded", function(){
// clicking the edit btn in the tablle row will make the row editable, once it click "save" the edited row will br updated to the databse //
    document.getElementById("table").addEventListener("click", function(e){
        if(e.target.classList.contains("fa-pen-to-square")){
            let row = e.target.closest("tr");

            row.querySelectorAll(".viewSpan").forEach(el => el.style.display = "none");
            row.querySelectorAll(".editInput").forEach(el => el.style.display = "block");

            e.target.style.display = "none";
            row.querySelectorAll(".saveRowBtn").forEach(el => el.style.display = "inline-block");
        }
        if(e.target.classList.contains("fa-check")){
            let row = e.target.closest("tr");
            let id = e.target.dataset.id;

            let name = row.querySelector("input[name='transaction_name']").value;
            let item = row.querySelector("input[name='item_id']").value;
            let qnty = row.querySelector("input[name='quantity']").value;

            let data = new FormData();
            data.append("transaction_id", id);
            data.append("transaction_name", name);
            data.append("item_id", item);
            data.append("quantity", qnty);

            fetch("func/updatetransactions.php", {
                method: 'POST',
                body: data
            })
            .then(response => response.json())
            .then(result => {
                alert(result.message);
                loadArchivedTransac();
            })
            .catch(error =>{
                alert(error.message);
            });
        }   
        if(e.target.classList.contains("fa-box-archive")){

            let id = e.target.dataset.id;
            let data = new FormData();

            data.append("transaction_id", id);
            fetch("func/archivetransaction.php", {
                 method: 'POST',
                 body: data

            })
            .then(response => response.json())
            .then(result =>{
                alert(result.message);
                loadArchivedTransac();
            })
            .catch(error =>{
                alert(error.message);
                loadArchivedTransac();
            });
        }
        if(e.target.classList.contains("fa-box-open")){
            let id = e.target.dataset.id;
            let data = new FormData();

            data.append("transaction_id", id);
            fetch('func/unarchivetransaction.php', {
                method: "POST",
                body: data

            }).then(response => response.json())
            .then(result =>{
                alert(result.message);
                loadArchivedTransac();
            })
            .catch(error =>{
                alert(error.message);
                loadArchivedTransac();
            });
        }
        if(e.target.classList.contains("fa-trash")){
            
            let id = e.target.dataset.id;
            let data = new FormData();

            data.append("transaction_id", id);
            fetch('func/deletetransaction.php', {
                method: 'POST',
                body: data
            }).then(response => response.json())
            .then(result => {
                alert(result.message);
                loadArchivedTransac();
            })
            .catch(error =>{
                alert(error.message);
                loadArchivedTransac();
            })
        }
     
    });
// clicking the add trnsaction button will run inserttransac.php directed to the main page of the html
    document.getElementById("insertForm").addEventListener("submit", function(e){
        e.preventDefault();
        let name = document.getElementById("transaction_name").value;
        let item = document.getElementById("item_id").value;
        let qnty = document.getElementById("quantity").value;


        let data = new FormData();
        data.append("transaction_name", name);
        data.append("item_id", item);
        data.append("quantity", qnty);

        fetch("func/inserttransac.php", {
            method: 'POST',
            body: data
        })
        .then(response => response.json())
        .then(result => {
            alert(result.message);
            loadArchivedTransac();
        })
        .catch(error =>{
            alert(error.message);
            loadArchivedTransac();
        });
    });
});