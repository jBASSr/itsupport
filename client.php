
<?php  
// ---------- PHP SECTION ---------- //

$fname = $_POST["fname"];
echo '<h1> Welcome to IT Support Start-Up!</h1>'; 
// Connect to Database 
$db_connection = pg_connect("host=localhost dbname=itsupport
user=itsupport password=jrdd3420") or die('Failed to connect'); 

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
<head>
<title> Client Side for Database </title>
</head>
<body>

<form action="welcome_get.php" method="get">
First Name: <input type="text" name="fname"> Last Name: <input type="text" name="lname"><br><br>
Address:    <input type="text" name="address"> City: <input type="text" name="city"><br><br>
State: <input type="text" name="state"> Zip: <input type="text" name="zip"><br><br>
Phone: <input type="text" name="phone"> Business Name: <input type="text" name="business_name"><br><br>
Fax: <input type="text" name="fax"> Email: <input type="text" name="email"><br><br>
Problem Description: <input type="text" name="problem_id" maxlength = 50 ><br><br>

<input type="submit">
</form>

<?
// ---------- FUNCTIONS ---------- //


function dbinsert ($query, $datatype) 
{
		




}

function dbdelete ($query, $datatype) {
}

function highlow () {
}



// Close connection to Database
pg_close($db_connection);

?>
</body>
</html>
