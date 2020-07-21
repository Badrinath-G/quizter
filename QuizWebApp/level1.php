<?php

    session_start();

    $con = mysqli_connect('localhost','root');

    mysqli_select_db($con,'quizdbase');

   $s1 = 0;

   $myname = $_SESSION['username'];

       if(isset($_POST['next']))
        {
            if(!empty($_POST['check']))
            {
                $attempt1 = count($_POST['check']);

                $_SESSION['a1'] = $attempt1;

                $i=1;

                $selected1 = $_POST['check'];

                $sql = "select * from level1 ";
                $sq = mysqli_query($con,$sql);

                while($rows = mysqli_fetch_array($sq))
                {
                    $checked1 = $rows['ans_id'] == $selected1[$i];

                    if($checked1)
                    {
                        $s1++;
                    }

                    $i++;
                }
            }
            else
            {
                $_SESSION['a1'] = 0;
            }
            $q1 = "update scores  set s1={$s1} where uname = '{$myname}'";
            $q11 = mysqli_query($con,$q1);

            echo $s1;
 
            header('location:level2.php');
        }

        if(isset($_POST['logout']))
        {
            $sqry = "update scores set ptr='level1.php' where uname = '{$myname}'";
            $sqry1 = mysqli_query($con,$sqry);

            header('location:index.php');
        }
        
?>


<!DOCTYPE html>
<html>
<head>
    <title>QuizWebApp</title>
    <link rel="stylesheet" type="text/css" href="l1.css?<?php echo time(); ?>">
    <link rel="stylesheet" type="text/css" href="mystylemob.css?<?php echo time(); ?>" />
</head>
<body>
    <section>
        <div class="l1">

            <div class="l1t">
                <h1>TOPIC : MYSQL</h1>
            </div>

            <div class="l1t">
                <h1>Level 1</h1>
            </div>

            <div>

            <form action="level1.php" method="POST">

                <?php

                $qq = "select * from level1 order by rand() ";

                $qry1 = mysqli_query($con,$qq);
            
                while($rows = mysqli_fetch_array($qry1))
                {?>

                    <div class="card">
                        <h3 class="cardheader">
                            <?php echo $rows['question']; ?>
                        </h3>
                    </div>

                    <?php
            
                    $qq2 = "select * from answers where ans_id= {$rows['qid']} ";

                    $qry2 = mysqli_query($con,$qq2);

                    while($rows = mysqli_fetch_array($qry2))
                    {?>

                        <div class="card">
                            <input type="radio" name="check[<?php echo $rows['ans_id']; ?>]" value="<?php echo $rows['aid']; ?>" />
                            <?php echo $rows['answer']; ?>
                        </div>

                    <?php
                    }
                    ?>

                    <hr /><br />

                <?php
                }
                ?>

                <div class="buttons">
                    <button type="submit" name="next" class="logb b2">next</button>
                </div>

                <br /><br />

                <div class="buttons">
                    <button type="submit" name="logout" class="logbut">logout</button>
                </div>

                <br />

            </form>

            </div>

        </div>
    </section>

    <?mysqli_close($con);?>

</body>
</html>