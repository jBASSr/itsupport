<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
	<title> Employee Ticket Assignment </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<link rel="stylesheet" href="/~jose/itsupport/css/table.css">
</head>
<body>
	<div class="main-container">
		    <main role="main" class="container">
		<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
	      <a class="navbar-brand" href="#">IT Support</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="navbar-toggler-icon"></span>
	      </button>

	      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
	        <ul class="navbar-nav mr-auto">
	          <li class="nav-item active">
	            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" href="#">Link</a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link disabled" href="#">Disabled</a>
	          </li>
	          <li class="nav-item dropdown">
	            <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
	            <div class="dropdown-menu" aria-labelledby="dropdown01">
	              <a class="dropdown-item" href="#">Action</a>
	              <a class="dropdown-item" href="#">Another action</a>
	              <a class="dropdown-item" href="#">Something else here</a>
	            </div>
	          </li>
	        </ul>
	      </div>
	    </nav>
	    	<div class="row">
            <div class="col st">
		    <table class="table table-striped table-bordered table-hover table-responsive">
			    <?php
			    include("db.php");
			    $query = 'SELECT * FROM employee ORDER BY employee_id';
			    $result = pg_query($query) or die('Query failed: ' . pg_last_error());
			    $i = 0;
                $fields = pg_num_fields($result);
			    //<!-- TABLE -->
			    while ($i < $fields + 1) {
			    	$fieldname = pg_field_name($result, $i);
                    if ($i < $fields) {
			    	    echo "\t\t<th>$fieldname</th>";
                    } else {
                        echo "\t\t<th>Delete</th>";
                    }
			    	$i = $i + 1;
                    
			    }
			    while ($line = pg_fetch_array($result, null, PGSQL_NUM))
			    {
				    $id = $line[0];
				    //$col = $line[1];
				    $cid = 0;
				?>
				<tr id="<?php echo $id; ?>" class="edit_tr">
				<?php foreach ($line as $col) { ?>
					<td id="edit_td">
						<!--DEFAULT TABLE-->
						<span id="rowid<?php echo $cid ?>_<?php echo $id; ?>" class="text nowrap"><?php echo $col; ?></span>
						<!--EDIT TABLE-->
						<input type="text" value="<?php echo $col; ?>" class="editbox" id="rowin<?php echo $cid++; ?>_<?php echo $id; ?>"/>
					</td>
				<?php } ?>
                <td>
                <div class="center">
                    <p>&#x274C</p>
                </td>
				</tr>
				<?php
				}
				pg_free_result($result);
				pg_close($db_connection);
				?>
			</table>
            </div>
			</div>
		</main>
	</div>
	<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>-->
	<script type="text/javascript">
	function grabID(x)
	{
	    var c;
	    if (confirm("Edit Row #:" + x + "?")) {
	        window.location.href = "edit.php?row=" + x;
	    } else {
	    
	    }
	}
	function editRow(x)
	{
		var c;
	}
	</script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function() {
		$(".edit_tr").click(function() {
			var ID=$(this).attr('id');
			$("[id='rowid1_"+ID).hide();
			$("[id='rowid2_"+ID).hide();
			$("[id='rowid3_"+ID).hide();
			$("[id='rowid4_"+ID).hide();
			$("[id='rowid5_"+ID).hide();
			$("[id='rowid6_"+ID).hide();
			$("[id='rowid7_"+ID).hide();
			$("[id='rowid8_"+ID).hide();
			$("[id='rowid9_"+ID).hide();
			$("[id='rowid10_"+ID).hide();
			$("[id='rowid11_"+ID).hide();

			$("[id='rowin1_"+ID).show();
			$("[id='rowin2_"+ID).show();
			$("[id='rowin3_"+ID).show();
			$("[id='rowin4_"+ID).show();
			$("[id='rowin5_"+ID).show();
			$("[id='rowin6_"+ID).show();
			$("[id='rowin7_"+ID).show();
			$("[id='rowin8_"+ID).show();
			$("[id='rowin9_"+ID).show();
			$("[id='rowin10_"+ID).show();
			$("[id='rowin11_"+ID).show();
		}).change(function() {
			var ID=$(this).attr('id');
            var fname=$("[id='rowin1_"+ID).val();
            var lname=$("[id='rowin2_"+ID).val();
            var addr=$("[id='rowin3_"+ID).val();
            var city=$("[id='rowin4_"+ID).val();
            var state=$("[id='rowin5_"+ID).val();
            var zip=$("[id='rowin6_"+ID).val();
            var phone=$("[id='rowin7_"+ID).val();
            var email=$("[id='rowin8_"+ID).val();
            var exp=$("[id='rowin9_"+ID).val();
            var hrly=$("[id='rowin10_"+ID).val();
            var ssn=$("[id='rowin11_"+ID).val();
            var dataString = 'id='+ID+'&fname='+fname+'&lname='+lname;
            if(fname.length > 0) {
                $.ajax({
                    type: "POST",
                    url: "edit_table.php",
                    data: dataString,
                    success: function(html) {
                        $("[id='rowid1_"+ID).html(fname);
                        $("[id='rowid2_"+ID).html(lname);
                        alert('Attempted to update with: '+ html);
                    }
                });
            } else {
                alert('Invalid input');
            }
		});
	    $(".editbox").mouseup(function() {
    	    return false;
	    });
    	$(document).mouseup(function() {
	        $(".editbox").hide();
	        $(".text").show();
	    });
    });
	</script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>

