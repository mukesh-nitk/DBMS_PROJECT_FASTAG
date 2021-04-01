<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{
if(isset($_POST['update']))
{
$toll_id=intval($_GET['toll_id']);    
$toll_gate_name=$_POST['toll_gate_name'];
$category_1=$_POST['category_1'];
$category_2=$_POST['category_2'];
$category_3=$_POST['category_3'];   
$sql="update toll_gate set toll_gate_name=:toll_gate_name,category_3=:category_3,category_1=:category_1,category_2=:category_2 where toll_id=:toll_id";
$query = $dbh->prepare($sql);
$query->bindParam(':toll_gate_name',$toll_gate_name,PDO::PARAM_STR);
$query->bindParam(':category_3',$category_3,PDO::PARAM_STR);
$query->bindParam(':category_1',$category_1,PDO::PARAM_STR);
$query->bindParam(':category_2',$category_2,PDO::PARAM_STR);
$query->bindParam(':toll_id',$toll_id,PDO::PARAM_STR);
$query->execute();
$msg="Toll Gate Details  updated Successfully";
}

    ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>Admin | Update Toll Gate</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="../assets/plugins/materialize/css/materialize.min.css"/>
        <link type="text/css" rel="stylesheet" href="../assets/plugins/materialize/css/materialize.css"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="../assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet"> 
        <link href="../assets/css/alpha.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/custom.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/style.css" rel="stylesheet" type="text/css"/>
  <style>
        .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
        </style>
    </head>
    <body>
  <?php include('includes/header.php');?>
            
       <?php include('includes/sidebar.php');?>
            <main class="mn-inner">
                <div class="row">
                    <div class="col s12">
                        <div class="page-title" style="color: green;">Update Toll Gate Details</div>
                    </div>
                    <div class="col s12 m12 l6">
                        <div class="card">
                            <div class="card-content">
                              
                                <div class="row">
                                    <form class="col s12" name="chngpwd" method="post">
                                          <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class="succWrap"><strong>SUCCESS</strong> : <?php echo htmlentities($msg); ?> </div><?php }?>
<?php 
$toll_id=intval($_GET['toll_id']);
$sql = "SELECT * from toll_gate WHERE toll_id=:toll_id";
$query = $dbh -> prepare($sql);
$query->bindParam(':toll_id',$toll_id,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  

                                        
                                    <div class="input-field col s12">
<input id="toll_gate_name" type="text"  class="validate" autocomplete="off" name="toll_gate_name" value="<?php echo htmlentities($result->toll_gate_name);?>"  required>
                                                <label for="toll_gate_name">Toll gate Name</label>
                                            </div>


          <div class="input-field col s12">
<input id="category_1" type="text"  class="validate" autocomplete="off" value="<?php echo htmlentities($result->category_1);?>" name="category_1"  required>
                                                <label for="category_1">category 1</label>
                                            </div>
  
                                            <div class="input-field col s12">
<input id="category_2" type="text"  class="text" autocomplete="off" name="category_2" value="<?php echo htmlentities($result->category_2);?>"  required>
                                                <label for="category_2">category 2</label>
                                            </div>


                                            <div class="row">

<div class="input-field col s12">
 <input id="category_3" type="text" name="category_3" class="text" autocomplete="off" value="<?php echo htmlentities($result->category_3);?>" required>
                                                <label for="category_3">category 3</label>
                                            </div>
<?php }} ?>


<div class="input-field col s12">
<button type="submit" name="update" class="waves-effect waves-light btn indigo m-b-xs">UPDATE</button>

</div>




                                        </div>
                                       
                                    </form>
                                </div>
                            </div>
                        </div>
                     
             
                   
                    </div>
                
                </div>
            </main>

        </div>
        <div class="left-sidebar-hover"></div>
        
        <!-- Javascripts -->
        <script src="../assets/plugins/jquery/jquery-2.2.0.min.js"></script>
        <script src="../assets/plugins/materialize/js/materialize.min.js"></script>
        <script src="../assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
        <script src="../assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="../assets/js/alpha.min.js"></script>
        <script src="../assets/js/pages/form_elements.js"></script>
        
    </body>
</html>
<?php } ?> 