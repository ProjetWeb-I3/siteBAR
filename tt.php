<?php
// Set the password
$password = 'mypassword';
$saltMDP = '(^\$.+\$).+';
// Get the hash, letting the salt be automatically generated; not recommended
$hash = crypt("p4ssw0rd",'$6$rounds=5000$baricamstarbarstoulouse$');
echo $hash;
?>