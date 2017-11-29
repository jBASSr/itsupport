<?php  
include("db.php");

// ---------- PHP SECTION ---------- //

session_start();


// Check if submit button has been clicked, along with validation of forms
if (isset($_POST['dbinsert']))
{
$query = "INSERT INTO client (fname,lname,address,city,state,zip,phone,business_name,fax,email) VALUES (
        '$_POST[fname]',
	'$_POST[lname]', 
	'$_POST[address]',    
	'$_POST[city]',
	'$_POST[state]',
	'$_POST[zip]',
	'$_POST[phone]',
	'$_POST[business_name]',
	'$_POST[fax]',
	'$_POST[email]')";
pg_query($query) or die('Query failed : ' . pg_last_error());

$somevalue = "SELECT * FROM client";
$result = pg_query($somevalue) or die('Query failed : ' . pg_last_error());
$c = pg_num_rows($result); 


// make client_id for foreign key constraints for problem
$probandcat = "INSERT INTO problem (client_id, category, description) VALUES ('$c','$_POST[category]','$_POST[problem]')"; 
pg_query($probandcat) or die('Query failed : ' . pg_last_error());

// Load page for client that has been made!
header("Location: clientmade.php?cid=$c");
// exit current page
exit;
}


?>

<! DOCTYPE html>
<html lang = "en">
<head>
<div id = "wrapper">
<!-----------JAVASCRIPT-------------->

<link rel = "icon" type = "type/x-icon" href = "ITStartUp.png">
<link rel = "stylesheet" type = "text/css" href = "css/custom.css">
<title> Client Side for Database </title>
<meta charset = "utf-8">
<meta name ="viewport" content = "width=device-width, initial-scale=1"> 

<div id = "header">
<img src = "ITStartUp.png" alt = "logo" style = "float:left;width:50px;height:50px;"> 

<h1> IT Support Start-Up</h1> 
</div>

<br><br>  
<h2> Enter your information and problem below: </h2> 

</head>
<body>

<form name= "client" action="client.php"  method="post">

First Name*: <input type="text" name="fname" pattern="[A-Za-z0-9]{1,15}" required> 
Last Name*: <input type="text" name="lname" pattern="[A-Za-z0-9]{1,15}" required><br><br>
Address*:    <input type="text" name="address" pattern="[A-Za-z0-9'\.\-\s\,{1,30}" required> 
State*: 

<select name = "state" required> 
<option value=""> </option> 
<option value="AL">AL</option>
<option value="AK">AK</option>
<option value="AZ">AZ</option>
<option value="AR">AR</option>
<option value="CA">CA</option>
<option value="CO">CO</option>
<option value="CT">CT</option>
<option value="DE">DE</option>
<option value="FL">FL</option>
<option value="GA">GA</option>
<option value="HI">HI</option>
<option value="ID">ID</option>
<option value="IL">IL</option>
<option value="IN">IN</option>
<option value="IA">IA</option>
<option value="KS">KS</option>
<option value="KY">KY</option>
<option value="LA">LA</option>
<option value="ME">ME</option>
<option value="MD">MD</option>
<option value="MA">MA</option>
<option value="MI">MI</option>
<option value="MN">MN</option>
<option value="MS">MS</option>
<option value="MO">MO</option>
<option value="MT">MT</option>
<option value="NE">NE</option>
<option value="NV">NV</option>
<option value="NH">NH</option>
<option value="NJ">NJ</option>
<option value="NM">NM</option>
<option value="NY">NY</option>
<option value="NC">NC</option>
<option value="ND">ND</option>
<option value="OH">OH</option>
<option value="OK">OK</option>
<option value="OR">OR</option>
<option value="PA">PA</option>
<option value="RI">RI</option>
<option value="SC">SC</option>
<option value="SD">SD</option>
<option value="TN">TN</option>
<option value="TX">TX</option>
<option value="UT">UT</option>
<option value="VT">VT</option>
<option value="VA">VA</option>
<option value="WA">WA</option>
<option value="WV">WV</option>
<option value="WI">WI</option>
<option value="WY">WY</option>

</select><br><br>

City*: <input type="text" name="city" pattern = "[A-Za-z0-9required]{1,20}" required> 

Zip*: <input type="text" name="zip" maxlength = 5 pattern = "[0-9]{5}" required>

<br><br>

Phone* (xxx-xxx-xxxx): <input type="tel" name="phone" maxlength = 12 pattern = "\d{3}-\d{3}-\d{4}$" required> 

Business Name: <input type="text" name="business_name">

<br><br>

Fax (x-xxx-xxxxxxx): <input type="text" name="fax" maxlength = 13 pattern = "\d{1}-\d{3}-\d{7}"> 

Email*: <input type="email" name="email" pattern = "[a-zA-Z0-9!#$%&amp;'*+\/=?^_`{|}~.-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*" required>

<br><br>

Problem Category*: 
<select name = "category" required> 
<option value=""> </option> 
<option value="Hardware">Hardware</option>
<option value="Software">Software</option>
<option value="Security">Security</option>
<option value="Network">Network</option>
</select>	

<br><br> 

Problem Description*:
<br> 
<textarea name="problem" maxlength = 150 id = problem_id rows = 3 cols = 30 style = "resize: none;" pattern = "[A-Za-z0-9!#$%&amp;'*+\/=?^_`{|}~.-]{1,150}" required></textarea><br><br>

<input type="submit" name="dbinsert" value = "Submit"> 


</form>

<br>
<h2> * means this field is required. </h2> 

<?php 

// Close connection to databse
pg_close($db_connection);

?>

</div>
</body>

</html>
