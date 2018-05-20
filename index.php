 <?php include 'connect.php'; ?>
<html>
    <head>
        <title>Ems</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        
        <div class="head">Header</div>
		<div class="middle">
Hey <?php if(isset($_SESSION['email'])) {echo ' '.htmlentities($_SESSION['email']);} /* $query = mysqli_query($link,'select username_f,username_s from user_info where email = ".$_SESSION["email"]."'); $db = mysqli_fetch_array($query); echo htmlentities($db['username_f'].' '.$db['username_s']);*/  ?> <br/>
Welcome to Your Ems<br/><br/>
<a href='peoples.php'><button class="bg-info">Click Here to See Ems's Users</button></a><br/><br/>

<?php
if(isset($_SESSION['email']))
{
    $dataB = mysqli_query($link,'select count(*) as new_msg from pm where ((user1="'.$_SESSION['userid'].'" and user1read="no") or (user2="'.$_SESSION['userid'].'" and user2read="no")) and id2="1"');
    $dbase = mysqli_fetch_array($dataB);
    $new_msg = $dbase['new_msg'];
?>

<a href='update_user_info.php'>Click here to Edit personal information</a><br/>
<a href='view_msg.php'>You have (<?php echo $new_msg; ?> unread) messages</a><br/>
<a href='in_out.php'>Logout</a><br/>
<?php
}
else
{
?>
<a href='signup.php'><button class="bg-success">Sign up</button></a><br/><br/>
<a href='in_out.php'><button class="btn-sm">Login</button></a><br/><br/>
<?php
}
?> 
		</div>

        <div class="footer">
            <a href="index.php" role="button" class="btn-primary">&#169; Go Home</a> - <a href="#">&#174; rarSoftware</a>           
        </div> 
        
        
        
        
     </body>
</html>