<?php
/*
MIT License
Copyright (c) 2019 Fernando 
https://github.com/fernandod1/
*/

// Configure your MySQL database connection details:
$mysqlserverhost = "localhost";
$database_name = "Registration_Page_DESIGN_04";
$username_mysql = "root";
$password_mysql = "";

function sanitize($variable){
    $clean_variable = strip_tags($variable);
    $clean_variable = htmlentities($clean_variable, ENT_QUOTES, 'UTF-8');
    return $clean_variable;
}

function connect_to_mysqli($mysqlserverhost, $username_mysql, $password_mysql, $database_name){
    $connect = mysqli_connect($mysqlserverhost, $username_mysql, $password_mysql, $database_name);
    if (!$connect) {
        die("Connection failed mysql: " . mysqli_connect_error());
    }
    return $connect;    
}

if(isset($_POST["processform"])){
    $connection = connect_to_mysqli($mysqlserverhost, $username_mysql, $password_mysql, $database_name);
    $first_name = mysqli_real_escape_string($connection, sanitize($_POST["first_name"]));
    $last_name = mysqli_real_escape_string($connection, sanitize($_POST["last_name"]));
    $address1 = mysqli_real_escape_string($connection, sanitize($_POST["address1"]));
    $address2 = mysqli_real_escape_string($connection, sanitize($_POST["address2"]));
    $city = mysqli_real_escape_string($connection, sanitize($_POST["city"]));
    $state = mysqli_real_escape_string($connection, sanitize($_POST["state"]));
    $postal_code = mysqli_real_escape_string($connection, sanitize($_POST["postal_code"]));    
    $phone = mysqli_real_escape_string($connection, sanitize($_POST["phone"]));
    $email = mysqli_real_escape_string($connection, sanitize($_POST["email"]));
    $reference = mysqli_real_escape_string($connection, sanitize($_POST["reference"]));
    $feedback = mysqli_real_escape_string($connection, sanitize($_POST["feedback"]));
    $suggestions = mysqli_real_escape_string($connection, sanitize($_POST["suggestions"]));
    $recommend = mysqli_real_escape_string($connection, sanitize($_POST["recommend"]));
    $reference1_name = mysqli_real_escape_string($connection, sanitize($_POST["reference1_name"]));
    $reference1_address = mysqli_real_escape_string($connection, sanitize($_POST["reference1_address"]));
    $reference1_contact = mysqli_real_escape_string($connection, sanitize($_POST["reference1_contact"]));
    $reference2_name = mysqli_real_escape_string($connection, sanitize($_POST["reference2_name"]));
    $reference2_address = mysqli_real_escape_string($connection, sanitize($_POST["reference2_address"]));
    $reference2_contact = mysqli_real_escape_string($connection, sanitize($_POST["reference2_contact"]));
  
    $sql = "INSERT INTO signup_registrationform04 (
        First_Name,
        Last_Name,
        Address1, 
        Address2,
        City,
        State,
        Postal_Code,
        Phone_No,
        Email_Address,
        Reference,
        Feedback,
        Suggestions,
        Recommend,
        Reference1_Name,
        Reference1_Address,
        Reference1_Contact,
        Reference2_Name,
        Reference2_Address,
        Reference2_Contact
        ) 
      VALUES (
        '$first_name',
        '$last_name',
        '$address1',
        '$address2',
        '$city' ,
        '$state' ,
        '$postal_code',
        '$phone',
        '$email',
        '$reference',
        '$feedback',
        '$suggestions',
        '$recommend',
        '$reference1_name',
        '$reference1_address',
        '$reference1_contact',
        '$reference2_name',
        '$reference2_address',
        '$reference2_contact'
        )";

    if (mysqli_query($connection, $sql)) {
        echo "<h2><font color=blue>New record added to database.</font></h2>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }
    mysqli_close($connection);
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Registration Form</title> 
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
html,body{
  display: grid;
  height: 100%;
  width: 100%;
  place-items: center;
  background: #f2f2f2;
  /* background: linear-gradient(-135deg, #c850c0, #4158d0); */
}
::selection{
  background: #4158d0;
  color: #fff;
}

.wrapper{
  width: 680px;
  background: #fff;
  border-radius: 15px;
  box-shadow: 0px 15px 20px rgba(0,0,0,0.1);
}
.wrapper .title{
  font-size: 35px;
  font-weight: 600;
  text-align: center;
  line-height: 100px;
  color: #fff;
  user-select: none;
  border-radius: 15px 15px 0 0;
  background: linear-gradient(-135deg, #c850c0, #4158d0);
}
.wrapper form{
  padding: 10px 30px 50px 30px;
}
.wrapper form .field{
  height: 50px;
  width: 100%;
  margin-top: 20px;
  position: relative;
}
.wrapper form .field input{
  height: 100%;
  width: 100%;
  outline: none;
  font-size: 17px;
  padding-left: 20px;
  border: 1px solid lightgrey;
  border-radius: 25px;
  transition: all 0.3s ease;
}
.wrapper form .field input:focus,
form .field input:valid{
  border-color: #4158d0;
}
.wrapper form .field label{
  position: absolute;
  top: 50%;
  left: 20px;
  color: #999999;
  font-weight: 400;
  font-size: 17px;
  pointer-events: none;
  transform: translateY(-50%);
  transition: all 0.3s ease;
}
form .field input:focus ~ label,
form .field input:valid ~ label{
  top: 0%;
  font-size: 16px;
  color: #4158d0;
  background: #fff;
  transform: translateY(-50%);
}
form .content{
  display: flex;
  width: 100%;
  height: 50px;
  font-size: 16px;
  align-items: center;
  justify-content: space-around;
}
form .content .checkbox{
  display: flex;
  align-items: center;
  justify-content: center;
}
form .content input{
  width: 15px;
  height: 15px;
  background: red;
}
form .content label{
  color: #262626;
  user-select: none;
  padding-left: 5px;
}
form .content .pass-link{
  color: "";
}
form .field input[type="submit"]{
  color: #fff;
  border: none;
  padding-left: 0;
  margin-top: -10px;
  font-size: 20px;
  font-weight: 500;
  cursor: pointer;
  background: linear-gradient(-135deg, #c850c0, #4158d0);
  transition: all 0.3s ease;
}
form .field input[type="submit"]:active{
  transform: scale(0.95);
}
form .signup-link{
  color: #262626;
  margin-top: 20px;
  text-align: center;
}
form .pass-link a,
form .signup-link a{
  color: #4158d0;
  text-decoration: none;
}
form .pass-link a:hover,
form .signup-link a:hover{
  text-decoration: underline;
}
  </style>
<script type="text/javascript">
  function validateForm() {
    var a = document.forms["Form"]["first_name"].value;
    var b = document.forms["Form"]["last_name"].value;
    var c = document.forms["Form"]["address1"].value;
    var d = document.forms["Form"]["address2"].value;
    var e = document.forms["Form"]["city"].value;
    var f = document.forms["Form"]["state"].value;
    var g = document.forms["Form"]["postal_code"].value;
    var h =document.forms["Form"]["phone"].value;
    var i =document.forms["Form"]["email"].value;
    var j =document.forms["Form"]["reference"].value;
    var k =document.forms["Form"]["feedback"].value;
    var l =document.forms["Form"]["suggestions"].value;
    var m =document.forms["Form"]["recommend"].value;
    var n =document.forms["Form"]["reference1_name"].value;
    var o =document.forms["Form"]["reference1_address"].value;
    var p =document.forms["Form"]["reference1_contact"].value;
    var q =document.forms["Form"]["reference2_name"].value;
    var r =document.forms["Form"]["reference2_address"].value;
    var s =document.forms["Form"]["reference2_contact"].value;

if (
a == null || a == "",
b == null || b == "",
c == null || c == "", 
d == null || d == "",
e == null || e == "",
f == null || f == "",
g == null || g == "",
h == null || h == "",
i == null || i == "",
j == null || j == "",
k == null || k == "",
l == null || l == "",
m == null || m == "",
n == null || n == "",
o == null || o == "",
p == null || p == "",
q == null || q == "",
r == null || r == "",
s == null || s == ""
)
    {
        alert("Please Fill All Required Field");    
        return false;
    }
}
</script>
</head>
<body>
    <div class="wrapper" style="margin-top: 5%; margin-bottom: 5%">
        <div class="title" style="padding: 5%">
            Registration Form
        </div>
        <form action="registration_file_04.php" method="post" name="Form" onsubmit="return validateForm()">
        <input type="hidden" name="processform" value="1">
            <div class="field">
                <input type="text" name="first_name" required>
                <label>First Name</label>
            </div>
            <div class="field">
                <input type="text" name="last_name" required>
                <label>Last Name</label>
            </div>
            <div class="field">
                <input type="text" name="address1" required>
                <label>Address 1</label>
            </div>
            <div class="field">
                <input type="text" name="address2">
                <label>Address 2</label>
            </div>
            <div class="field">
                <input type="text" name="city" required>
                <label>City</label>
            </div>
            <div class="field">
                <input type="text" name="state" required>
                <label>State</label>
            </div>
            <div class="field">
                <input type="text" name="postal_code" required>
                <label>Postal Code</label>
            </div>
            <div class="field">
                <input type="text" name="phone" required>
                <label>Phone</label>
            </div>
            <div class="field">
                <input type="email" name="email" required>
                <label>Email</label>
            </div>
            <div class="field">
                <input type="text" name="reference" required>
                <label>Reference</label>
            </div>
            <div class="field">
                <input type="text" name="feedback">
                <label>Feedback</label>
            </div>
            <div class="field">
                <input type="text" name="suggestions">
                <label>Suggestions</label>
            </div>
            <div class="field">
                <input type="text" name="recommend">
                <label>Recommend</label>
            </div>
            <div class="field">
                <input type="text" name="reference1_name" required>
                <label>Reference 1 Name</label>
            </div>
            <div class="field">
                <input type="text" name="reference1_address" required>
                <label>Reference 1 Address</label>
            </div>
            <div class="field">
                <input type="text" name="reference1_contact" required>
                <label>Reference 1 Contact</label>
            </div>
            <div class="field">
                <input type="text" name="reference2_name">
                <label>Reference 2 Name</label>
            </div>
            <div class="field">
                <input type="text" name="reference2_address">
                <label>Reference 2 Address</label>
            </div>
            <div class="field">
                <input type="text" name="reference2_contact">
                <label>Reference 2 Contact</label>
            </div>
            <div class="field">
                <input class="button" type="submit" value="Submit" name="processform">
            </div>
            <div class="signup-link">Already have an account? <a href="login.html">Login now</a></div>
        </form>
    </div>
</body>







</html>


