<?php
session_start();  

if(isset($_SESSION['First_name'])){
  $First_name = $_SESSION['First_name'];
  $Last_name = $_SESSION['Last_name'];
  $yourmail = $_SESSION['yourmail'];
  $telephone = $_SESSION['telephone'];
  $company_name = $_SESSION['company_name'];
  $contact = $_SESSION['contact'];
  $note = $_SESSION['note'];
}
// 以下を追加
$token = sha1(uniqid(mt_rand(),true));
$_SESSION['token'] = $token;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>メール確認画面</title>
</head>
<body>
  <div>
  <h2 >お問い合わせ内容確認</h2>  
  <table >
    <tr>
      <th>お名前</th>
      <td><?php echo $First_name ;?>&nbsp;<?php echo $Last_name ;?></td>
    </tr>
    <tr>
      <th>メールアドレス</th>
      <td><?php echo $yourmail ;?></td>
    </tr>
    <tr>
      <th>電話番号</th>
      <td><?php echo $telephone ;?></td>
    </tr>
    <tr>
      <th>会社・組織名</th>
      <td><?php echo $company_name ;?></td>
    </tr>
    <tr>
      <th>お問い合わせ項目</th>
      <td><?php echo $contact ;?></td>
    </tr>
    <tr>
      <th>お問い合わせ内容</th>
      <td><?php echo nl2br($note);?></td>
    </tr>
  </table>
  <p>こちらの内容で送信してもよろしいですか？</p>
  <!-- POSTの送信先はsend.phpであることに注意してください -->
  <form method="post" action="send.php">
    <input type="hidden" name="token" value="<?php echo $token ?>">
    <button type="submit" value="送信">送信</button>
    <a href="form.php?action=edit">戻る</a>
  </form>
</div>
</body>
</html>