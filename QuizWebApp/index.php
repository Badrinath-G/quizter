<?php

    session_start();

    $con = mysqli_connect('localhost','root');

    mysqli_select_db($con,'quizdbase');

    $user_name = $user_pass = '';

    $errors = array('','');

    if(isset($_POST['submit']))
    {
        if(empty($_POST['username']))
        {
            $errors[0] = "This field is mandatory";
        }
        else
        {
            $user_name=$_POST['username'];
            $_SESSION['username'] = $user_name;
        }
        if(empty($_POST['Password']))
        {
            $errors[1] = "This field is mandatory";
        }
        else
        {
            $user_pass=$_POST['Password'];
        }

        $checkquery = "select * from signup where username='$user_name' && pass='$user_pass'";

        $run = mysqli_query($con,$checkquery);

        if(mysqli_num_rows($run))
        {
            $ck = "select * from scores where uname='$user_name'";
            $ck1 = mysqli_query($con,$ck);

            $stbarr = mysqli_fetch_array($ck1);

            $fpt = $stbarr['ptr'];

            if($fpt!=NULL)
            {
                header('location:'.$fpt);
            }
            else
            {
                header('location:home.php');
            }
        }
        else
        {
            $errors[0] = "No user found! Sign Up for the access";
        }
    }  

?>

<!DOCTYPE html>
<html>
<head>
    <title>QuizWebApp</title>
    <link rel="stylesheet" type="text/css" href="mystyle.css?<?php echo time(); ?>" />
    <link rel="stylesheet" type="text/css" href="mystylemob.css?<?php echo time(); ?>" />
</head>
<body>
    <section>
        <div class="heading">
            <nav>
            <ul class="navul">
                <li style="letter-spacing:.4em"><a href="index.php">QUIZTER</a></li>
                <li></li>
                <div class="spacer"></div>
                <li><a href="signup.php">SIGN UP</a></li>
            </ul>
            <nav>
        </div>
    </section>

    <section class="container">
        <div class="loginform">
            <h2>Member Login</h2>
            <div class="logincontent">
                <form action="index.php" method="POST">
                    <label for="username"class="ls">UserName</label><br />
                    <input type="text" name="username" placeholder="Type here" class="ls lsm"/><br />
                    <div style="color:red"><?php echo $errors[0]; ?></div><br />
                    <label for="Password" class="ls">Password</label><br />
                    <input type="password" name="Password" placeholder="Type here" class="ls lsm"/><br />
                    <div style="color:red"><?php echo $errors[1]; ?></div><br />
                    <button type="submit" name="submit" class="lsb">LOGIN</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>