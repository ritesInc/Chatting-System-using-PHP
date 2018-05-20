<?php include 'connect.php' ?>
<html>
    <head>
        <title>message reading</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        
        <div class="head">Header</div>
<?php
if(isset($_SESSION['email']))
{
    if(isset($_GET['id']))
    {
        $id = intval($_GET['id']);
        $dataB = mysqli_query($link,'select user1, user2 from pm where id="'.$id.'" and id2="1"');
        $db = mysqli_fetch_array($dataB);
        
        if(mysqli_num_rows($dataB)==1)
        {
            if($db['user1']==$_SESSION['userid'] or $db['user2']==$_SESSION['userid'])
            {
                if($db['user1']==$_SESSION['userid'])
                {
                    mysqli_query($link,'update pm set user1read="yes" where id="'.$id.'" and id2="1"');
                    $partition = 2;
                }
                else
                {
                    mysqli_query($link,'update pm set user2read="yes" where id="'.$id.'" and id2="1"');
                    $partition = 1;
                }
                $dbase = mysqli_query($link,'select pm.timestamp, pm.message, user_info.id as userid, user_info.username_f  from pm, user_info where pm.id="'.$id.'" and user_info.id=pm.user1 order by pm.id2');
                if(isset($_POST['message']) and $_POST['message']!='')
                {
                    $msg = $_POST['message'];
                    if(mysqli_query($link,'insert into pm (id, id2, user1, user2, message, timestamp, user1read, user2read)values("'.$id.'", "'.(intval(mysqli_num_rows($dbase))+1).'", "'.$_SESSION['userid'].'", "", "'.$msg.'", "'.time().'", "", "")') and mysqli_query($link,'update pm set user'.$partition.'read="yes" where id="'.$id.'" and id2="1"'))
                    
                    {
                        header('refresh:0;');
//-------------trying to go to same page when sends message-----------------------//
        
       
                    }
                    else
                    {
?>                        
        <div class="msg">Error occurred while sending message<br/><br/>
            <a href="read_msg.php?id=<?php echo $id; ?>">Back to discussion</a>
        </div>
<?php        
                    }
                }
                else
                {
?>
        <div class="middle">
            <h2>Messages</h2>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>user</th>
                        <th>message</th>
                    </tr>
                </thead>
<?php

while($db_new = mysqli_fetch_array($dbase))
{
?>
                <tr>
                    <td><?php echo "<img class='img-thumbnail' src='img.jpg' style='height:82;width:98;'>"; ?><br/><a href="profile.php?id=<?php echo $db_new['userid']; ?>"><?php echo $db_new['username_f']; ?></a></td>
                    <td><div class="lol">Sent : <?php echo date('m-d H:i' ,$db_new['timestamp']); ?></div><?php echo $db_new['message']; ?></td>
                    
                    
                </tr>
<?php                
}
?>
            </table><br/><br/>
            <h3>Reply</h3>
            <div class="">
                <form action="read_msg.php?id=<?php echo $id; ?>" method="POST">
                    <div class="">Message</div>
                    <textarea name="message" class="form-control"></textarea><br/><br/>
                    <button type="submit" class="btn-primary">Send</button>
                    
                </form>
            </div>
                
        </div>
<?php

                }
            }
            else
            {
                echo '<div class="msg">You can\'t access this page</div>';
            }
        }
        else
        {
            echo '<div class="msg">Chat doesn\'t exist</div>';
        }
    }
    else
    {
        echo '<div class="msg">Chat *** is not defined.</div>';
    }
}
else
{
    header('Location:index.php');
}
?>
        <div class="footer">
            <a href="index.php" role="button" class="btn-primary">&#169; Go Home</a> - <a href="#">&#174; rarSoftware</a>           
        </div>
        
    </body>
</html>