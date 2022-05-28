<?php
$password = 123;
$encrypted_password = password_hash($password, PASSWORD_DEFAULT);
echo $encrypted_password;
?>