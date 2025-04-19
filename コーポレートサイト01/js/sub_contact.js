
let elem = document.querySelector(".yourmail");
let elem2 = document.querySelector(".yourmail_check");


elem.addEventListener("blur", function () {
  if (!elem.value.match(/.+@.+\..+/)) {
    window.alert("メールアドレスをご確認ください");
  }
});

elem2.addEventListener("blur", function () {
  if (elem.value != elem2.value) {
    alert("メールと確認用メールが一致しません");
    return false;
  } else {
    return true;
  }
})