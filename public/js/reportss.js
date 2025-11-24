function loadDataDailyTransac(){
    fetch("../loadDatas/loadDailyTransaction.php")
    .then(response => response.text())
    .then(data => {
        document.getElementById("table-transactions").innerHTML = data;
    });

}
window.addEventListener('load', function(){
    loadDataDailyTransac();
});
function loadDataDailyOperate(){
    fetch("../loadDatas/loadDailyOperations.php")
    .then(response => response.text())
    .then(data =>{
        document.getElementById("table-operations").innerHTML = data;
    });
}
window.addEventListener('load', function(){
    loadDataDailyOperate();
});
