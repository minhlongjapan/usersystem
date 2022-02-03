<!-- SESSION チェック -->

<?php
function checktime()
{
  if (!isset($_SESSION)) {
      $session = session_start();
  } 
  if ($session && !isset($_SESSION['login_time'])) {
      if ($session == 1) {
          $_SESSION['login_time']=time();        
          $_SESSION['idle_time']=$_SESSION['login_time'] + (10 * 60);
      } else{
          $_SESSION['login_time']="";
      }
  } else {
      if ((time()>$_SESSION['idle_time']) || (!isset($_SESSION['email']))){
          session_destroy();
          session_unset();
          header('Location: ../index.php');
      } 
  }
}
?>