<?php
  include "../Registration/connectionRegistration.php";

  session_start();

  $usernames = $_SESSION['username'];
  echo $usernames;

  include ('../Profile/profile.html');
?>