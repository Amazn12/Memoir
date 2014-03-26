<?php
  
function getEntries($month) {
  
  $db_connection = new mysqli('stardock.cs.virginia.edu', 'cs4720lw6gk', 'spring2014', 'cs4720lw6gk');
  if (mysqli_connect_errno()) {
      echo "Cannot Connect";
  }
  
  //echo "Connection made!";
  
  $stmt = $db_connection->stmt_init();
  if($stmt->prepare("select title, date , mood, image, audio, description from entries where MONTHNAME(STR_TO_DATE(date, '%m')) = ?")) {
      $stmt->bind_param("s", $month); //
      $stmt->execute();
      $stmt->bind_result($title, $date, $mood, $image, $audio, $description); //give variable name to each column
      echo "<table id='entries'>";
      echo "<tr><th>Title</th><th>Date</th><th>Mood</th><th>Image</th><th>Audio</th><th>Description</th></tr>";
      while($stmt->fetch()) { //how many rows you are dealing with
          echo "<tr>";
          echo("<td>" . $title . "</td>\n");
          echo("<td>" . $date . "</td>\n");
          echo("<td>" . $mood . "</td>\n");
          echo("<td><img src='upload/".$image."'</td>\n");
          echo("<td>" . $audio . "</td>\n");
          echo("<td>" . $description . "</td>\n");
          echo "</tr>";
      }
      echo "</table>";  
      
  }
}
 
$monthPassedIn = $_GET["month"]; //
getEntries($monthPassedIn);
  
?>
