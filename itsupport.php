<html>
<head>
	<title> IT Support Example </title>
	<link rel="stylesheet" href="/~jose/itsupport/css/table.css">
</head>
<body>
	<p> Web page for Employees for IT Support Database </p>
<table>
<?php
/*
$db_connection = pg_connect("host=localhost dbname=itsupport user=itsupport
password=jrdd3420");
*/
include("db.php");
$query = 'SELECT * FROM employee ORDER BY employee_id';
$result = pg_query($query) or die('Query failed: ' . pg_last_error());
$i = 0;
//<!-- TABLE -->
while ($i < pg_num_fields($result)) {
    	$fieldname = pg_field_name($result, $i);
    	echo "\t\t<th>$fieldname</th>";
    	$i = $i + 1;
    }
while ($line = pg_fetch_array($result, null, PGSQL_NUM))
{
	$id = $line[0];
	//$col = $line[1];
	?>
	<tr id="<?php echo $id; ?>" class="edit_tr">
		<?php foreach ($line as $col) { ?>
		<td id="edit_td">
			<span id="first_<?php echo $id; ?>" class="test"><?php echo $col; ?></span>
			<input type="text" value="<?php echo $col; ?>" class="editbox" id="last_input_<?php echo $id; ?>"/>
		</td>
		<?php } ?>
	</tr>

<?php
}
pg_free_result($result);
pg_close($db_connection);
?>
</table>
</body>
<script type="text/javascript" src="http://ajax.googleapis.com/
ajax/libs/jquery/1.5/jquery.min.js"></script>
</html>

