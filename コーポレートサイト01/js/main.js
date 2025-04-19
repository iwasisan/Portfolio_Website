// 事業内容ページのスライダー、ドットインジケーター

$(function () {
  $("#js-slick").slick({
    arrows: false,
    centerMode: true,
    dots: true,
  });
});


let equ_slide1 = document.querySelector("#slick-slide-control00");
let equ_slide2 = document.querySelector("#slick-slide-control01");
let equ_slide3 = document.querySelector("#slick-slide-control02");
let equ_slide4 = document.querySelector("#slick-slide-control03");
let equ_slide5 = document.querySelector("#slick-slide-control04");

equ_slide1.addEventListener("click", () => {
  equ_slide1.classList.toggle("slick-active");
});






