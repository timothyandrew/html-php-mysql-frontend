<html>
<head>
  <title>Results</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
  $mysql = mysql_connect("localhost:8889", "root", "root") or die ("could not establish database connection");
  #echo 'Connected successfully.';
  $DB = $_POST["databasename"];
  $TABLE = $_POST["tablename"];
  mysql_select_db($DB) or die('Could not select database.&nbsp;<a href="index.html">Try again?</a>');
  
  //Query
  $query = "SELECT * FROM $TABLE";
  $result = mysql_query($query) or die('Query failed: ' . mysql_error());
  
  echo '<table>';
  
  echo '<tr>';
  for ( $i = 0; $i < mysql_num_fields($result); $i += 1) {
      $fields = mysql_fetch_field($result, $i);
      echo "<th>$fields->name</th>";
  }
  echo '</tr>';
  
  while($array = mysql_fetch_row($result)){
    echo '<tr>';
    for ( $i = 0; $i < mysql_num_fields($result); $i += 1) {
        echo "<td>$array[$i]</td>";
    }
    echo '</tr>';
  }
  
  echo '</table>'
?>
</body>
</html>
