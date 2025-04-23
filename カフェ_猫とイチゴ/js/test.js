window.addEventListener("scroll", function () {
  //スクロール量を取得
  const scroll = window.scrollY;

  //画面の高さを取得
  const windowheight = window.innerHeight;
  const boxs = document.querySelectorAll(".fade01");

  boxs.forEach(function (fade01) {
    const distanceToBox = fade01.offsetTop;

    if (scroll + windowheight > distanceToBox) {
      fade01.classList.add("active");
    }
  });
});

//トップに戻るボタン
//ボタンとなる要素
const pagetop_btn = document.querySelector(".pagetop");

//クリックしたら関数scroll_topの動きをする
pagetop_btn.addEventListener("click", scroll_top);

// ページ上部へスムーズに移動
function scroll_top() {
  window.scroll({ top: 0, behavior: "smooth" });
}

//ボタンは初期状態は消えていてスクロールをいくらかしたときに表示させたい
window.addEventListener("scroll", function () {
  if (window.scrollY > 100) {
    pagetop_btn.style.opacity = "1";
  } else if (window.scrollY < 100) {
    pagetop_btn.style.opacity = "0";
  }
});
