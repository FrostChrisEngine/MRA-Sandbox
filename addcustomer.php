<?php include('server.php') 



?>
<!DOCTYPE html>
<html>
<head>
  <title>company x customer registration system</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
    <h2>Add Taxpayer</h2>
  </div>
  <form method="post" action="addcustomer.php">
    <?php include('errors.php'); ?>
    
    <div class="input-group">
      <label>TPIN</label>
      <input type="text" minlength="5" placeholder="Enter Taxpayer's full name" name="TPIN" value="<?php echo "$TPIN" ?>">
    </div>

    <div class="input-group">
      <label>Business Certificate Number</label>
      <input type="text" minlength="5" placeholder="Enter Taxpayer's BusinessCertificateNumber" name="BusinessCertificateNumber">
    </div>

    <div class="input-group">
      <label>TradingName</label>
      <input type="text" minlength="5" placeholder="Enter Taxpayer's Trading Name"  name="TradingName">
    </div>

    <div class="input-group">
      <label>BusinessRegistrationDate</label>
      <input type="date" minlength="5" placeholder="Enter Taxpayer's BusinessRegistrationDate"  name="BusinessRegistrationDate">
    </div>

    <div class="input-group">
      <label>MobileNumber</label>
      <input type="text" minlength="5" placeholder="Enter Taxpayer's MobileNumber"  name="MobileNumber">
    </div>


    <div class="input-group">
      <label>Email</label>
      <input type="text" minlength="5" placeholder="Enter Taxpayer's Email"  name="Email">
    </div>

    <div class="input-group">
      <label>PhysicalLocation</label>
      <input type="text" minlength="5" placeholder="Enter Taxpayer's PhysicalLocation"  name="PhysicalLocation">
    </div>

    <div class="input-group">
      <label>Username</label>
      <input type="text" minlength="5" placeholder="Enter Taxpayer's Username"  name="Username">
    </div>

    <div class="input-group">
      <button type="submit" class="btn" name="addcus">Add Taxpayer</button> 
   
  </form>
    </div><a href="index.php"><button class="btn" style="margin-left: 60%;">Back</button></a>
</body>
</html>