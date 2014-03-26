<?php
	
  
function getUsers() {
  
  $db_connection = new mysqli('stardock.cs.virginia.edu', 'cs4720lw6gk', 'spring2014', 'cs4720lw6gk');
  if (mysqli_connect_errno()) {
      echo "Cannot Connect";
  }
  
  //echo "Connection made!";
  
  $stmt = $db_connection->stmt_init();
  if($stmt->prepare("select firstName, lastName, username, gender, birthday, date from users")) {
      //$stmt->bind_param("s", $month); //
      $stmt->execute();
      $stmt->bind_result($firstName, $lastName, $username, $gender, $birthday, $date); //give variable name to each column
      echo "<table id='users'>";
      echo "<tr><th>First Name</th></th><th>Last Name</th><th>Username</th><th>Gender</th><th>Birthday</th><th>Date</th></tr>";
      while($stmt->fetch()) { //how many rows you are dealing with...while it is fetching rows
          echo "<tr>";
          echo("<td>" . $firstName . "</td>\n");
          echo("<td>" . $lastName . "</td>\n");
          echo("<td>" . $username . "</td>\n");
          echo("<td>" . $gender . "</td>\n");
          echo("<td>" . $birthday . "</td>\n");
          echo("<td>" . $date . "</td>\n");
          echo "</tr>";
      }
      echo "</table>";  
      
  }
}
 
 getUsers();
  
?>
