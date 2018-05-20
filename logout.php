<?php
include "dbConnect.php";
if(isset($_SESSION['email']))
{
    unset($_SESSION['email'],$_SESSION['clientid']);
	header('Location:indexHome.php');
	//echo $_SESSION['email'];
}
?>