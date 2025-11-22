function loadItem(){
    fetch("loadItem.php")
    .then(response => response.text())
    .then(data=>{
        document.getElementById("table").innerHTML = data;
    });
}
window.addEventListener("load", function(){
    loadItem();
});

document.addEventListener("DOMContentLoaded", function(){
    document.getElementById("insertForm").addEventListener("submit", function(e){
        let name = document.getElementById("item_name").value;
        let price = document.getElementById("price").value;
        let stock = document.getElementById("stock").value;

        let data = new FormData();
        data.append("item_name", name);
        data.append("price", price);
        data.append("stock", stock);
        fetch("func/insertitem.php", {
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
})