<?php

// フォーム送信されたかどうか確認
if (isset($_POST['submit'])) {
  // 送信された値を取得
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  // 入力値のバリデーション
  if ($name == '') {
    $error['name'] = '名前を入力してください';
  }
  if ($email == '') {
    $error['email'] = 'メールアドレスを入力してください';
  }
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error['email'] = '正しいメールアドレスを入力してください';
  }
  if ($message == '') {
    $error['message'] = 'メッセージを入力してください';
  }

  // エラーがない場合は入力情報を表示
  if (!isset($error)) {
    echo '<p>ご入力ありがとうございます。</p>';
    echo '<p>名前：' . $name . '</p>';
    echo '<p>メールアドレス：' . $email . '</p>';
    echo '<p>メッセージ：' . $message . '</p>';
  } else {
    // エラーがある場合はエラーメッセージを表示
    foreach ($error as $key => $value) {
      echo '<p class="error">' . $value . '</p>';
    }
  }
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>フォーム送信</title>
</head>
<body>
  <h1>お問い合わせ</h1>
  <form action="" method="post">
    <label for="name">名前：</label>
    <input type="text" id="name" name="name" value="<?php if (isset($name)) {echo $name;} ?>">
    <br>
    <label for="email">メールアドレス：</label>
    <input type="email" id="email" name="email" value="<?php if (isset($email)) {echo $email;} ?>">
    <br>
    <label for="message">メッセージ：</label>
    <textarea id="message" name="message"><?php if (isset($message)) {echo $message;} ?></textarea>
    <br>
    <input type="submit" name="submit" value="送信">
  </form>
</body>
</html>
