<?php
     setcookie("Auth" ,'TRUE',time() - 1,'/');

     echo '<script> alert("Success Full Logout"); 

     window.location.href="./auth-login.php";
     </script>';

?>