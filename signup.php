<html>
    <head>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="js/bootstrap.min.js" rel="stylesheet">
    </head>
    <body>
<?php
include 'connect.php';

if(isset($_POST['submit']))
{
    $username_f=$_POST['username_f'];
    $username_s=$_POST['username_s'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $sex = $_POST['sex'];
    $bday = $_POST['opt1'];
    $bmonth = $_POST['opt2'];
    $byear = $_POST['opt3'];
    
     if($username_f)
       {
           if($username_s)
           {
               if($sex)
               {
                   if($password)
                   {
           
                if(strlen($password)>=6)
                {
                if(filter_var($email,FILTER_VALIDATE_EMAIL))
                   {
                    $same_email_chk = mysqli_num_rows(mysqli_query($link,'select id from user_info where email="'.$email.'"'));
              
                if($same_email_chk==0)
                { 
                  $give_id = mysqli_num_rows(mysqli_query($link,'select id from user_info'));
                  $id = $give_id+1;
                  
                  if(mysqli_query($link,'insert into user_info(id,username_f,username_s,email,password,sex,join_date) VALUES ('.$id.',"'.$username_f.'","'.$username_s.'","'.$email.'","'.$password.'","'.$sex.'","'.time().'")'));
                  {
                      $form = false;
?>
<div id="msg">You Have Been Signed up.<br/>
    Now You Can Login.<br/><a href="in_out.php">login</a>
</div>
<?php
                }}


                

else
    
 {
     $form = true;
     $warning_msg = "the Email You entered is already Taken. Please choose another email.";
 }
               }
 else {
     $form = true;
     $warning_msg = "Please Enter Valid Email Address.";
     
 }         
                
                   }
                   
                   
 else 
 {
     $form = true;
     $warning_msg = "Passord must be at least 6 character in length.";
                  
 }
                   }
                   else
                   {
                       $form = true;
                       $warning_msg = "Please Enter Your Password.";
                   }
       }
 else 
 {
     $form = true;
     $warning_msg = "Please Mention Your Gender.";
 }
           }
 else 
 {
     $form = true;
     $warning_msg = "Please Enter Your Surname";
 }
       
       }      
else
{
    $form = true;
    $warning_msg = "Please Enter Your First Name";
}

    }

else
{
    $form = true;
    //$warning_msg = "Please Enter Your Email ID.";
}

if($form)
{
    if(isset($warning_msg))
    {
        echo '<div class="msg">'.$warning_msg.'</div>';
    }
?>
  

<div class="middle" style="">
Please Fill the form to Sign up.
<div class="middle" style="">
    <form role="form" class="form-inline" method="POST" action="">
        <input type="text" class="form-control" name="username_f" placeholder="First Name" value="<?php if(isset($_POST['username_f'])) { echo htmlentities($_POST['username_f']);} ?>">
        <br/><br/>
        <input type="text"  class="form-control" name="username_s" placeholder="Surname" value="<?php if(isset($_POST['username_s'])) { echo htmlentities($_POST['username_s']);} ?>">
        </br><br/>
        <input type="text"  class="form-control" name="email" placeholder="Email" value="<?php if(isset($_POST['email'])) { echo htmlentities($_POST['email']);} ?>">
        <br/><br/>
        <input type="password"  class="form-control" name="pass" placeholder="Password">
        <br/><br/>
        <select name="sex" class="form-control">
            <option value="female">Female</option>
            <option value="male">Male</option>
            <option value="other">Other</option>
         </select>   
          <br/>  
        <select name="opt1" class="form-control">
            <option name="Bday" value="1">1</option>
            <option value="1">2</option>
            <option value="1">3</option>
            <option value="1">4</option>
            <option value="1">5</option>
            <option value="1">6</option>
            <option value="1">7</option>
            <option value="1">8</option>
            <option value="1">9</option>
            <option value="1">10</option>
            <option value="1">11</option>
            <option value="1">12</option>
            <option value="1">13</option>
            <option value="1">14</option>
            <option value="1">15</option>
            <option value="1">16</option>
            <option value="1">17</option>
            <option value="1">18</option>
            <option value="1">19</option>
            <option value="1">20</option>
            <option value="1">21</option>
            <option value="1">22</option>
            <option value="1">23</option>
            <option value="1">24</option>
            <option value="1">25</option>
            <option value="1">26</option>
            <option value="1">27</option>
            <option value="1">28</option>
            <option value="1">29</option>
            <option value="1">30</option>
            <option value="1">31</option>
            
        </select>
          
        <select name="opt2" class="form-control">
            <option name="Bmonth" value="jan">Jan</option>
            <option value="feb">Feb</option>
            <option value="mar">March</option>
            <option value="apr">April</option>
            <option value="may">May</option>
            <option value="june">June</option>
            <option value="july">July</option>
            <option value="aug">Aug</option>
            <option value="sept">Sept</option>
            <option value="oct">Oct</option>
            <option value="nov">Nov</option>
            <option value="dec">Dec</option>
        </select>
         
        <select name="opt3"  class="form-control">
              <option name="Byear" value="2010">2010</option>
              <option value="2010">2011</option>
              <option value="2010">2012</option>
              <option value="2010">2013</option>
              <option value="2010">2014</option>
              <option value="2010">2015</option>
              <option value="2010">2016</option>
        </select> 
          <br/><br/>
          <button class="btn-success" type="submit" name="submit">Sign up</button>
        
        </form>
</div>
</div>
        
<?php
}

?>        
        
        <div class="footer">
            <a href="index.php" role="button" class="btn-primary">&#169; Go Home</a> - <a href="#">&#174; rarSoftware</a>           
        </div>        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
    </body>
</html>
