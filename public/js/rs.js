
function loadDataDailyTransac(){
    fetch("../loadDatas/loadDailyTransaction.php")
    .then(response => response.text())
    .then(data => {
        document.getElementById("table-transactions").innerHTML = data;
    });

}

function loadDataDailyOperate(){
    fetch("../loadDatas/loadDailyOperations.php")
    .then(response => response.text())
    .then(data =>{
        document.getElementById("table-operations").innerHTML = data;
    });
}

const mainlogcontainer = document.getElementById("logcontainer");
const logsmessage = document.getElementById("logs")

let loglist = [];

fetch('../js/getLogs.php')
.then(res => res.json())
.then(data => {
    loglist = data;
    loadLogs(loglist);
    
    
    
})
.catch(err => logsmessage.innerHTML = "No Log History.");


function loadLogs(data){
    logsmessage.innerHTML = "";
    if(Array.isArray(data) && data.length > 0){
        data.forEach((log, index) =>{
             if(!log.logs) return;
             const box = document.createElement("div");
             box.classList.add("logs");
             box.id = `logs${index + 1}`;

             const logEl = document.createElement("p");
             logEl.id = `messagelog${index + 1}`;
             logEl.textContent = log.logs;

             const typeEl = document.createElement("p");
             typeEl.classList.add("logtype");
             typeEl.id = `logtype${index + 1}`;

             const text = log.logs.toLowerCase();
             if(text.includes("insert")) typeEl.textContent = "Insert";
             else if(text.includes("update")) typeEl.textContent = "Update";
             else if(text.includes("delete")) typeEl.textContent = "Delete";
             else typeEl.textContent = "Others";

             box.appendChild(logEl);
             box.appendChild(typeEl);
             mainlogcontainer.appendChild(box);


        });
    
}else{
    logsmessage.innerHTML = "No Log History";
}
}
window.addEventListener('load', function(){
    loadDataDailyOperate();
    loadDataDailyTransac();
});
