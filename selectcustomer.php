<?php 
   include('server.php') ;
   $customers = [];
 


  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
  }
 
?>
<!DOCTYPE html>
<html>
<head>
  <title>Taxpayer List</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="header">
  <h2>Taxpayer </h2>
</div>
<div >
    <!-- notification message -->
    <?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
        <h3>
          <?php 
            echo $_SESSION['success']; 
            unset($_SESSION['success']);
          ?>
        </h3>
      </div>
    <?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
     
      
     
  <?php  

$show = callAPI('GET', '/programming/challenge/webservice/Taxpayers/getAll');

   if($show['code'] === 200){
     $customers = $show['response'];
     echo '<table border="1" cellpadding="0" cellspacing="0">';
     echo '<thead>';
     echo '<td>id</td>';
     echo '<td>TPIN</td>';
     echo '<td>BusinessCertificateNumber</td>';
     echo '<td>TradingName</td>';
     echo '<td>MobileNumber</td>';
     echo '<td>Email</td>';
     echo '<td>PhysicalLocation</td>';
     echo '<td>Username</td>';
     echo '<td>Deleted</td>';
     echo '<td>Action</td>';
     echo '</thead>';
  
    foreach ($customers as $customer) {
    echo '<tr>';
        echo '<td>';
            echo $customer['id'];
        echo '</td>';
        echo '<td>';
            echo $customer['TPIN'];
        echo '</td>';
        echo '<td>';
            echo $customer['BusinessCertificateNumber'];
        echo '</td>';
        echo '<td>';
            echo $customer['TradingName'];
        echo '</td>';
        echo '<td>';
            echo $customer['MobileNumber'];
        echo '</td>';
        echo '<td>';
            echo $customer['Email'];
        echo '</td>';
        echo '<td>';
            echo $customer['PhysicalLocation'];
        echo '</td>';
        echo '<td>';
            echo $customer['Username'];
        echo '</td>';
        echo '<td>';
            echo $customer['Deleted'];
        echo '</td>';
        echo '<td>';
        echo '<a href="edit.php?district_id='.$customer['TPIN'].'">';
            echo 'Edit';
            echo '</a>';
        echo ' | ';
        echo '<a href="delete.php?tpin='.$customer['TPIN'].'">';
            echo 'Delete';
            echo '</a>';
    echo '</td>';
    echo '</tr>';
    }

echo '</table>';
   }
   else{
     echo $show['response']['Remark'];
   }   
  ?>
    <?php endif ?>
  
    <form method="post" action="viewcustomer.php">
    <div class="input-group">
      <button type="submit" class="btn" name="editcus">Add Taxpayer</button> 
   
  </form>
    </div><a href="index.php"><button class="btn" style="margin-left: 60%;">Back</button></a>   
</body>
</html>