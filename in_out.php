<?php include 'connect.php'; ?>
<html>
    <head>
        <title>Login</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        
        <div class="head">Header</div>
        
        
<?php
if(isset($_SESSION['email']))
{
    unset($_SESSION['email'],$_SESSION['userid']);


    header('Location:index.php');
}
else
{
    if(isset($_POST['email'] , $_POST['password']))
    {
        $login_id = $_POST['email'];
		$login_password = $_POST['password'];
    
        $dataB = mysqli_query($link,'select id,password from user_info where email="'.$login_id.'"');
        $dbase = mysqli_fetch_array($dataB);
		
	if($dbase['password']==$login_password and mysqli_num_rows($dataB)>0)
            {
				$form = false;
				$_SESSION['email'] = $_POST['email'];
				$_SESSION['userid'] = $dbase['id'];
                
                                header('Location:index.php');

        }
    
else
{
    $form = true;
    $warning_msg = "The email or password seems to be incorrect.";
}

}
else
{
    $form = true;
}

if($form)
{
    if(isset($warning_msg))
    {
        echo '<div class="msg">'.$warning_msg.'</div>';
    }
?>
        <div class="middle">
            <form action="in_out.php" method="POST" class="form-inline">
                <div class="">
                Give Your ID to login : 
                <br/><br/>
                <input type="email" class="form-control" name="email" placeholder="Your Email.." value="">
                    <br/><br/>
                <input type="password" class="form-control" name="password" placeholder="Your Password.."><br/><br/>
                <input type="submit" name="submit" value="login">
                </div>
            </form>
            
        </div>
<?php
}
    
}
?>
         <div class="footer">
            <a href="index.php" role="button" class="btn-primary">&#169; Go Home</a> - <a href="#">&#174; rarSoftware</a>           
        </div>  
        
         </body>
</html>