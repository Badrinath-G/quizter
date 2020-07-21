<?php 

    session_start();

    $con = mysqli_connect('localhost','root');

    mysqli_select_db($con,'quizdbase');

    if(isset($_POST['logout']))
    {
       header('location:index.php');
    }

?>


<!DOCTYPE html>
<html>
<head>
    <title>Your Score</title>
    <link rel="stylesheet" type="text/css" href="brd.css?<?php echo time(); ?>" />
    <link rel="stylesheet" type="text/css" href="mystylemob.css?<?php echo time(); ?>" />
</head>
<body>
    <div class="board">
        <h2>LEADER BOARD</h2>
        <table>
            <tr><th>RANK</th><th>NAME</th><th>SCORE</th></tr>
            <?php
                $ry = "select uname,total from scores order by total desc";
                $ry1 = mysqli_query($con,$ry);

                $i=1;

                while($ma = mysqli_fetch_array($ry1))
                {?>
                    <tr><td class="t1"><?php echo $i;?></td><td class="t2"><?php echo $ma['uname'];?></td><td class="t3"><?php echo $ma['total'];?></td></tr>
                <?php
                $i++;}
                ?>
        </table>
    </div>
    <form action="results.php" method="POST">
        <button type="submit" name="logout" class="flogb">log out</button>
    </form>
</body>
</html>