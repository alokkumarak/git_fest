<?php
	
$name = $_REQUEST['name'];
$comments = $_REQUEST['comments'];
$email = $_REQUEST['email'];
$num = $_REQUEST['num'];
$address = $_REQUEST['address'];


require("db/db.php");

mysqli_query($con, "INSERT INTO comments(name, comments,email,num,address) VALUES('$name','$comments','$email','$num','$address')");

$result = mysqli_query($con, "SELECT * FROM comments ORDER BY id ASC");
while($row=mysqli_fetch_array($result)){
echo "<div class='comments_content'>";
echo "<h4><a href='delete.php?id=" . $row['id'] . "'> X</a></h4>";
echo "<h1>" . $row['name'] . "</h1>";
echo "<h2>" . $row['date_publish'] . "</h2></br></br>";
echo "<h3>" . $row['email'] . "</h3></br>";
echo "<h3>" . $row['num'] . "</h3></br>";
echo "<h3>" . $row['comments'] . "</h3></br>";
echo "<h3>" . $row['address'] . "</h3></br>";
echo "</div>";
}
mysqli_close($con);
?>