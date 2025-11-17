let showarchived = 0;

function loadArchivedTransac() {
    fetch("loadTransactions.php?is_archived=" + (showarchived ? 1 : 0))
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

document.querySelectorAll(".update-btn").forEach(btn =>{
    btn.addEventListener("click", function() {
        let row = this.closest("tr");

        row.querySelectorAll(".viewSpan").forEach(el => el.style.display = "none");
        row.querySelectorAll(".editInput").forEach(el => el.style.display = "inline-block");

        style.display = "none";
        row.querySelectorAll(".saveRowBtn").style.display = "inline-block";

    });
});
document.querySelectorAll(".saveRowBtn").forEach(btn =>{
    btn.addEventListener("click", function(){
         let row = this.closest("tr");
         let id = this.dataset.id;

         let input = row.querySelectorAll(".saveRowBtn");

         let data = new FormData();
         data.append("transaction_id", id);
         data.append("transaction_name", input[0].value);
         data.append("transactioned_by", transactioned_by);
         data.append("item_id", input[1].value);
         data.append("quantity", input[2].value);

    fetch("func/updatetransac.php", {
        method: "POST",
        body: data
    }).then(() => location.reload());

    });
});