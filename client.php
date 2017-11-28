<?php  
// ---------- PHP SECTION ---------- //

echo '<h1> Welcome to IT Support Start-Up!</h1>'; 

echo "<br>";  //new line
echo '<h2> Enter your information and problem below: </h2>'; 

/* $query = 'SELECT * FROM problem';
   $result = pg_query($query) or die('Query failed: ' . pg_last_error());
   echo "<table>\n";
   echo "\t<tr>\n";
   for ($i = 0; $i <= 11; $i++) {
   $fieldname = pg_field_name($result, $i);
   echo "\t\t<th>$fieldname</th>";
   }
   echo "\t</tr>\n";
   while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
   echo "\t<tr>\n";
   foreach ($line as $col_value) {
   echo "\t\t<td>$col_value</td>\n";
   }
   echo "\t</tr>\n";
   }
   echo "</table>\n";
   pg_free_result($result);
 */
?>

<html>
<link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
<link href = "https://fonts.googleapis.com/css?family=Roboto" rel = "stylesheet">
<link rel = "stylesheet" href "css/custom.css">
<head>
<title> Client Side for Database </title>
</head>
<body>

<form action="client.php" method="post">

First Name: <input type="text" name="fname"> 
Last Name: <input type="text" name="lname"><br><br>
Address:    <input type="text" name="address"> 
State: 

<select name = "state"> 
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
City: <input type="text" name="city"> 
Zip: <input type="text" name="zip" maxlength = 5><br><br>
Phone: <input type="text" name="phone"> 
Business Name: <input type="text" name="business_name"><br><br>
Fax: <input type="text" name="fax"> 
Email: <input type="text" name="email"><br><br>
Problem Category: 
<select name = "category"> 
<option value=""> </option> 
<option value="Hardware">Hardware</option>
<option value="Software">Software</option>
<option value="Security">Security</option>
<option value="Network">Network</option>
</select>	
<br><br> 
Problem Description:
<br> 
<textarea name="problem" maxlength = 150 id = problem_id rows = 3 cols = 30 style = "resize: none;" ></textarea><br><br>

<button input type="submit" name="dbinsert">Submit</button>


</form>

<!---------- PHP SECTION(functions) ---------- >
<?php 
include("db.php");

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
pg_query($query) or die('Query failed: ' . pg_last_error());

$somevalue = "SELECT * FROM client";
$result = pg_query($somevalue) or die('Query failed: ' . pg_last_error());
$c = pg_num_rows($result); 

// make client_id for foreign key constraints for problem
$probandcat = "INSERT INTO problem (client_id, category, description) VALUES ('$c','$_POST[category]','$_POST[problem]')"; 
pg_query($probandcat) or die('Query failed: ' . pg_last_error());


pg_close($db_connection);

?>

</body>

<!---------- JAVASCRIPT ----------> 




</html>
