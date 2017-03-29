<?php
  require_once 'dbconfig.php';

  $statement = $db->prepare("SELECT first_name,last_name from t_players");
  $statement->execute();
  $data = $statement->fetchAll();
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
