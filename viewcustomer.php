<?php include('server.php') ;
$user=$_SESSION['username'];


$ops='';
$pdo = new PDO('mysql:host=localhost;dbname=registration', 'root', '');
// selecting customer's details and putting them in variables
$stmt = $pdo->query("SELECT * FROM selection where user='$user' ");
//$stmt = $pdo->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $customerid= $row['id'] ;
  
}

$ops='';
$pdo = new PDO('mysql:host=localhost;dbname=registration', 'root', '');
// selecting customer's details and putting them in variables
$stmt = $pdo->query("SELECT * FROM customer where id='$customerid' ");
//$stmt = $pdo->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $customername= $row['customername'] ;
    $Business= $row['business'] ;
    $TPIN= $row['TPIN'] ;
    $phone= $row['phone'] ;
}

?>
<!DOCTYPE html>
<html>
<head>
  <title>company x customer registration system</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
    <h2>View Taxpayer</h2>
  </div>
  
  <form method="post" action="viewcustomer.php">
    <?php include('errors.php'); ?>
    <div class="input-group">
      <label>Taxpayer name</label>
      <input hidden="true" type="text" name="customerid" value="<?php echo "$customerid"; ?>">
      <input type="text" minlength="5" placeholder="Enter Taxpayer's full name" name="customername" value="<?php echo "$customername"; ?>">
    </div>
    <div class="input-group">
      <label>Business</label>
      <input type="text" minlength="5" placeholder="Enter customer's business"  name="Business">
    </div>

    <div class="input-group">
      <label>TPIN</label>
      <input maxlength="10" onkeypress="isInputNumber(event)" class="form-control" type="text" name="TPIN" required="" placeholder="TPIN (e.g 0211234567)" inputmode="tel" id="TPIN"  value="<?php echo "$TPIN"; ?>">
    </div>

    <div class="input-group">
      <label>Phone Number</label>
      <input maxlength="10" onkeypress="isInputNumber(event)" class="form-control" type="text" name="Phone" required="" placeholder="Phone Number (e.g 0211234567)" inputmode="tel" id="Phone"  value="<?php echo "$phone"; ?>">
    </div>
   
    <div class="input-group">
      <button type="submit" class="btn" name="editcus">Update Taxpayer</button> <button type="submit" class="btn" name="Delete">Delete Taxpayer</button><button style="margin-left: 5px;" type="submit" class="btn" name="home">Home</button>
    </div>
   
  </form>
</body>
</html>