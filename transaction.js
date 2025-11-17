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

document.querySelectorAll('.update-btn').forEach(btn => {
    btn.addEventListener('click', function(e){
        e.preventDefault();

        document.getElementById('data-id').value = this.dataset.id;
        document.getElementById('data-name').value = this.dataset.name;
        document.getElementById('data-by').value = this.dataset.by;
        document.getElementById('data-item').value = this.dataset.item;
        document.getElementById('data-num').value = this.dataset.qnty;

        document.getElementById('formUpdateTransac').style.display ='block';
    });
});