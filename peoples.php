<?php include "connect.php"; ?>
<html>
    <head>
        <title>users</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        
<div class="head"> Header </div> 

<div class="middle">
    Here's the Members of our place :  <br/>
    <table class="table table-hover">
        <thead>
         <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Email</th>
         </tr>
        </thead>
<?php
$p_db = mysqli_query($link,"select id,username_f,username_s,email from user_info");

while($dataB=mysqli_fetch_array($p_db,MYSQLI_ASSOC))
{
?>
        <tr>
            <td>
                <?php echo $dataB['id'];  ?>
            </td>
            <td>
                <a href="profile.php?id=<?php echo $dataB['id']; ?>"><?php echo $dataB['username_f'].' '.$dataB['username_s'];  ?></a>
            </td>
            <td>
                <?php echo $dataB['email'];  ?>
            </td>
        </tr>     
<?php } ?>
        
             
    </table>
    
    
    <div class="footer">
        <a href="index.php" role="button" class="btn-primary">&#169; Go Home</a> - <a href="#">&#174; rarSoftware</a>           
    </div>  
        
</div>
        
        
       </body>
</html>