<?php

    session_start();

    $con = mysqli_connect('localhost','root');

    mysqli_select_db($con,'quizdbase');

    $myname = $_SESSION['username'];

    $totattempted = $_SESSION['a1'] + $_SESSION['a2'] + $_SESSION['a3'] + $_SESSION['a4'];

    $sl1 = "select s1,s2,s3,s4 from scores where uname='{$myname}'";

    $sl11 = mysqli_query($con,$sl1);

    $sarr = mysqli_fetch_array($sl11);

    $score = $sarr['s1'] + $sarr['s2'] + $sarr['s3'] + $sarr['s4'];

    $scq = "update scores set total='$score' where uname = '{$myname}'";
    $scq1 = mysqli_query($con,$scq);

    if(isset($_POST['logout']))
    {
       header('location:index.php');
    }

    if(isset($_POST['brd']))
    {
        header('location:board.php');
    }

?>

<!DOCTYPE html>
<html>
<head>
    <title>Your Score</title>
    <link rel="stylesheet" type="text/css" href="results.css?<?php echo time(); ?>" />
    <link rel="stylesheet" type="text/css" href="mystylemob.css?<?php echo time(); ?>" />
</head>
<body>
    <section class="pos">
        <div class="scoreboard">
            <table>
                <th>Description</th><th>Value</th>
                <tr><td>No of questions attempted</td><td><?php echo $totattempted; ?></td></tr>
                <tr><td>Total Score</td><td><?php echo $score; ?></td></tr>
            </table>
            <form action="results.php" method="POST">
                <button name="brd" class="ldr">VIEW LEADERBOARD</button>
            </form>
        </div>
        <div class="flog">
            <form action="results.php" method="POST">
            <button type="submit" name="logout" class="flogb">log out</button>
            </form>
        </div>
    </section>
</body>
</html>