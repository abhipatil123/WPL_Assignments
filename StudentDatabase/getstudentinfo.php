<?php
// Get a connection for the database
require_once('../mysqli_connect.php');

// Create a query for the database
$query = "SELECT Fname, Mname, Lname, Address, City, State, Zip,
Area_code, Number FROM contactList";

// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($dbc, $query);

// If the query executed properly proceed
if($response){

echo '<table align="left"
cellspacing="5" cellpadding="8">

<tr><td align="left"><b>First Name</b></td>
<td align="left"><b>Middle Name</b></td>
<td align="left"><b>Last Name</b></td>
<td align="left"><b>Address</b></td>
<td align="left"><b>City</b></td>
<td align="left"><b>State</b></td>
<td align="left"><b>Zip</b></td>
<td align="left"><b>Area Code</b></td>
<td align="left"><b>Phone</b></td></tr>';

// mysqli_fetch_array will return a row of data from the query
// until no further data is available
while($row = mysqli_fetch_array($response)){

echo '<tr><td align="left">' . 
$row['Fname'] . '</td><td align="left">' . 
$row['Mname'] . '</td><td align="left">' .
$row['Lname'] . '</td><td align="left">' . 
$row['Address'] . '</td><td align="left">' .
$row['City'] . '</td><td align="left">' . 
$row['State'] . '</td><td align="left">' .
$row['Zip'] . '</td><td align="left">' . 
$row['Area_code'] . '</td><td align="left">' .
$row['Number'] . '</td><td align="left">';

echo '</tr>';
}

echo '</table>';

} else {

echo "Couldn't issue database query<br />";

echo mysqli_error($dbc);

}

// Close connection to the database
mysqli_close($dbc);

?>