let navButton = document.querySelector('#nav-button');
let navIntContainer = document.querySelector('.cstm-nav-int-container');
let navTitlecolors = document.querySelectorAll('.cstm-title-color');
let navTitleline = document.querySelector('#cstm-nav-title-line');
let navLogo = document.querySelector('.cstm-nav-logo');
let navButtonIconClose = document.querySelector('.cst-nav-hbg-button-close');
let navButtonIconOpen = document.querySelector('.cst-nav-hbg-button-open');
let navButtonIconCloseJs = document.querySelector('.cst-nav-hbg-button-close-js');
let navContactsBtn = document.querySelector('.cstm-nav-contacts-btn');
let txtAnimation = document.querySelectorAll('.cstm-text-animation');
let logOutBtn = document.getElementById('logout-btn-js');
let logInBtn = document.getElementById('login-btn-js');
let searchBar = document.querySelector('#cstm-nav-searchbar');
let navbar = document.querySelector('#navbar');
let navbarBG = document.querySelector('.cstm-nav-bg-changing');

let check = true

// Navbar che cambia allo scroll start

addEventListener("scroll", (event) => {
  if (window.scrollY > 0 && check == true) {
    navbarBG.style.background = "rgba(255, 255, 255, 0.2)";
    navbarBG.style.backdropFilter = "blur(5.2px)";
    navbarBG.style.marginTop = "0"
  } else {
    navbarBG.style.background = "transparent";
    navbarBG.style.backdropFilter = "blur(0)";
    navbarBG.style.marginTop = "1em"
  }
});

// Navbar che cambia allo scroll end

// Navbar 3puntini ON CLICK open start

navButton.addEventListener("click", () => {
  if (check == true) {
    if(logInBtn){
      logInBtn.classList.add("d-none");
    }
    if(logOutBtn){
      logOutBtn.classList.add("d-none");
    }
    navIntContainer.style.left = 0;
    navTitlecolors.forEach(color => {
      color.style.color = "var(--clr-white)"
    });
    searchBar.classList.add("d-none");
    navTitleline.style.backgroundColor = "var(--clr-white)"
    navLogo.style.filter = "invert(1)"
    navButtonIconClose.style.display = "none"
    navButtonIconOpen.style.display = "none"
    navButtonIconCloseJs.style.display = "inline"

    navbarBG.style.background = "transparent";
    navbarBG.style.backdropFilter = "blur(0)";
    navbarBG.style.marginTop = "1em"

    check = false;
  } else {
    if(logInBtn){
      logInBtn.classList.remove("d-none");
    }
    if(logOutBtn){
      logOutBtn.classList.remove("d-none");
    }
    navIntContainer.style.left = "3000px";
    navTitlecolors.forEach(color => {
      color.style.color = "var(--clr-black)"
    });
    searchBar.classList.remove("d-none");
    navTitleline.style.backgroundColor = "var(--clr-black)"
    navLogo.style.filter = "invert(0)"
    navButtonIconClose.style.display = "inline"
    navButtonIconOpen.style.display = "inline"
    navButtonIconCloseJs.style.display = "none"
    check = true;
  };
});

// Navbar 3puntini ON CLICK open end

// swiper scrip default start

var swiper = new Swiper(".mySwiper", {
  slidesPerView: 1,
	// effect: 'fade',
  effect: 'fade',
  speed: 700,
  fadeEffect: { // Add this
    crossFade: true,
  },
  loop: true,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});

// swiper scrip default ends

let movingHomeBox = document.querySelectorAll('.cstm-home-moving-bg-box');
let clicksOnHomeSwipe = document.querySelectorAll('.cstm-home-card-img');
let buttonNext = document.querySelector('.swiper-button-next');
let buttonPrev = document.querySelector('.swiper-button-prev');
let homeSun = document.querySelector('.cstm-home-center-sun');

// funzioni che gestisticono le animazione della home on swipe start

