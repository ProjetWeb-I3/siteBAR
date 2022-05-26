<?php

session_start();

require("../../Models/DatabaseModel/connect.php");

$_SESSION = array();
session_unset();
session_destroy();
header("location: ../../index.php");
