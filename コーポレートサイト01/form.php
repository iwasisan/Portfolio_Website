<?php
  session_start();
  // 送信ボタンが押されたかどうか
  if(isset($_POST['submit'])){
    // POSTされたデータをエスケープ処理して変数に格納
    // 必須
    $First_name = htmlspecialchars($_POST['First_name'],ENT_QUOTES | ENT_HTML5);
    $Last_name = htmlspecialchars($_POST['Last_name'],ENT_QUOTES | ENT_HTML5);
    $yourmail = htmlspecialchars($_POST['yourmail'],ENT_QUOTES | ENT_HTML5);
    $yourmail_check = htmlspecialchars($_POST['yourmail_check'],ENT_QUOTES | ENT_HTML5);
    $telephone = htmlspecialchars($_POST['telephone'],ENT_QUOTES | ENT_HTML5);
    $contact = htmlspecialchars($_POST['contact'],ENT_QUOTES | ENT_HTML5);
    $personal = htmlspecialchars($_POST['personal'],ENT_QUOTES | ENT_HTML5);
    // 任意
    $company_name = htmlspecialchars($_POST['company_name'],ENT_QUOTES | ENT_HTML5);
    $note = htmlspecialchars($_POST['note'],ENT_QUOTES | ENT_HTML5);
  
    // エラーチェック
    $errors = [];
    if(trim($First_name) === '' || trim($First_name) === "　"){
      $errors['First_name'] = "苗字を入力してください";
    }
    if(trim($Last_name) === '' || trim($Last_name) === "　"){
      $errors['Last_name'] = "名前を入力してください";
    }
    if(trim($yourmail) === '' || trim($yourmail) === "　"){
      $errors['yourmail'] = "メールを入力してください";
    }
    if(trim($yourmail_check) === '' || trim($yourmail_check) === "　"){
      $errors['yourmail_check'] = "確認メールを入力してください";
    }
    if(trim($telephone) === '' || trim($telephone) === "　"){
      $errors['telephone'] = "電話番号を入力してください";
    }
    if(trim($contact) === '' || trim($contact) === "　"){
      $errors['contact'] = "お問い合わせ項目を選択してください";
    }
    if(trim($personal) === '' || trim($personal) === "　"){
      $errors['personal'] = "個人情報の取扱規程をチェックしてください";
    }
    // エラー配列がなければ異常なし
    if(count($errors) === 0){ 
      // エスケープ処理をして値を変数に格納済みの入力値
      $_SESSION['First_name']= $First_name; 
      $_SESSION['Last_name'] = $Last_name;
      $_SESSION['yourmail']= $yourmail;
      $_SESSION['yourmail_check']= $yourmail_check;
      $_SESSION['telephone'] = $telephone;
      $_SESSION['contact'] = $contact;
      $_SESSION['personal'] = $personal;
      // echo "入力値に異常はありませんでした";
      header('Location:http://localhost/confirm.php');
    }else{
      // エラー配列があればエラーを表示
      echo $errors['First_name'];
      echo $errors['Last_name'];
      echo $errors['yourmail'];
      echo $errors['yourmail_check'];
      echo $errors['telephone'];
      echo $errors['contact'];
      echo $errors['personal'];
    }
  }// #1

  // confirm.phpから戻ってきたときに値を保持
  if (isset($_GET) && isset($_GET['action']) && $_GET['action'] === 'edit') {
  $First_name = $_SESSION['First_name'];
  $Last_name = $_SESSION['Last_name'];
  $yourmail = $_SESSION['yourmail'];
  $telephone = $_SESSION['telephone'];
  $company_name = $_SESSION['company_name'];
  $contact = $_SESSION['contact'];
  $note = $_SESSION['note'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="パワコン修理・メンテナンスの事なら株式会社SKSにお任せください">
  <title>株式会社SKS</title>

  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
  
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

  <!--ヘッダー部分----------------------------  -->

  <header>
    <p class="logo">
      <a href="#"><img src="./img/ロゴ/image001.png" alt="ロゴ"></a>
    </p>
    <nav class="header_navi">
      <ul class="main_navi">
        <li><a href="maintenans.html">メンテナンスについて</a></li>
        <li><a href="reason.html">事業内容</a></li>
        <li><a href="flow.html">修理・メンテナンスの流れ</a></li>
        <li><a href="faq.html">よくあるご質問</a></li>
        <li><a href="company.html">企業情報</a></li>
      </ul>
      <ul class="sub_navi">
        <li class="joural_link">
          <a href="journal.html">
            <div><img src="./img/pixta/91657170.jpg" alt=""></div>
            <p>Thanks journal</p>
          </a>
        </li>
        <li class="contact_link">
          <a href="form.php">
            <div><img src="./img/pixta/92177384.jpg" alt=""></div>
            <p>Contact</p>
          </a>
        </li>
      </ul>
    </nav>
  </header>

  <main>
    <!--FV部分----------------------------  -->
    <section class="contact_top">
      <p class="contact_fv">
        <img src="./img/photoAC/23322332_m.jpg" alt="">
      </p>
      <h1>Contact</h1>
    </section>

    <!--フォーム部分----------------------------  -->
    <form action="form.php" method="post">
      <!-- 氏名 ------------------------------>
      <div class="fo_name">
        <div class="name_title">
          <p>必須</p>
          <p>氏名</p>
        </div>
        <div class="name_inp">
          <div class="na_inp_01">
            <label for="F_name">姓</label>
            <input type="text" name="First_name" value="<?php if(isset($First_name)){echo $First_name;} ?>" id="F_name" required placeholder="山田">
          </div>
          <div class="na_inp_02">
            <label for="L_name">名</label>
            <input type="text" name="Last_name" value="<?php if(isset($Last_name)){echo $Last_name;} ?>" id="L_name" required placeholder="太郎">
          </div>
        </div>
      </div>

      <!-- メールアドレス ------------------------------>
      <div class="fo_mail">
        <div class="fo_mail_01">
          <div class="mail_title">
            <p>必須</p>
            <p>メールアドレス</p>
          </div>
          <input type="email" name="yourmail" value="<?php if(isset($yourmail)){echo $yourmail;} ?>" class="yourmail" required>
        </div>
        <div class="fo_mail_02">
          <div class="mail_title">
            <p>必須</p>
            <p>メールアドレス（確認）</p>
          </div>
          <input type="email" name="yourmail_check" value="<?php if(isset($yourmail)){echo $yourmail;} ?>" class="yourmail_check" required>
        </div>
      </div>

      <!-- 電話番号 ------------------------------>
      <div class="fo_tel">
          <div class="tel_title">
            <p>必須</p>
            <p>電話番号</p>
          </div>
          <input type="tel" name="telephone" value="<?php if(isset($telephone)){echo $telephone;} ?>" class="telephone" required placeholder="000-0000">
          <span class="alertarea"></span>
        </div>

      <!-- 会社・組織名 ------------------------------>
      <div class="fo_comp">
          <div class="comp_title">
            <p>任意</p>
            <p>会社名・組織名</p>
          </div>
          <input type="text" name="company_name" value="<?php if(isset($company_name)){echo $company_name;} ?>" class="company_name">
      </div>

      <!-- お問い合わせ項目 ------------------------------>
      <div class="fo_cont">
          <div class="cont_title">
            <p>必須</p>
            <p>お問い合わせ項目</p>
          </div>
          <div class="cont_value">
            <input type="radio" name="contact" class="con_btn01" value="powa_repair" required <?php if(isset($contact)&&$contact==="powa_repair"){echo "checked";}else{echo "checked";}?>>パワコン修理について
            <input type="radio" name="contact" class="con_btn02" value="powa_maint" <?php if (isset($contact) && $contact === "powa_maint") {echo "checked";} ?>>パワコンメンテナンスについて
            <input type="radio" name="contact" class="con_btn03" value="other" <?php if (isset($contact) && $contact === "other") {echo "checked";} ?>>その他
          </div>
      </div>

      <!-- お問い合わせ内容 ------------------------------>
      <div class="fo_note">
          <div class="note_title">
            <p>任意</p>
            <p>お問い合わせ内容</p>
          </div>
          <textarea name="note" id="note_text" cols="40" rows="10"><?php  if(isset($note)){echo $note;}?></textarea>
      </div>

      <!-- 個人情報の取り扱い規程 ------------------------------>
      <div class="fo_per">
          <div class="per_title">
            <p>必須</p>
            <p>個人情報の取扱規程</p>
          </div>
          <div class="per_check">
            <input type="checkbox" name="personal" class="personal" value="check_rule" required>&nbsp;&nbsp;個人情報の取扱規程に同意する
            <p>当社の<a href="privacy.html">個人情報の取扱規程</a>について同意される方のみ送信できます。</p>
          </div>
      </div>

      <!-- 送信する ------------------------------>
      <p class="submitbtn"><input type="submit" name="submit" value="送信する&nbsp;&nbsp;▶" class="submit"></p>
    </form>

    <!--お問い合わせへのリンク部分----------------------------  -->
    <section class="journal_contact">
      <nav class="jornal_btn">
        <h4>Thanks journal</h4>
        <p>
          xxxxxxxxxx のお知らせはこちらご確認く<br>
          ださい。
        </p>
        <div>
          <a href="journal_box.html">Thanks journal一覧はこちら</a>
        </div>
      </nav>
      <nav class="contact_btn">
        <h4>Webお問い合わせ</h4>
        <p>
          Webお問い合わせは下記ボタンからお問<br>
          い合わせください。
        </p>
        <div>
          <a href="form.php">Webでのお問い合わせはこちら</a>
        </div>
      </nav>
      <nav class="tel">
        <h4>お電話からのお問い合わせはこちら</h4>
        <p>
          XX-XXXX-XXXX
        </p>
        <div>受付 / 平日 09:00 ~ 17:00</div>
      </nav>
    </section>
  </main>

  <!--フッター部分----------------------------  -->
  <footer>
    <div class="footer_logo">
      <img src="./img/ロゴ/image001.png" alt="">
    </div>
    <nav class="footer_nav">
      <ul>
        <li class="footer_link">
          <a href="#">HOME</a>
        </li>
        <li class="footer_link">
          <a href="maintenans.html">メンテナンスについて</a>
        </li>
        <li class="footer_link">
          <a href="reason.html">xxxxxxxxの事業内容</a>
        </li>
        <li class="footer_link">
          <a href="flow.html">修理・メンテナンスの流れ</a>
        </li>
        <li class="footer_link">
          <a href="faq.html">よくあるご質問</a>
        </li>
        <li class="footer_link">
          <a href="company.html">企業情報</a>
        </li>
        <li class="footer_link">
          <a href="journal.html">Thanks journal</a>
        </li>
        <li class="footer_contact">
          <a href="form.php">Contact</a>
        </li>
      </ul>
    </nav>
    <div class="copyright">
      <aside class="copyright_link">
        <p><a href="privacy.html">プライバシーポリシー</a></p>
        <p><a href="sitemap.html">サイトマップ</a></p>
      </aside>
      <div>Copyright@ 2023 xxxx xxxx All Right Reserved</div>
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <script src="./js/main.js"></script>
  <script src="./js/sub.js"></script>
  <script src="./js/sub_contact.js"></script>
</body>
</html>