// sidebar toggle
const showsidebar = document.getElementById("menubar");
const DisplaySideBar = document.getElementById("sidebar");

showsidebar.addEventListener('click', function(){
    DisplaySideBar.classList.add("show");
});
document.addEventListener('click', function(event){
    if (window.innerWidth <= 768) {
        if (!DisplaySideBar.contains(event.target) && !showsidebar.contains(event.target)){
             DisplaySideBar.classList.remove("show");
        }
    }
});