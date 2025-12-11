
const fullName = document.getElementById("fullname");
const userName = document.getElementById("username");
const pass = document.getElementById("password");
function loadUserInfo(){
    fetch('../js/getProfile.php')
    .then(res => res.json())
    .then(result =>{
        fullName.textContent = result.fullName;
        userName.textContent = result.userName;

        let isShowed = true;
        

        const masked = '*'.repeat(result.passWord.length);
        pass.textContent = masked;
        document.querySelector(".showPass").addEventListener('click', function(){
            if(isShowed){
                pass.textContent = result.passWord;
            }else{
                pass.textContent = masked;
            }
            isShowed = !isShowed;
        });
    })
    .catch(err => fullName.textContent = "Unable to Retrieve Personal Info", userName.textContent = "Unable to Retrieve Personal Info", pass.textContent = "Unable to Retrieve Personal Info");
}

window.addEventListener('load', function(){
    loadUserInfo();
});
document.addEventListener("DOMContentLoaded", function(){
    document.getElementById("pass").addEventListener("click", function(e){
       if(e.target.classList.contains("fa-pen")){
         let row = e.target.closest("#pass");

         row.querySelector(".pass").style.display = "none";
         row.querySelector(".editInput").style.display = "block";

         e.target.style.display = "none";
         row.querySelector(".savePass").style.display = "inline-block";
       }
       if(e.target.classList.contains("fa-check")){
        let row = e.target.closest("#pass");
        let id = e.target.dataset.id;

        let password = row.querySelector("input[name='password']").value;
        let data = new FormData();

        data.append("id", id);
        data.append("password", password);
        fetch("../../func/changepassword.php", {
            method: 'POST',
            body: data
        })
        .then(response => response.json())
        .then(result =>{
            alert(result.message);
            location.reload();
            

        })
        .catch(error =>{
            alert(error.message);
            location.reload();
            
        })

       }
    });
});