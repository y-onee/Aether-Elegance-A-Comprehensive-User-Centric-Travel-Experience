const translate = document.querySelectorAll(".translate")

window.addEventListener('scroll', ()=>{
    let scroll = window.pageYOffset;
    // console.log(scroll)

    translate.forEach(element => {
        let speed = element.dataset.speed;
        element.style.transform = `translateY(${scroll * speed}px)`;
    })
})

const trans = document.querySelectorAll(".trans")

window.addEventListener('scroll', () => {
    let offset = window.pageYOffset;
    document.querySelector(sec1).style.display = 'fixed';
    trans.forEach(element => {
        let speed = element.dataset.speed;
        element.style.transform = `translateY(${offset * speed}px)`;
    })
})

// const ham = document.getElementsByClassName(".hamburger-menu");

// window.addEventListener('click', () => {
//     const cover = document.getElementsByClassName(".cover");
//     cover.style.display = "flex";
// })

document.getElementById('toggleButton').addEventListener('click', function() {
    var cover = document.querySelector('.cover');
    cover.style.display = (cover.style.display === 'none' || cover.style.display === '') ? 'flex' : 'none';
});

document.querySelector('.cross').addEventListener('click', function() {
    var cover = document.querySelector('.cover');
    cover.style.display = (cover.style.display === 'flex' || cover.style.display === '') ? 'none' : 'flex';
});


document.addEventListener('click', function(event) {
    if (event.target !== document.querySelector(".navbar") && !navbar.contains(event.target)) {
        cover.style.display = 'none';
    }
});

document.getElementById('toggler').addEventListener('click', function() {
    var hidden = document.querySelector('.hidden');
    hidden.style.display = (hidden.style.display === 'none' || hidden.style.display === '') ? 'flex' : 'none';
});