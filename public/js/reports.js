function loadDataDailyTransac(){
    fetch("../loadDatas/loadDailyTransaction.php")
    .then(response => response.text())
    .then(data => {
        document.getElementById("table-transaction").innerHTML = data;
    });

}
window.addEventListener('load', function(){
    loadDataDailyTransac();
});
/*function loadDataDailyOperate(){
    fetch("../loadData/loadDailyOperation.php")
    .then(response => response.text())
    .then(data =>{
        document.getElementById("table-operation").inertHTML = data;
    })
}*/
