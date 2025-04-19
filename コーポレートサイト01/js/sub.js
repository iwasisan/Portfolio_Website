// Q&Aページのアコーディオンメニュー

$(function () {
  $(".rep_QA dt").on("click", function () {
    $(this).next().slideToggle();
    $(this).toggleClass("open");
    $(".rep_QA dt").not(this).removeClass("open");
    $(".rep_QA dt").not($(this)).next(".rep_QA dd").slideUp();
  });

  $(".mai_QA dt").on("click", function () {
    $(this).next().slideToggle();
    $(this).toggleClass("open");
    $(".mai_QA dt").not(this).removeClass("open");
    $(".mai_QA dt").not($(this)).next(".mai_QA dd").slideUp();
  });

  $(".oth_QA dt").on("click", function () {
    $(this).next().slideToggle();
    $(this).toggleClass("open");
    $(".oth_QA dt").not(this).removeClass("open");
    $(".oth_QA dt").not($(this)).next(".oth_QA dd").slideUp();
  });
});
