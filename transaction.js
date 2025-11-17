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
});

window.addEventListener("load", function(){
    loadArchivedTransac();
});