// swipe a destra

function forward(){

  if(homeSun){
    homeSun.style.width = "100%";
    homeSun.style.height = "100%";
    setTimeout(() => { homeSun.style.width = "40%"; homeSun.style.height = "40%"; }, 400);
  }

  txtAnimation.forEach(element => {
    element.style.letterSpacing = "2px";
    element.style.opacity = "0";
    setTimeout(() => { element.style.letterSpacing = "0"; element.style.opacity = "1"; }, 400);
  });

  movingHomeBox.forEach(element => {
    element.style.width = "0";
    element.style.height = "0";
    element.style.opacity = "0";
    setTimeout(() => { element.style.width = "100%"; element.style.height = "100%"; element.style.opacity = "1"; }, 700);
  });

  clicksOnHomeSwipe.forEach(element => {
    element.style.opacity = "0.5";
    element.classList.add("clickOnHomeSwipe");
    setTimeout(() => { element.classList.remove("clickOnHomeSwipe"); element.style.opacity = "1"; }, 1000);
  });

}

// swipe a sinistra

function back(){

  if(homeSun){
    homeSun.style.width = "100%";
    homeSun.style.height = "100%";
    setTimeout(() => { homeSun.style.width = "40%"; homeSun.style.height = "40%"; }, 400);
  }

  txtAnimation.forEach(element => {
    element.style.letterSpacing = "2px";
    element.style.opacity = "0";
    setTimeout(() => { element.style.letterSpacing = "0"; element.style.opacity = "1"; }, 400);
  });

  movingHomeBox.forEach(element => {
    element.style.width = "0";
    element.style.height = "0";
    element.style.opacity = "0";
    setTimeout(() => { element.style.width = "100%"; element.style.height = "100%"; element.style.opacity = "1"; }, 700);
  });

  clicksOnHomeSwipe.forEach(element => {
    element.style.opacity = "0.5";
    element.classList.add("clickOnHomeSwipe");
    setTimeout(() => { element.classList.remove("clickOnHomeSwipe"); element.style.opacity = "1"; }, 1000);
  });

}

// funzioni che gestisticono le animazione della home on swipe end

// Swiper default "event listener" che permette di far scattare le funzioni forward e back allo swipe

swiper.on('slideChange', function ({realIndex:r,previousIndex:p}) {
if(r-p==1){
forward()
}
else{
back()
}
});

let indexCards = document.querySelectorAll('.cstm-index-card-container');
let cerchiettiLeft = document.querySelectorAll('.cstm-index-cerchietti-left');
let cerchiettiRight = document.querySelectorAll('.cstm-index-cerchietti-right');

// Mouse Hover per cards index, sfondo ingradisce all'hover start

indexCards.forEach(card => {
  card.addEventListener("mouseover", () => {
    
    cerchiettiLeft.forEach(element => {
      element.style.padding = "3%";
    });

    cerchiettiRight.forEach(element => {
      element.style.padding = "3%";
    });

    });
});

indexCards.forEach(card => {
  card.addEventListener("mouseout", () => {
    
    cerchiettiLeft.forEach(element => {
      element.style.padding = "5%";
    });

    cerchiettiRight.forEach(element => {
      element.style.padding = "5%";
    });

    });
});

// Mouse Hover per cards index, sfondo ingradisce all'hover end
 
// Mouse Hover per links in navbar effetto radial sun start

let navIntBG = document.querySelector('.cstm-nav-sun');
let navLinks = document.querySelectorAll('.cstm-int-nav-link-name');

navLinks.forEach(link => {
  link.addEventListener("mouseover", () => {
    navIntBG.style.width = "100%";
    navIntBG.style.height = "100%";
    });
});

navLinks.forEach(link => {
  link.addEventListener("mouseout", () => {
    navIntBG.style.width = "20%";
    navIntBG.style.height = "20%";
    });
});

// Mouse Hover per links in navbar effetto radial sun end


