<?php  include 'connect.php'; ?>
<html>
    <head>
        <title>profile Page</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        
        <div class="head">Header</div>
        <div class="middle">
            
<?php
$pid = $_GET['id'];
if(isset($_GET['id']))
{
   $id = intval($pid);
   $dataB = mysqli_query($link,'select username_f,username_s,email,sex,bday,bmonth,byear from user_info where id ="'.$id.'" ');
   
   if(mysqli_num_rows($dataB)>0)
   {
       $dbase = mysqli_fetch_array($dataB);
   
?>

<?php echo htmlentities($dbase['username_f'].' '.$dbase['username_s']) ?>'s Profile : 

<table>
    <tr>
        <td>
            <?php if($dbase['sex'])
            {
                /*echo '<img  class="img-thumbnail" src="'.htmlentities($dbase['pic']).' "/>';
            }
            else
            {*/
                echo "<img class='img-thumbnail' src='img.jpg' style='height:172;width:160;'>";
            }
?>            
        </td>
        <td>
            <h2><?php echo htmlentities($dbase['username_f'].' '.$dbase['username_s']) ?> </h2>
            Email : <?php echo htmlentities($dbase['email']); ?> <br/>
            Gender : <?php echo htmlentities($dbase['sex']); ?><br/>
            
        </td>
    </tr>
</table>

<?php
if(isset($_SESSION['email']) and $_SESSION['userid']!=$id)
{
?>
<a href="new_msg.php?receiver=<?php echo ($dbase['email']); ?>" class="">Send Message to <?php echo htmlentities($dbase['username_f'].' '.$dbase['username_s']); ?></a>
<?php
}
   }
   else
   {
       echo "The user you entered does not exist";
   }
}  

else
   {
        echo "User ID is not Available";
   }

?>
            
            
        </div>
        
        
<div class="footer">
            <a href="#" role="button" class="btn-primary">&#169; Go Home</a> - <a href="#">&#174; rarSoftware</a>           
        </div>          
        
        
    </body>
</html>