<?php

session_start ();

// @TODO : verificar caso queira fazer logout sem estar a fazer login JS

unset($_SESSION['username']);
unset($_SESSION['user_id']);
header('Location: ../?pagina=home');

?>