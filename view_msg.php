<?php include 'connect.php' ?>
<html>
    <head>
        <title>Message</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        
        <div class="head">Header</div>
        <div class="middle">
            
<?php
if(isset($_SESSION['email']))
{
    $dataB = mysqli_query($link,'select m1.id, m1.title, m1.timestamp, count(m2.id) as reps, user_info.id as userid, user_info.username_f from pm as m1, pm as m2,user_info where ((m1.user1="'.$_SESSION['userid'].'" and m1.user1read="no" and user_info.id=m1.user2) or (m1.user2="'.$_SESSION['userid'].'" and m1.user2read="no" and user_info.id=m1.user1)) and m1.id2="1" and m2.id=m1.id group by m1.id order by m1.id desc');
    $dbase = mysqli_query($link,'select m1.id, m1.title, m1.timestamp, count(m2.id) as reps, user_info.id as userid, user_info.username_f from pm as m1, pm as m2,user_info where ((m1.user1="'.$_SESSION['userid'].'" and m1.user1read="yes" and user_info.id=m1.user2) or (m1.user2="'.$_SESSION['userid'].'" and m1.user2read="yes" and user_info.id=m1.user1)) and m1.id2="1" and m2.id=m1.id group by m1.id order by m1.id desc');
?>
            <a href="new_msg.php">Send Message</a><br/><br/>
            Your Messages : <br/><br/>
            <h4>Unread Message (<?php echo intval(mysqli_num_rows($dataB)); ?>)</h4>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Message</th>
                        <th>Replies</th>
                        <th>User</th>
                        <th>Created&nbsp;on</th>
                    </tr>
                </thead>
<?php
while($db=  mysqli_fetch_array($dataB))
{
?>
                <tr>
                    
                    <td><a href="read_msg.php?id=<?php echo $db['id']; ?>"><?php echo htmlentities($db['userid']); ?></a></td>
                    <td><?php echo $db['reps']-1; ?></td>
                    <td><a href="profile.php?id=<?php echo $db['userid'] ?>"><?php echo htmlentities($db['username_f']) ?></a></td>
                    <td><?php echo date('Y/m/d H:i' ,$db['timestamp']); ?></td>
                </tr> 
<?php                
}
if(intval(mysqli_num_rows($dataB))==0)
{
?>
                <tr>
                    <td>No New Message</td>
                </tr>
<?php                
}
?>
            </table> <br/><br/>
            <h4>Read Message (<?php echo intval(mysqli_num_rows($dbase)); ?>)</h4>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Message</th>
                        <th>Replies</th>
                        <th>User</th>
                        <th>Created&nbsp;on</th>
                    </tr>
                </thead>
<?php
while($db_new = mysqli_fetch_array($dbase))
{
?>
                <tr>
                    <td><a href="read_msg.php?id=<?php echo $db_new['id']; ?>"><?php echo htmlentities($db_new['userid']); ?></a></td>
                    <td><?php echo $db_new['reps']-1; ?></td>
                    <td><a href="profile.php?id=<?php echo $db_new['userid'] ?>"><?php echo htmlentities($db_new['username_f']) ?></a></td>
                    <td><?php echo date('Y/m/d H:i' ,$db_new['timestamp']); ?></td>
                </tr>
<?php

}
if(intval(mysqli_num_rows($dbase))==0)
{
?>
                <tr>
                    <td></td>
                </tr>
<?php                
}
?>

            </table><br/>
<?php            
            
}
else
{
    header('Location:index.php');
}
            
?>            
            
            
    </div>
        
        <div class="footer">
            <a href="index.php" role="button" class="btn-primary">&#169; Go Home</a> - <a href="#">&#174; rarSoftware</a>           
        </div>
        
        
    </body>
</html>