<?php include 'connect.php';  ?>
<html>
    <head>
        <title>New Message</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        
        <div class="head">HEADER</div>
        
<?php

if(isset($_SESSION['email']))
{
    $form = true;
    $non_receiver = '';
    $non_message = '';
	
    if(isset($_POST['receiver'],$_POST['message']))
    {
        $non_receiver = $_POST['receiver'];
        $non_message = $_POST['message'];
    
        if($_POST['receiver']!='' and $_POST['message']!='')
        {
            $receiver = $non_receiver;
            $message = $non_message;
            
            $dataB = mysqli_fetch_array(mysqli_query($link,'select count(id) as getter, id as getter_id, (select count(*) from pm) as new_msg from user_info where email="'.$_POST['receiver'].'"'));
            if($dataB['getter']==1)
            {
                if($dataB['getter_id']!=$_SESSION['userid'])
                {
                    $id = $dataB['new_msg']+1;
                    if(mysqli_query($link,'insert into pm (id, id2, user1, user2, message, timestamp, user1read, user2read)values("'.$id.'", "1",  "'.$_SESSION['userid'].'", "'.$dataB['getter_id'].'", "'.$message.'", "'.time().'", "yes", "no")'))
                        {
                            $form = false;
?>
        
        <div class="msg">
            Message Sent Successfully <br/>
            <a href="view_msg.php">Message List</a>
        </div> 
<?php

                        }
                        
                
                    else
			{
                            $warning_msg = "An error occurred while sending message";
			}
		}
		else
                    {
			$warning_msg = "You can\'t send message to yourself";
                    }
            }
            else
		{
                    $warning_msg = "Receiver doesn\'t exist";
		} 
	}
	else
            {
		$warning_msg = "A field is empty.Please Fill up";
            }
    }
                
    elseif(isset($_GET['receiver']))
	{
            $non_receiver = $_GET['receiver'];
	}

if($form)
{
    if(isset($warning_msg))
    {
        echo '<div class="msg">'.$warning_msg.'</div>';
    }
?>

<div clas="middle">
    <h2>New Message</h2>
    <form action="" method="POST" class="form-inline">
    Receiver : 
    <select class="form-control" name="receiver">
<?php
        $query = mysqli_query($link,'select username_f,username_s,email from user_info');
        while($name = mysqli_fetch_array($query))
        {
?>            
        <option name="" value="<?php echo $non_receiver; ?>"><?php echo $name['username_f'].' '.$name['username_s']; ?><br/></option>
        
<?php  
    } 
?>
    
    </select>
     <br/>
    Message : 
    <textarea class="form-control" name="message" placeholder="Your Message..."></textarea>
     <br/>
    <button type="submit" class="btn-success" name="submit">Send</button>
                
                
                
                
                
            </form>
        </div>
<?php        
}
}
else
{
    header("Location:index.php");
}
?>
        <div class="footer">
            <a href="index.php" role="button" class="btn-primary">&#169; Go Home</a> - <a href="#">&#174; rarSoftware</a>           
        </div>
    
    </body>
</html>