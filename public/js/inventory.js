function loadItem(){
    fetch("../loadDatas/loadItem.php")
    .then(response => response.text())
    .then(data=>{
        document.getElementById("table").innerHTML = data;
    });
}
window.addEventListener("load", function(){
    loadItem();
});

document.addEventListener("DOMContentLoaded", function(){
    document.getElementById("insertForm").addEventListener("submit", function(){
        let name = document.getElementById("item_name").value;
        let price = document.getElementById("price").value;
        let stock = document.getElementById("stock").value;

        let data = new FormData();
        data.append("item_name", name);
        data.append("price", price);
        data.append("stock", stock);
        fetch("../../func/insertitem.php", {
            method: 'POST',
            body: data
        })
        .then(response => response.json())
        .then(result=>{
            alert(result.message);
            loadItem();
        })
        .catch(error=>{
            alert(error.message);
            loadItem();
        });

    });
    document.getElementById("table").addEventListener('click', function(e){
        if(e.target.classList.contains("fa-pen-to-square")){
            let row = e.target.closest("tr");

            row.querySelectorAll(".viewSpan").forEach(el =>el.style.display = "none");
            row.querySelectorAll(".editInput").forEach(el => el.style.display = "block");

            e.target.style.display="none";
            row.querySelectorAll(".saveRowBtn").forEach(el => el.style.display = "inline-block");
        }
       if(e.target.classList.contains("fa-check")){
           let row = e.target.closest("tr");
           let id = e.target.dataset.id;

           let name = row.querySelector("input[name='item_name']").value;
           let price = row.querySelector("input[name='price']").value;
           let stock = row.querySelector("input[name='stock']").value;
           let data = new FormData();
           data.append("item_id", id);
           data.append("item_name", name);
           data.append("price", price);
           data.append("stock", stock);
           fetch("../../func/updateitems.php", {
            method: 'POST',
            body: data
           })
           .then(response => response.json())
           .then(result => {
                alert(result.message);
                loadItem();
           })
           .catch(error =>{
                alert(error.message);
                loadItem();
           });
       }
       if(e.target.classList.contains("fa-trash")){
           let id = e.target.dataset.id;
           let data = new FormData();

           data.append("item_id", id);
           fetch("../../func/deleteitem.php" ,{
              method: 'POST',
              body: data
        })
        .then(response => response.json())
        .then(result =>{
            alert(result.message);
            loadItem();
        })
        .catch(error => {
            alert(error.message);
            loadItem();
        });
    }
});
});