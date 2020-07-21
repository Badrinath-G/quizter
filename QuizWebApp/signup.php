<?php

$con = mysqli_connect('localhost','root');

    $name = $pass = $conpass = '';

    $errors = array('','','');


    if(isset($_POST['submit']))
    {
        if(empty($_POST['username'])){
            $errors[0] = 'Required this field';
        }
        else{
            $name =htmlspecialchars($_POST['username']);
        }
        if(empty($_POST['Password'])){
            $errors[1] = 'Required this field';
        }
        else{
            $pass =htmlspecialchars($_POST['Password']);
        }
        if(empty($_POST['conpass'])){
            $errors[2] = 'Required this field';
        }
        else{
            $conpass = htmlspecialchars($_POST['conpass']);
        }

        mysqli_select_db($con,'quizdbase');

        $qry = "select * from signup where username='$name' && pass='$pass' ";

        $res = mysqli_query($con,$qry);

        $num = mysqli_num_rows($res);

        if($num==1)
        {
            $errors[0] =  "User already exists";
        }

        if($pass!=$conpass)
        {
            $errors[1] = 'Passwords fields do not match';
            $errors[2] = 'Passwords fields do not match';
        }
        
        if(array_filter($errors))
        {
            //echo errors in the form
        }
        else
        {
            $ql = "insert into signup(username,pass) values ('$name','$pass')";

            if(mysqli_query($con,$ql))
            {
                header('location:index.php');
            }
            else
            {
                echo "Query Error". mysqli_error($con);
            }
            
        }
    }

?>

<!DOCTYPE html>
<html>
<head>
    <title>QuizWebApp</title>
    <link rel="stylesheet" type="text/css" href="mystyle2.css?<?php echo time(); ?>">
    <link rel="stylesheet" type="text/css" href="mystylemob.css?<?php echo time(); ?>" />
</head>
<body>

    <section class="container">
        <div class="signupform">
            <h2 style="letter-spacing:.2em">Register Form</h2>
            <div class="logincontent">
                <form action="signup.php" method="POST">
                    <label for="username"class="ls">UserName</label><br />
                    <input type="text" name="username" placeholder="Type here"  class="ls lsm"/><br />
                    <div class="rt"><?php echo $errors[0]; ?></div><br />
                    <label for="Password" class="ls">Password</label><br />
                    <input type="password" name="Password" placeholder="Type here"  class="ls lsm"/><br />
                    <div class="rt"><?php echo $errors[1]; ?></div><br />
                    <label for="Password" class="ls">Confirm Password</label><br />
                    <input type="password" name="conpass" placeholder="Type here"  class="ls lsm"/><br />
                    <div class="rt"><?php echo $errors[2]; ?></div><br />
                    <button type="submit" name="submit" class="lsb">SIGN UP</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>