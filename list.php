<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "html";


// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);


// Check connection
if (!$conn) 
{
  die("Connection failed: " . mysqli_connect_error());
}

//$sql = "INSERT INTO Amount (Firstname,Lastname,Address,City,Amount_Deposited_in_RS)

$sql = "SELECT F_Name, L_Name, Email, Gender, Intres_IN, MSG FROM tbl_contact";
$result = mysqli_query($conn,$sql);


mysqli_close($conn);
?>


<!DOCTYPE html>
<html>
<head>
	<title>List</title>
	<style>
    body
     {
     	background-color: pink;
     }
	tr
	{
		font-size: 50px;
	}
	td,th
	{
		text-align: center;
	}
	table, th, td
	 {
        border: 1px solid black;
     }
	.three
	{
           text-align:left;
	}
	.four
	{
	   text-align:center;
	}
    #main 
    {
        font-size: 50px;
        color:red;
        text-align : center;
    }
	</style>
</head>
<body>
    <h1 id="main">The People Who Contacted You </h1>
	<table  style="width: 100%">
<tr>
	<th>First Name</th>
	<th>Last Name</th>
	<th>Email</th>
	<th>Gender</th>
    <th>Intrested In</th>
    <th>Their Message</th>
</tr>


<?php

if(mysqli_num_rows($result) > 0)
{
	while($row = mysqli_fetch_assoc($result))
	{
?>

<tr>
    <td><?php echo $row["F_Name"];?></td>
    <td><?php echo $row["L_Name"];?></td>
    <td><?php echo $row["Email"];?></td>
    <td><?php echo $row["Gender"];?></td>
    <td><?php echo $row["Intres_IN"];?></td>
    <td><?php echo $row["MSG"];?></td>
</tr>


<?php
	}
}
else
{
	echo "0 results returned";
}

?>

</table>


</body>
</html>