<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
## FOR GOVHACK ##
## There was no API available despite asking for it on the forums etc,
## Some data was therefore taken from Auckland museum website and manually added to a mysql database.
## In the final version this should be querying a Sparql endpoint either by name or location of birth, next
## of kin and a mixture of both

function get_nz() {
$servername = "localhost";
$username = "un";
$password = "pw";
$dbname = "dbs";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT rec_id, first_name, last_name, service_id FROM `nzdf-soldiers`";
    $result = $conn->query($sql);

    //check for errrs
    if (!$result) echo $conn->error;

    if ($result->num_rows > 0) {
      // load results into array
      $rows = $result->fetch_all(MYSQLI_ASSOC);
      //$rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
    } else {
      $rows = 'no results';
    }

    $conn->close();
    return $rows;
}

?>
