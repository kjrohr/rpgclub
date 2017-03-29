<?php
  require_once 'dbconfig.php';

  $res=mysql_query("SELECT * FROM t_players");
  $row=mysql_fetch_array($res);
  $count = mysql_num_rows($res);
?>
<html>
<head>
<title>
</title>
</head>
<body>
  <?php
  foreach(array_unique($row) as $player) {
    echo $player['first_name'];
  }
  ?>
</body>
</html>
