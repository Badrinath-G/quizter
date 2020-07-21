<?php

    session_start();

    $con = mysqli_connect('localhost','root');

    mysqli_select_db($con,'quizdbase');

   $s4 = 0;

   $myname = $_SESSION['username'];

   if(isset($_POST['submit']))
   {
       if(!empty($_POST['check']))
       {
           $attempt4 = count($_POST['check']);

           $_SESSION['a4'] = $attempt4;

          
           $i=16;

           $selected4 = $_POST['check'];

           $sql = "select * from level4 ";
           $sq = mysqli_query($con,$sql);

           while($rows = mysqli_fetch_array($sq))
           {
               $checked4 = $rows['ans_id'] == $selected4[$i];

               if($checked4)
               {
                   $s4++;
               }

               $i++;
           }

           
       }
       else
       {
           $_SESSION['a4'] = 0;
       }

        $q1 = "update scores  set s4={$s4} where uname = '{$myname}'";
        $q11 = mysqli_query($con,$q1);

       header('location:results.php');
   }

   if(isset($_POST['previous']))
    {
        header('location:level3.php');
    }

    if(isset($_POST['logout']))
    {
        $sqry = "update scores set ptr='level4.php' where uname = '{$myname}'";
        $sqry1 = mysqli_query($con,$sqry);

        header('location:index.php');
    }

   $_SESSION['s4'] = $s4;
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
                <h1>Level 4</h1>
            </div>

            <div style="">

            <form action="level4.php" method="POST">

                <?php

                $qq = "select * from level4 order by rand() ";

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
                    <button type="submit" name="submit" class="logb b2">submit</button>
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