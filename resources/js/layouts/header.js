const $ = (e) => document.querySelector(e);
const $$ = (e) => document.querySelectorAll(e);

// seleccionar
const headerLayout = $("#header");
const logo = $("#logo-exzaltia");
//seleccionar iconos nav
const nav = $("nav");
const navButtons = nav.querySelectorAll("svg");
const containerSearchBar = $("#container__searchbar");
const closeButton = $("#close__search-container");
//hamburguesa Handler
const asideHamburguesa = $('#aside-hamburguesa');
const iconoHamburguesa = $('#icono-hamburguesa');
const iconoCloseHamburguesa = $('#close__aside-hamburguesa')
console.log(iconoHamburguesa);

function Main() {

    addEventListener("scroll", scrollHandler);
    function scrollHandler(e) {
        if (scrollY > 10) {
            iconoHamburguesa.classList.remove('text-white');
            logo.classList.remove("text-white");
            logo.classList.add("text-black"); //black
            headerLayout.classList.remove("bg-black");
            headerLayout.classList.add("bg-[#ffffff7d]");

            navButtons.forEach((navButton) => {
                navButton.classList.add("text-black");
            });
        } else {
            //si esta arriba el header
            iconoHamburguesa.classList.add('text-white');
            logo.classList.remove("text-balak");
            logo.classList.add("text-white");
            headerLayout.classList.remove("bg-[#ffffff7d]");
            headerLayout.classList.add("bg-black");

            navButtons.forEach((navButton) => {
                navButton.classList.remove("text-black");
            });
        }
    }

    //Ejecutamos la funcionalidad de el svg de buscar
    searchButtonHandler();
    userButtonHandler();

    //Ejecutar Handler hamburguesa
    hamburguerHandler()

    

}

addEventListener("DOMContentLoaded", Main);

function hamburguerHandler(){
    
    iconoHamburguesa.addEventListener('click',()=>{
        console.log('click');
        
        asideHamburguesa.classList.toggle('-translate-x-full');
    })
    iconoCloseHamburguesa.addEventListener('click',()=>{
        console.log('click');
        
        asideHamburguesa.classList.toggle('-translate-x-full');
    })
}
function searchButtonHandler() {
    const searchButton = Array.from(navButtons)[1];
    searchButton.addEventListener("click", () => {
        containerSearchBar.classList.toggle("hidden");
    });
    closeButton.addEventListener("click", () => {
        containerSearchBar.classList.toggle("hidden");
    });
}

function userButtonHandler(){

    const userButtonDropDown = $('.dropdown__user')
    const userButton = Array.from(navButtons)[0];
    userButton.addEventListener('click',()=>{
        
        userButtonDropDown.classList.toggle('hidden');
    })
}
