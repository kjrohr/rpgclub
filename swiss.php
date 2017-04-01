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
        $first = $player['first_name'];
        $last = $player['last_name'];
        $full = $first . ' ' . $last;
        ?>
        <tr>
          <td><input type="checkbox" name="player" value=<?php echo $full; ?> /></td>
          <td><?php echo $first; ?>
          <td><?php echo $last; ?>
        </tr>

        <?php
      }
    ?>
  </table>
  <script src="main.js"></script>
</body>
</html>
