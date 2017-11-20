
<?php  
// ---------- PHP SECTION ---------- //

include ("db.php");
$fname = $_POST["fname"];
echo '<h1> Welcome to IT Support Start-Up!</h1>'; 
// Connect to Database 

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
City: 

<select> 
	<option value=""> </option> 
	<option value="al">AL</option>
	<option value="ak">AK</option>
	<option value="az">AZ</option>
	<option value="ar">AR</option>
	<option value="ca">CA</option>
	<option value="co">CO</option>
	<option value="ct">CT</option>
	<option value="de">DE</option>
	<option value="fl">FL</option>
	<option value="ga">GA</option>
	<option value="hi">HI</option>
	<option value="id">ID</option>
	<option value="il">IL</option>
	<option value="in">IN</option>
	<option value="ia">IA</option>
	<option value="ks">KS</option>
	<option value="ky">KY</option>
	<option value="la">LA</option>
	<option value="me">ME</option>
	<option value="md">MD</option>
	<option value="ma">MA</option>
	<option value="mi">MI</option>
	<option value="mn">MN</option>
	<option value="ms">MS</option>
	<option value="mo">MO</option>
	<option value="mt">MT</option>
	<option value="ne">NE</option>
	<option value="nv">NV</option>
	<option value="nh">NH</option>
	<option value="nj">NJ</option>
	<option value="nm">NM</option>
	<option value="ny">NY</option>
	<option value="nc">NC</option>
	<option value="nd">ND</option>
	<option value="oh">OH</option>
	<option value="ok">OK</option>
	<option value="or">OR</option>
	<option value="pa">PA</option>
	<option value="ri">RI</option>
	<option value="sc">SC</option>
	<option value="sd">SD</option>
	<option value="tn">TN</option>
	<option value="tx">TX</option>
	<option value="ut">UT</option>
	<option value="vt">VT</option>
	<option value="va">VA</option>
	<option value="wa">WA</option>
	<option value="wv">WV</option>
	<option value="wi">WI</option>
	<option value="wy">WY</option>

</select><br><br>
State: <input type="text" name="state"> 
Zip: <input type="text" name="zip"><br><br>
Phone: <input type="text" name="phone"> 
Business Name: <input type="text" name="business_name"><br><br>
Fax: <input type="text" name="fax"> 
Email: <input type="text" name="email"><br><br>
Problem Description: <textarea name="problem" maxlength = 50 id = problem_id style = "height: 100px; width: 50px;"><br><br>

<button input type="submit" name="dbinsert">Submit</button>


</form>

<?php 

   if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['dbinsert']))
     {
	dbinsert();
     }
   function dbinsert($query, $datatype)
     {
     
     }





pg_close($db_connection);

?>

</body>

<!---------- JAVASCRIPT ----------> 




</html>
