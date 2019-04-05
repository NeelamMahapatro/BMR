<?php
include_once 'db_configuration.php';

if (isset($_GET['id'])){
$view_id = $_GET['id'];
$sql = "SELECT * FROM quotes_table
WHERE id = '$view_id'";
if (!$result = $connection->query($sql)) {
die ('There was an error running query[' . $connection->error . ']');
}//end if

if ($result->num_rows > 0) {
// output data of each row
print("<h1><u>The Great Quote of Great Man.</u></h1>");
while($row = $result->fetch_assoc()) {
//print_r($row);
print("<h2>Quote : ". $row['quote']. "</h2>");
print("<h2>Author : ". $row['author']. "</h2>");
}//end while
}//end if
else {
echo "0 results";
}//end else
}//end if
else // Show the Quote lists with hyperlink
{
$sql = "SELECT * FROM quotes_table order by id ASC";
if (!$result = $db->query($sql)) {
die ('There was an error running query[' . $connection->error . ']');
}//end if
if ($result->num_rows > 0) {
// output data of each row
print("<h1>Quote list.</h1><hr>");
while($row = $result->fetch_assoc()) {
//print_r($row);
print('<br><a href="view.php?id='.$row['id'].'">Click</a> to View Quote No: '. $row['id']);
}//end while
}//end if
else {
echo "0 results";
}//end else
}
$connection->close();
?>