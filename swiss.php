<?php
  require_once 'dbconfig.php';

  $get_players = $db->prepare("SELECT first_name,last_name from t_players");
  $val = $get_players->execute();
  $data = $get_players->fetchAll();
?>
<html>
<head>
<title>
</title>
</head>
<body>
  <pre>
    <?php
      var_dump($data);
    ?>
  </pre>
</body>
</html>
