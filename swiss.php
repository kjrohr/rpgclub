<?php
  require_once 'dbconfig.php';

  $res=mysql_query("SELECT first_name,last_name FROM t_players");
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
  var_dump($row);
  ?>
</body>
</html>
