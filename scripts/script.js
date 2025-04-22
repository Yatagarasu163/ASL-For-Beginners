function toggleSidebar(){
    const sidebar = document.getElementsByClassName("sidebar");
    const mainSection = document.getElementsByClassName("mainSection");
    sidebar[0].classList.toggle('active');
    mainSection[0].classList.toggle('active');
}

const $ = (selector, all = false) => {
    return all ? document.querySelectorAll(selector) : document.querySelector(selector);
};

const mainSection = $('.mainSection');
const sidebar = $('.sidebar');
if(!mainSection.classList.contains('active') && !sidebar.classList.contains('active')){
    mainSection.classList.toggle('active');
    console.log("mainSection activated!");
}

const hamburgerButton = $('.hamburgerMenu');
hamburgerButton.addEventListener("click", toggleSidebar);
const backButton = $('.backButton');
backButton.addEventListener("click", toggleSidebar);

function toggleLogoutBox() {
    const logoutBox = document.getElementById('logoutBox');
    if (logoutBox.style.display === 'none' || logoutBox.style.display === '') {
        logoutBox.style.display = 'block';
    } else {
        logoutBox.style.display = 'none';
    }
}

const profileButton = $('.profile');
profileButton.addEventListener("click", toggleLogoutBox);

function flip(id){
    const flashcard = document.getElementById(id);
    flashcard.classList.toggle('flip')
}