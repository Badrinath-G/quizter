<?php

    session_start();

    $con = mysqli_connect('localhost','root');

    mysqli_select_db($con,'quizdbase');

   $s3 = 0;

   $myname = $_SESSION['username'];

   if(isset($_POST['next']))
   {
       if(!empty($_POST['check']))
       {
           $attempt3 = count($_POST['check']);

           $_SESSION['a3'] = $attempt3;

           $i=11;

           $selected3 = $_POST['check'];

           $sql = "select * from level3 ";
           $sq = mysqli_query($con,$sql);

           while($rows = mysqli_fetch_array($sq))
           {
               $checked3 = $rows['ans_id'] == $selected3[$i];

               if($checked3)
               {
                   $s3++;
               }

               $i++;
           }
       }
       else
       {
           $_SESSION['a3'] = 0;
       }

        $q1 = "update scores  set s3={$s3} where uname = '{$myname}'";
        $q11 = mysqli_query($con,$q1);

       header('location:level4.php');
   }

   if(isset($_POST['previous']))
    {
        header('location:level2.php');
    }

    if(isset($_POST['logout']))
    {
        $sqry = "update scores set ptr='level3.php' where uname = '{$myname}'";
        $sqry1 = mysqli_query($con,$sqry);

        header('location:index.php');
    }

   $_SESSION['s3'] = $s3;

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
                <h1>Level 3</h1>
            </div>

            <div style="">

            <form action="level3.php" method="POST">

                <?php

                $qq = "select * from level3 order by rand() ";

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