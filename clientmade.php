<?php  
include("db.php");
?>


<! DOCTYPE html>
<html lang = "en">
<head>
<!-----------JAVASCRIPT-------------->

<script>

function checkClient()
{
 if (<?php htmlspecialchars($_GET["cid"]) ?> == "undefined")
  {
    alert("You have not made a problem, which will automatically create your account. Please go to the 'Submit Problem' on the top of the page to create your account");
    goto needaccount
  }
  else

  {    
    goto accountmade
  }

}

</script>

<link rel = "icon" type = "type/x-icon" href = "ITStartUp.png">
<link rel = "stylesheet" type = "text/css" href = "css/custom.css">
<title> IT Support Start-Up</title>
<meta charset = "utf-8">
<meta name ="viewport" content = "width=device-width, initial-scale=1"> 
<div id = "top">

<img src = "ITStartUp.png" alt = "logo" style = "float:left;width:50px;height:50px;"> 
<h1> IT Support Start-Up</h1> 
</div>

<ul>
<li><a  href ="clienthome.php">Home</a><li>
<li><a  href ="clientservices.php">Services</a><li>
<li><a  href ="client.php">Submit Problem</a></li>
<li><a  class = "active" href ="clientmade.php">My Account</a><li>
</ul>


<div id = "wrapper">
<div id = "main">
<body>


<br><br>
<h3>Your problem has been submitted. Your client ID is <?php htmlspecialchars($_GET["cid"]) ?>  which you can use to login and view your problem status.</h3>

</div>
</div>
</body>
</html>
