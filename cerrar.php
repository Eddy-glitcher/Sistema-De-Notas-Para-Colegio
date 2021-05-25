<?php
session_start();
if(isset($_SESSION['Id'])){
    
    unset($_SESSION['Id']);
    session_destroy();
}

?>