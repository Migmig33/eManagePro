// display operation status
const container = document.getElementById("mainstatuscontainer");
const statusbar = document.getElementById("status-container");
const operationName = document.getElementById("operation_name");
const operationStatus = document.getElementById("isactive");

// sorting
const btnall = document.getElementById("alloperation");
const btnactive = document.getElementById("ongoing");
const btnnotactive = document.getElementById("complete");


let operationlist = [];

fetch('../js/getStatus.php')
    .then(res => res.json())
    .then(result => {
        if (Array.isArray(result) && result.length >= 1) {
            operationlist = result;
            sortDataOperation(operationlist);
        }

    })
    .catch(err => statusbar.textContent = "NO OPERATIONS");


function sortDataOperation(data) {
    container.innerHTML = ""; //para hindi ma duplicate yung records sa container
    if (Array.isArray(data) && data.length >= 1) {
        data.forEach((item, index) => {
            const box = document.createElement("div");
            box.classList.add("status-container");
            box.id = `status_${index + 1}`;

            const nameEl = document.createElement("p");
            nameEl.id = `operation_name_${index + 1}`;
            nameEl.textContent = item.operation_name;

            const statusEl = document.createElement("p");
            statusEl.id = `isactive_${index + 1}`;
            statusEl.textContent = item.status;


            box.appendChild(nameEl);
            box.appendChild(statusEl);
            container.appendChild(box);
        });
    }
}

btnall.addEventListener('click', () => {
    sortDataOperation(operationlist);
});

btnactive.addEventListener('click', () => {
    const pendingOnly = operationlist.filter(op => op.status === "Pending");
    sortDataOperation(pendingOnly);
});

btnnotactive.addEventListener('click', () => {
    const completedOnly = operationlist.filter(op => op.status === "Completed");
    sortDataOperation(completedOnly);
});