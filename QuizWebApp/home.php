<?php

    session_start();

    $con = mysqli_connect('localhost','root');

    mysqli_select_db($con,'quizdbase');

    $myname = $_SESSION['username'];

    if(isset($_POST['start']))
    {

        $mq = "select * from scores where uname='$myname'";
        $mq1 = mysqli_query($con,$mq);

        if(mysqli_num_rows($mq1))
        {
            header('location:level1.php');
        }
        else
        {

            $iq = "insert into scores(uname) values('{$myname}')";
            $iq1 = mysqli_query($con,$iq);
            
            header('location:level1.php');

        }

        //$iq = "insert into scores(uname) values('{$myname}')";
        //$iq1 = mysqli_query($con,$iq);

        //header('location:level1.php');
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
    <link rel="stylesheet" type="text/css" href="home.css?<?php echo time(); ?>">
    <link rel="stylesheet" type="text/css" href="mystylemob.css?<?php echo time(); ?>" />
</head>
<body>
    <section>
        <div class="row">
            <h2 style="text-align:center">Welcome <?php echo $myname."!"; ?></h2>
            <h3 style="margin-left:1.4em">Instructions:</h3>
            <ol>
                <li>This Quiz consists of <b>FOUR</b> levels.</li>
                <li>Each Level contains <b>FIVE</b> questions.</li>
                <li>Each Question contains <b>FOUR</b> options in which you have to choose only <b>ONE</b>.</li>
                <li>Each question carries <b>ONE</b> mark and no marks will be deducted for <b>WRONG Answering</b>.</li>
            </ol>
            <form action="home.php" method="POST">
                <div class="sdiv">
                    <button type="submit" name="start" class="srtbut">START</button><br /><br />
                </div>
            </form>
        </div>
    </section>
</body>
</html>