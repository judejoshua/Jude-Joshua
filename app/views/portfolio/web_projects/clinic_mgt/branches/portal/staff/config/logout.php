<?php

session_start();

unset($_SESSION["staffid"]);

unset($_SESSION["staffuid"]);

unset($_SESSION["staffrole"]);


header("location:../");

?>