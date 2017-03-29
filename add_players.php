<?php
  require_once 'dbconfig.php';


  if (isset($_POST['add_player'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];

    $sql_query = "INSERT INTO t_players (first_name,last_name) values('$first_name','$last_name')";
    mysql_query($sql_query);
  }
?>
<html>
<head>
<title>
</title>
</head>
<body>
  <form method="post">
    <input type="text" name="first_name" placeholder="First Name" />
    <input type="text" name="last_name" placeholder="Last Name" />
    <button type="submit" name="add_player">Add Player</button>
  </form>
</body>
</html>
