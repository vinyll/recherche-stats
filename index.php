<?php

$ip = isset($_SERVER['HTTP_X_FORWARDED_FOR'])
    ? $_SERVER['HTTP_X_FORWARDED_FOR']
    : $_SERVER['REMOTE_ADDR'];
$ip_parts = explode('.', $ip);

$parts = [
  date("Y-m-d H:i:s"),
  "{$ip[0]}.{$ip[1]}.0.0",
  $_SERVER['HTTP_REFERER'],
  $_POST['url'],
  $_POST['action'],
  $_POST['name'],
  "\n"
];
file_put_contents('stats.log', join("\t", $parts), FILE_APPEND);
