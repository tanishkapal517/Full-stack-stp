<?php
  session_start();
  $_SESSION = array();
  if(ini_get("session.use_cookies")){
    $parma = session_get_cookie_params();
    setcookie(session_name(), "", time()-4000, $parma["path"], $parma["domain"], $parma["secure"], $parma["httponly"]);
  }
  session_destroy();
  header("location:index.php");
?>