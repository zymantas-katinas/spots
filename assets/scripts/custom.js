"use strict";

// HIDE TOP NAVBAR WHE SCROLLING DOWN
(function($) {
  // Collapse Navbar
  var navbarCollapse = function() {
    if ($("#navbar").offset().top > 300) {
      $("#navbar").addClass("disp");
    } else {
      $("#navbar").removeClass("disp");
    }
  };
  // Collapse now if page is not at top
  navbarCollapse();
  // Collapse the navbar when page is scrolled
  $(window).scroll(navbarCollapse);
})(jQuery);

// TOP NAVBAR BURGER DROPDOWN
document.querySelector(".top-navbar").addEventListener("click", function(){
    document.querySelector(".top-navbar__list").classList.toggle("show-navbar")
    document.querySelector(".top-navbar__burger").classList.toggle("show-navbar")
    document.querySelector(".hero__title").classList.toggle("invisible")
});

// CONTACT FORM 
document.querySelector(".footer__contact-icon").addEventListener("click", function(){
// open 
    let element = document.querySelector(".form-popup")
    element.classList.add("form-show");
});

// close
document.querySelector(".form-popup__close").addEventListener("click", function(){
    let element = document.querySelector(".form-popup")
    element.classList.remove("form-show");
});

// LOAD MORE BUTTON
document.querySelector(".load-more").addEventListener("click", function(){
    let iconText = document.querySelector(".load-more p");
    let all = document.querySelector(".gallery.show-less.show-more");
    let more = "load-more";
    let less = "load-less";
    document.querySelector(".load-more__icon").classList.toggle("rotated")
    document.querySelector(".gallery").classList.toggle("show-more")
    document.querySelector(".gallery__overlay").classList.toggle("overlay-hide")
    if(all){   
        iconText.innerHTML = more;
    }else {     
            iconText.innerHTML = less
    }
} );

//SELECT CITY
let cityArray = [''];
function filterCity(c) {
    let allImages = document.querySelectorAll(".spots-gallery__image")
    let cityName = c.split(' ')[1];
    let allCityImages = document.querySelectorAll("." + cityName + "C")

    //hide all images
    for (let i =0; i<allImages.length; i++) {
        allImages[i].classList.remove("show");
    }
    //show all city images
    for (let i =0; i<allCityImages.length; i++) {
        allCityImages[i].classList.add("show");
    }
    // put active city to cityArray[1]
    cityArray[1] = cityName;

    // remove selected Category underline
    let category = document.querySelectorAll(".spots-navbar__item");
    for(let i = 0; i < category.length; i++) {
        category[i].classList.remove("underline");
        };     
    makeTwoColums();
    RemoveLoadMore();
} 

//  change gallery layout accordingly;
function makeTwoColums(){
    let visibleImages = document.querySelectorAll(".show");
    let spotsGallery = document.querySelectorAll(".spots-gallery");

    if(visibleImages.length <= 4){ 
        spotsGallery[0].classList.remove("two_colums");
        spotsGallery[0].classList.add("one_column");
    } else if( 4 < visibleImages.length < 6) { 
        spotsGallery[0].classList.remove("one_column");
        spotsGallery[0].classList.add("two_colums");
    } 
    if ( visibleImages.length > 6) { 
        spotsGallery[0].classList.remove("two_colums");
        spotsGallery[0].classList.remove("one_column");
    }
}

// function to remove show-more icon, overlay and .show-less if images are less than 5;
function RemoveLoadMore(){
    let gallery = document.querySelectorAll(".gallery")[0];
    let visibleImages = document.querySelectorAll(".show");
    let icon = document.querySelector(".load-more");
    let overlay = document.querySelector(".gallery__overlay");

    if(visibleImages.length < 5){ 
        icon.classList.add("hide");
        overlay.classList.add("hide");
        gallery.classList.remove("show-less");
    } else { 
        icon.classList.remove("hide");
        overlay.classList.remove("hide");
        gallery.classList.add("show-less");
    }
}

// SELECT CATEGORY (cafe, co-working, outside)
function filterSelection(filter) {
    // active city
    let cityClassName = "." + cityArray[1] + "C";
  
    // //get images
    let allImages = document.querySelectorAll(cityClassName);
    let filterImages = document.querySelectorAll(cityClassName + filter);

    //hide all images
    for (let i =0; i<allImages.length; i++) {
        allImages[i].classList.remove("show");
    }
    //show selected images
    for (let i =0; i<filterImages.length; i++) {
        filterImages[i].classList.add("show");
    }
    //underline selected category name
    let category = document.querySelectorAll(".spots-navbar__item");
    for(let i = 0; i < category.length; i++) {
        category[i].classList.remove("underline");
        category[i].addEventListener("click", function(){
            this.classList.add("underline");
        });
    }
    makeTwoColums();
    RemoveLoadMore();
};

// set default map location
initMap(Vilnius, 14);

// set default city gallery
filterCity("cities__img Vilnius");










