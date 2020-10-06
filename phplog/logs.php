<?php

require("db/db.php");
$result = mysqli_query($con, "SELECT * FROM comments ORDER BY id ASC");
while($row=mysqli_fetch_array($result)){
echo "<div class='comments_content'>";
echo "<h1> Name : " . $row['name'] . "</h1>";
echo "<h2>Post Time :" . $row['date_publish'] . "</h2></br></br>";
echo "<h3>Email :" . $row['email'] . "</h3></br>";
echo "<h3>Contact Number :" . $row['num'] . "</h3></br>";
echo "<h3>Food details :" . $row['comments'] . "</h3></br>";
echo "<h3>Address : " . $row['address'] . "</h3></br>";
echo "<button style='text-decoration:none' class='btn btn-danger'><a href='delete.php?id=" . $row['id'] . "'>Delete</a></button>";
echo "</div>";
}
mysqli_close($con);

?>