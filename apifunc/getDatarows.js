//display number of data per table
const numofTransac = document.getElementById("numtransaction");
const numofOperation = document.getElementById("numoperation");
const numofItem = document.getElementById("numitems");
fetch('apifunc/getDatarows.php')
    .then(res => res.json())
    .then(result =>{
        numofTransac.textContent = result.total.transactions;
        numofOperation.textContent = result.total.operations;
        numofItem.textContent = result.total.inventory;
    })
    .catch(err => numofTransac.textContent = "Error finding data", numofOperation.textContent = "Error finding data", numofItem.textContent = "Error finding data");