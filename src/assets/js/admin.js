//Menu burger
const slideLeft = document.getElementById('slideLeft');

menuBurger.addEventListener('click',() => {
    slideLeft.classList.toggle('slideLeftActive');
    burgerDiv.classList.toggle('active');
});
const menu = document.getElementsByClassName("menuList");
const gallery = document.getElementById("gallery");
const createUser = document.getElementById("createUser");
const users = document.getElementById("users");

for (let i = 0; i < menu.length; i++) {
    menu[i].addEventListener("click", function () {

        if (menu[i].textContent === "Gallery") {
            gallery.classList.add("active");
            users.classList.remove("active");
            createUser.classList.remove("active");
            slideLeft.classList.remove('slideLeftActive');
            burgerDiv.classList.remove('active');
        }
        if (menu[i].textContent === "Create user") {
            gallery.classList.remove("active");
            users.classList.remove("active");
            createUser.classList.add("active");
            slideLeft.classList.remove('slideLeftActive');
            burgerDiv.classList.remove('active');
        }
        if (menu[i].textContent === "Users") {
            gallery.classList.remove("active");
            users.classList.add("active");
            createUser.classList.remove("active");
            slideLeft.classList.remove('slideLeftActive');
            burgerDiv.classList.remove('active');
        }
    });
}