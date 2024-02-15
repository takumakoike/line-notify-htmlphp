<?php
  $code = $_GET['code']; // code

  $data = array(
    "grant_type" => "authorization_code",
    "code" => $code,
    "redirect_uri" => "https://uperworld.com/line/cb.php",
    "client_id" => "bJSIyjA8WGs8wyHBX76bVe",
    "client_secret" => "0M9IkdBdzw4f8DpBExgfqm2aqzx1ja1aQbjesVbfwwA",
    "state" => "aaa"
  );
  $data = http_build_query($data, "", "&");

  $header = array(
    "Content-Type:application/x-www-form-urlencoded",
    "Content-Length: ".strlen($data)
  );

  $context = array(
    "http" => array(
      "method" => "POST",
      "header" => $header,
      "content" => $data,
      'ignore_errors' => true,
      'protocol_version' => '1.1',
      'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false
      )
    )
  );

  $url = "https://notify-bot.line.me/oauth/token"; // API

  $json = @file_get_contents($url, false, stream_context_create($context));
  $arr = json_decode($json);
  $accessToken = $arr->access_token;
  session_start();
  $_SESSION['accessToken'] = $accessToken; // アクセストークンをセッションに保持
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<title>LINE</title>
</head>
<body>
<h1>認証OK</h1>
<h4>メッセージ送信</h4>
<form method="POST" action="post.php">
<input type="text" name="message" value="" />
<button type="submit">送信</button>
</form>
</body>
</html>