 <?php
$servername = "localhost";
$username = "sumit";
$password = "singh";
$dbname = "mydatabase";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected<br>";

$sql = "SELECT * FROM sensorlogs";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //echo "id: " . $row["id"]. " - date: " . $row["date"]. " " . $row["temperature"]. "<br>";
        $temprature=$row["temperature"];
        $humi=$row["humidity"];
        $mois=$row["moisture"];

         }
} else {
    echo "0 results";
}
//  if($mois==0)
  //      { $statement="Panic over! Plant has water again :)"; }
   //     else
     //   { $statement="Warning, no moisture detected! Plant death imminent!!! :'(";  }

       //  }
if($mois=="1")
$statement= $statement="Panic over! Plant has water again :)";
else if($mois=="0")
$statement="Warning, no moisture detected! Plant needs watering!!:'(";
else
$statement="Moisture level in the soil is maintained no worry!! ;-)";

//echo "\n\n\n\n\n$temprature";
$conn->close();
?>


<!DOCTYPE html>
<html>

        <h1> Temperatue is <?php echo $temprature?></h1>
        <h1>Humidity is <?php echo $humi?></h1><br>
        <h1><?php echo  $statement ?></h1>
</html>

