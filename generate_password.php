<?php
$password = "d5CckbhdhKdmZ4mG";
$encryptKey = "rE!wec#PpcnDK7*&5S#V87kRc69G2zVe";
$encrypted = md5($password . $encryptKey . $password . $encryptKey . $password . $encryptKey);
echo $encrypted;
?>