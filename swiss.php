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
  <table>
    <tr>
        <th>Select?</th>
        <th>First Name</th>
        <th>Last Name</th>
    </tr>
    <?php
      foreach($data as $player) {
        ?>
        <tr>
          <td><input type="checkbox" name="player" value=<?php $player['first_name']?>></td>
          <td><?php echo $player['first_name']; ?>
          <td><?php echo $player['last_name']; ?>
        </tr>

        <?php
      }
    ?>
  </table>
</body>
</html>
