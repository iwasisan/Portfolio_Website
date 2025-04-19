<?php
session_start(); 
if($_SESSION['token'] === $_POST['token']){  // #1

  if(isset($_SESSION['First_name'])){
  $First_name = $_SESSION['First_name'];
  $Last_name = $_SESSION['Last_name'];
  $yourmail = str_replace(array("\r","\n"),'',$_SESSION['yourmail']);
  $telephone = $_SESSION['telephone'];
  $company_name = $_SESSION['company_name'];
  $contact = $_SESSION['contact'];
  $note = $_SESSION['note'];
}// #2
// 自分に送るお問い合わせ内容メールを構築
  $to = "自分のメールアドレス"; 
  $mailtitle = "{$First_name}様よりお問い合わせが届きました。";
  $contents = <<<EOD

  ◆お名前
  {$First_name}{$Last_name}

  ◆メールアドレス
  {$yourmail}

  ◆電話番号
  {$telephone}

  ◆会社・組織名
  {$company_name}

  ◆件名
  {$contact}

  ◆内容
  {$note}

EOD;
  $from = "Return-Path: " . $yourmail . "\r\n";
  $from = $from . 'From: ' . $yourmail;//送信元メールアドレス

  // 相手に送る送信完了メールを構築
  $to2 = $yourmail;
  $mailtitle2 = "【自動送信】受付を完了いたしました。";
  $contents2 = <<<EOD
  お問い合わせありがとうございます。
  以下の内容を送信いたしました。
  必ず返信いたしますのでしばらくお待ちください。
  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        
  {$contents}

  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
      E-mail: email@email.com
      サイト運営者：〇〇
EOD;
  $from2 = "Return-Path:" . $to . "\r\n";
  $from2 =  $from2 . 'From: ' . $to;

  mb_language("Japanese");
  mb_internal_encoding("UTF-8");

  $param = "-f" . $to;
  //  mb_send_mail(送信先,タイトル,本文,追加ヘッダ,追加コマンドラインパラメータ)
  if (mb_send_mail($to2, $mailtitle2, $contents2, $from2, $param)) { // 相手に送信 // #3

  $message = '<p class="question-text">『' . $yourmail . '』宛に確認メールを送信しました<br>お問い合わせありがとうございます。</p>';

  if (mb_send_mail($to,$mailtitle,$contents,$from,$param)) { // 自分に送信 // #4

  // 終了処理開始 セッションの破棄
  $_SESSION = [];
  if (isset($_COOKIE[session_name()])) {  // #5
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params['httponly']);
  }
  session_destroy();
  } else{
    $message = '<p class="question-text error">何らかの理由で送信エラーが発生しました<br>しばらく待ってから再度送信してください</p>';
  }
} else{
  $message = '<p class="question-text error">『' . $yourmail . '』宛に確認メールを送信できませんでした。<br>正しいメールアドレスで再度ご連絡をお願いいたします。</p>';
}
} else {  
  header('Location:http://localhost/form.php');
}  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
  if ($message !== "") {
    echo $message;
  }
  ?>
  <a href="form.php">TOPに戻る</a>
</body>
</html>