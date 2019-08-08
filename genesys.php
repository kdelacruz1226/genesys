<?php
$appsecret = 'YOUR APP SECRET';
$raw_post_data = file_get_contents('php://input');
$header_signature = $headers['X-Hub-Signature'];

// Signature matching
$expected_signature = hash_hmac('sha1', $raw_post_data, $appsecret);

$signature = '';
if(
    strlen($header_signature) == 45 &&
    substr($header_signature, 0, 5) == 'sha1='
  ) {
  $signature = substr($header_signature, 5);
}
if (hash_equals($signature, $expected_signature)) {
  echo('SIGNATURE_VERIFIED');
}
?>