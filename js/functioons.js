// function view account or logout
const openAcc = document.getElementById("openaccount");
const accountView = document.querySelector(".account");
const exitAcc = document.getElementById("exitaccount");
const overlays = document.getElementById("overlay")

openAcc.addEventListener('click', () => {
    overlays.classList.toggle("hidden");
    accountView.classList.toggle('showAccount');

});

exitAcc.addEventListener('click', () =>{
    accountView.classList.remove('showAccount');
    overlays.classList.toggle("hidden");

});

// function add transaction
const addtransac = document.getElementById("addTransac");
const displayformtransac = document.getElementById("formtransac");
const exitaddtransac = document.getElementById("exitformtransac");

addtransac.addEventListener('click', () => {
    displayformtransac.classList.toggle('show');

});

exitaddtransac.addEventListener('click', () => {
    displayformtransac.classList.remove('show');

});

// function add operation

const addoperate = document.getElementById("addOperate");
const displayformoperate = document.getElementById("formoperate");
const exitaddoperate = document.getElementById("exitformoperate");

addoperate.addEventListener('click', () => {
    displayformoperate.classList.add('show');

});

exitaddoperate.addEventListener('click', () => {
    displayformoperate.classList.remove('show');
});

///

// function update operation
//add update form
const addupdateoperate = document.querySelectorAll(".showUpdateForm");
//exit update form
const exitupdateoperation = document.getElementById("exitupdateform");
// form update
const formupdateoperation = document.getElementById("updateformoperation");


// populate form for updateoperation
const inputid = formupdateoperation.querySelector('input[name="operation_id"]');
const inputname = formupdateoperation.querySelector('input[name="operation_name"]');
const inputdesc = formupdateoperation.querySelector('input[name="description"]');
const inputstatus = formupdateoperation.querySelector('select[name="isactive"]');


// function update item
//add update form
const addupdateitem = document.querySelector("")
// populate form for updateitem
const inputitemid = updateformitem

addupdateoperate.forEach(btn => {
    btn.addEventListener('click', (e) =>{
        e.preventDefault();

        const id = btn.dataset.id;
        const name = btn.dataset.name;
        const desc = btn.dataset.description;
        const status = btn.dataset.status;

        inputid.value = id;
        inputname.value = name;
        inputdesc.value = desc;
        inputstatus.value = status;

        formupdateoperation.classList.add('showupdate');
    });
    
});





exitupdateoperation.addEventListener('click', () =>{
    formupdateoperation.classList.remove('showupdate');
});


// function add item
const itemaddform = document.getElementById("addItem");
const formadditem = document.getElementById("formitem");
const exitadditem = document.getElementById("exitformitem");

itemaddform.addEventListener('click', () =>{
    formadditem.classList.add("showadditemform");
});

exitadditem.addEventListener('click', () =>{
    formadditem.classList.remove("showadditemform");
});