<!DOCTYPE html>
<html>
<head>
	<title>Contact Me</title>
	<link rel="stylesheet" 
          type="text/css"
          href="contact.css"
    />
</head>
<body>
<table style="width: 100%">
<h1 id="title">Contact Me</h1>
<h1 id="msg">Send Me A Message</h1>
    <h1> <img src="Images/logo.png" width="100px" height="100px"/> &nbsp; &nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp; </h1>
    <h1 id="pos">
        <a href="index.html" id="head">Home</a>
        <a href="bio.html" id="head">About Me</a>
        <a href="project.html" id="head">Projects Done By Me</a> 
        <a href="contact.php" id="head">Contact Me</a> <br><br><br><br>
    </h1>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<div id="header"></div>
   
 
    <a href="https://www.facebook.com/samriddha.92" ><img src="Icons/fb.png" width="40px" height="40px" id="fb"/></a>
    <a href="https://www.instagram.com/samriddhabiswas/"><img src="Icons/insta.png" width="45px" height="35px" id="insta"/></a>
    <a href="https://www.youtube.com/channel/UCCsuzrXw7f429VpPxVB0n2A"><img src="Icons/youtube.png" width="50px" height="50px" id="youtube"/></a>
    <a href="https://github.com/Samriddha2007/"><img src="Icons/github.png" width="30px" height="30px" id="github"/></a>

	</tr>
<form name = "myForm" id="myForm" method="post"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<tr><td><h3 id="label_for_f_name">First name:</h3></td>
		<td><input type="text" id="F-name" name="F-name" size="100" required></td>

	</tr>

	<tr><td><h3 id="label_for_l_name">Last Name:</h3></td>
		<td><input type="text" id="L-name" name="L-name" size="100" required></td>

	</tr>

	<tr><td><h3 id="label_for_email">E-mail Address:</h3></td>
		<td><input type="email" id="email" name="email" size="86" required></td>
	</tr>

	<tr><td><h3 id="label_for_gender">Gender:</h3></td>
		<td><h1 id="label_for_male">Male</h1>&nbsp;<input type="radio" id="male" name="gender" value="male" required>&nbsp;<h1 id="label_for_female">Female</h1>&nbsp;<input type="radio" id="female" name="gender" value="female" required><h1 id="label_for_PNTS">Prefer Not To Say</h1>&nbsp;<input type="radio" id="prefer_not_to_say" name="gender" value="Prefer Not To Say" required></td>

	</tr>

	<tr><td><h3 id="label_for_INT">Intrested in:</h3></td>
		<td><input type="checkbox" id="studying" name="intre[]" value="studying">&nbsp;<h1 id="label_for_studying">Studying</h1><br><input type="checkbox" id="playing" name="intre[]" value="playing">&nbsp;<h1 id="label_for_playing">Playing</h1><br><input type="checkbox" id="drawing" name="intre[]" value="drawing">&nbsp;<h1 id="label_for_drawing">Drawing</h1><br><input type="checkbox" id="coding" name="intre[]" value="coding">&nbsp;<h1 id="label_for_coding">Coding</h1><br><input type="checkbox" id="none" name="intre[]" value="none">&nbsp;<h1 id="label_for_none">None</h1><br></td>

	</tr>

	<tr><td><h3 id="label_for_message">Enter your message:</h3></td>
		<td><textarea name="message" id="message" rows="10" cols="60" maxlength="500" placeholder="Maximum Messages Limit is 500 characters"></textarea></td>

	</tr>

	<tr><td></td>
		<td><input type="submit" name="submit" id="submit_but" value="Submit" ></td>

	</tr>
</form>
</table>

</body>
</html>

<?php 

// define variables and set to empty values
$f_name = $l_name = $email = $gender = $intre_in = $msg = $id = "";



if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "html";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) 
{
  die("Connection failed: " . $conn->connect_error);
}

  $f_name = test_input($_POST["F-name"]);
  $l_name = test_input($_POST["L-name"]);
  $email = ($_POST["email"]);
  $gender = test_input($_POST["gender"]);
  $intre_in=implode(', ', $_POST['intre']);
  $msg = test_input($_POST["message"]);
  
  if($msg == "")
  {
	  $msg = "No Comments Done";
  }

 $sql = "INSERT INTO tbl_contact (F_Name, L_Name, Email, Gender, Intres_IN, MSG)
VALUES ('$f_name', ' $l_name ', '$email', '$gender', '$intre_in','$msg');";



if ($conn->multi_query($sql) === TRUE) 
{
	echo '<script>alert("Your respone has been recorded!")</script>'; 
	echo '<script type="text/javascript">
	window.location.href = "http://localhost/HTML/index.html";
	</script>';
} 



$conn->close();

exit;
 
}

function test_input($data) 
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


?>




