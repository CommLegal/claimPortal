<?php
$password = "password12345";
$encryptKey = "rE!wec#PpcnDK7*&5S#V87kRc69G2zVe";
$encrypted = md5($password . $encryptKey . $password . $encryptKey . $password . $encryptKey);
echo $encrypted;
?>