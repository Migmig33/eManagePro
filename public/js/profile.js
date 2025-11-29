const fullName = document.getElementById("fullname");
const userName = document.getElementById("username");
const pass = document.getElementById("password");
function loadUserInfo(){
    fetch('../js/getProfile.php')
    .then(res => res.json())
    .then(result =>{
        fullName.textContent = result.fullName;
        userName.textContent = result.userName;
        pass.textContent = result.passWord;
    })
    .catch(err => fullName.textContent = "Unable to Retrieve Personal Info", userName.textContent = "Unable to Retrieve Personal Info", pass.textContent = "Unable to Retrieve Personal Info");
}

window.addEventListener('load', function(){
    loadUserInfo();
});
document.addEventListener("DOMContentLoaded", function(){
    document.getElementById("pass").addEventListener("click", function(e){
       if(e.target.classList.contains("fa-pen")){
         let row = e.target.closest("div");

         row.querySelector(".pass").style.display = "none";
         row.querySelector(".editInput").style.display = "block";

         e.target.style.display = "none";
         row.querySelector(".update-btn").style.display = "inline-block";
       }
       if(e.target.classList.contains("fa-check")){
        let row = e.target.closest("div");
        let id = e.target.dataset.id;

        let password = row.querySelector("input[name='password']").value;
        let data = new FormData();

        data.append("password", password);
        fetch("../func/changepassword.php")
        .then(response => response.json())
        .then(result =>{
            alert(result.message);
            loadUserInfo();
        })
        .catch(error =>{
            alert(error.message);
            loadUserInfo();
        });

       }
    });
});