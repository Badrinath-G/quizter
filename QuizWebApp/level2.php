<?php

    session_start();

    $con = mysqli_connect('localhost','root');

    mysqli_select_db($con,'quizdbase');
    
   $s2 = 0;

   $myname = $_SESSION['username'];

    if(isset($_POST['next']))
        {
            if(!empty($_POST['check']))
            {
                $attempt2 = count($_POST['check']);

                $_SESSION['a2'] = $attempt2;

                $i=6;

                $selected2 = $_POST['check'];

                $sql = "select * from level2 ";
                $sq = mysqli_query($con,$sql);

                while($rows = mysqli_fetch_array($sq))
                {
                    $checked2 = $rows['ans_id'] == $selected2[$i];

                    if($checked2)
                    {
                        $s2++;
                    }

                    $i++;
                }
            }
            else
            {
                $_SESSION['a2'] = 0;
            }

            $q1 = "update scores  set s2={$s2} where uname = '{$myname}'";
    
            $q11 = mysqli_query($con,$q1);

            echo $s2;

            header('location:level3.php');
        }

        if(isset($_POST['previous']))
        {
            header('location:level1.php');
        }

        if(isset($_POST['logout']))
        {
            $sqry = "update scores set ptr='level2.php' where uname = '{$myname}'";
            $sqry1 = mysqli_query($con,$sqry);

            header('location:index.php');
        }

        
        $_SESSION['s2'] = $s2;

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
                <h1>Level 2</h1>
            </div>

            <div style="">

            <form action="level2.php" method="POST">

                <?php

                $qq = "select * from level2 order by rand() ";

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
                    <button type="submit" name="previous" class="logb b2">previous</button>
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

    <? mysqli_close($con); ?>

</body>
</html>