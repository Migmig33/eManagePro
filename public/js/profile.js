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
    document.getElementBy
});