<?php
$hostname='localhost';
$username='root';
$password='';
$dbname='jatra';
$con=mysqli_connect($hostname,$username,$password,$dbname);
if($con)
{
	echo"conn true";
}
else
{
	echo"conn false";
}
$Number_plat=$_GET['Number_plat'];
$Price=$_GET['Price'];
//echo $Number_plat;
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['contactno']) && isset($_POST['pickup_address']) && isset($_POST['pickup_date_time']) && isset($_POST['location']) && isset($_POST['price']) && isset($_POST['reason'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $contactno=$_POST['contactno'];
    $pickup_address=$_POST['pickup_address'];
    $pickup_date_time=$_POST['pickup_date_time'];
    $location=$_POST['location'];
    $price=$_POST['price']*$_POST['days'];
    $reason=$_POST['reason'];
    


$q="INSERT INTO customer_details_b(name,email,contactno,pickup_address,pickup_date_time,location,Number_plat,price,reason)VALUES('$name','$email','$contactno','$pickup_address','$pickup_date_time','$location','$Number_plat','$price','$reason')";
$r=mysqli_query($con,$q);
if($r)
{
echo"ttrue";
}
else
{
    echo"ffalse";
}
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #04AA6D;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
</head>
<body>

<h2>Customer details Form</h2>

<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="" method="POST">
      
        <div class="row">
          <div class="col-50">
            
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="name" placeholder="name">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="email">
            <label for="text"><i class="fa fa-phone"></i> contact_no.</label>
            <input type="text"  name="contactno" placeholder="880-01xxxxxxxxx">
            <label for="adr"><i class="fa fa-address-card-o"></i> pick_up Address</label>
            <input type="text" id="adr" name="pickup_address" placeholder="road-building">
            <label for="adr"><i class="fa fa-address-card-o"></i> pickup time</label>
            <input type="text" id="adr" name="pickup_date_time">
            <label for="location"><h4>Choose location:</h4></label>               
<select  name="location">
  <option>select location</option>
 <?php 
 $q="SELECT * FROM location";
 $r=mysqli_query($con,$q);
 while($data=mysqli_fetch_assoc($r)){
   echo'<option value="'.$data['District'].'">'.$data['District'].'</option>';
 }
   ?>


</select>
<div class="width: 100% margin-bottom: 20px padding: 12px border: 1px solid #ccc border-radius: 3px ">
<label for="days"><h4>how many days:</h4></label>
<select name="days">
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
</select>
</div>
<br>
            <label for="Price"><i class="fa fa-dollar"></i>Price</label>
            <input type="text" value="<?php echo $Price?>" name="price" placeholder="Price">
            <label for="text">Number_plat</label>
            <input type="text" value="<?php echo $Number_plat?>" name="Number_plat">
            <label for="reason">Reason for renting vehicle</label>
    <textarea id="reason" name="reason" placeholder="Write something.." style="width:500px; height:200px"></textarea>

            
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text"   placeholder="cardname">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum"  placeholder="xxxx-xxxx-xxxx-xxxx">
            <label for="expmonth">Exp Date</label>
            <input type="text" id="expdate">
            <label for="expmonth">Exp Month</label>
            
                <input type="text" id="expmonth" >
              
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv"  placeholder="cvv">
              </div>
              </div>
            </div>
          </div>
          
        </div>
    
        <input type="submit" value="submit" class="btn">
      </form>
    </div>
  </div>
  
</div>

</body>
</html>
