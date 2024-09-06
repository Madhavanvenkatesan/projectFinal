
//for header image responsive borderradius
const header = document.querySelector('header');
window.addEventListener("scroll", function(){
if (window.scrollY !== 0) {
    header.style.borderRadius = "0 0 2rem 2rem";
}else{
    header.style.borderRadius = "0";
}
});

//Carousel
const next = document.getElementById('next');
const prev = document.getElementById('prev');

    next.addEventListener('click',() => {
        let items = document.getElementsByClassName('item');
        document.getElementsByClassName('slide')[0].appendChild(items[0]);
        next.classList.add('active');
    });
    
    prev.addEventListener('click',() => {
        let items = document.getElementsByClassName('item');
        document.getElementsByClassName('slide')[0].prepend(items[items.length - 1]);
        prev.classList.add('active');
    });