//display number of data per table
const numofTransac = document.getElementById("numtransaction");
const numofOperation = document.getElementById("numoperation");
const numofItem = document.getElementById("numitems");
const numofActiveOp = document.getElementById("activeoperation");
const numofNotActiveOp = document.getElementById("notactiveoperation");
const totalValue = document.getElementById("totalvalue");
fetch('../js/getDatanums.php')
    .then(res => res.json())
    .then(result =>{
        numofTransac.textContent = result.total.transactions;
        numofOperation.textContent = result.total.operations;
        numofItem.textContent = result.total.inventory;
    })
    .catch(err => numofTransac.textContent = "Error finding data", numofOperation.textContent = "Error finding data", numofItem.textContent = "Error finding data");

fetch('../js/getActiveNotOperation.php')
.then(res => res.json())
.then(result =>{
    numofActiveOp.textContent = result.total.active;
    numofNotActiveOp.textContent = result.total.notactive;
})
.catch(err => numofActiveOp.textContent = "Error finding data", numofNotActiveOp.textContent = "Error finding data");
fetch('../js/getTotalValue.php')
.then(res => res.json())
.then(result=>{
    totalValue.textContent = result.totalvalue;
})
.catch(err => totalValue.textContent = "Error finding data");