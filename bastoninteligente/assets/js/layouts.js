// Espera a que el DOM esté completamente cargado
document.addEventListener("DOMContentLoaded", function() {

     // open menu de ajustes

 const dropdownToggle = document.querySelector("#menu__ajustes .open-menu-ajustes");
 const dropdownMenu = document.querySelector("#menu__ajustes .dropdown-content");
 dropdownToggle.addEventListener("click", function(e){
    e.stopPropagation(); // Evita que el evento llegue al contenedor principal
    
    dropdownMenu.classList.toggle("show-dropdown");
    
    window.addEventListener("click", function(e){
        if(!e.target.matches("#menu__ajustes .open-menu-ajustes")){
            dropdownMenu.classList.remove("show-dropdown");
        }
    })
 })

});