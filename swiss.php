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
  <form>
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
          <td><input type="checkbox" name="player" value='<?php echo $full; ?>' /></td>
          <td><?php echo $first; ?>
          <td><?php echo $last; ?>
        </tr>

        <?php
      }
    ?>
  </table>
  <button id="add_button" type="button" name='add_players'>Add Players</button>
  <button id="start_event" type="button" name="start">Start Event</button>
  <button id="pair_players" type="button" name="pair">Pair Players</button>
</form>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="main.js"></script>
</body>
</html>
