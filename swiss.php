<?php
  require_once 'dbconfig.php';

  $res=mysql_query("SELECT first_name,last_name FROM t_players");
  $row=pg_fetch_all($res);
  $count = mysql_num_rows($res);
?>
<html>
<head>
<title>
</title>
</head>
<body>
  <pre>
  <?php
    var_dump($row);
  ?>
  </pre>
</body>
</html>
