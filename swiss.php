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
  <pre>
  <?php
    var_dump($row);
  ?>
  </pre>
</body>
</html>
