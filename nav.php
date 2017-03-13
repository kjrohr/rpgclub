<html>
<head>

<link rel="stylesheet" href="styles.css" type="text/css" />
<nav>
<span><a href="index.php">Home</a></span>
<span><a href="login.php">Log In</a></span>
<span><a href="change_log.php">Change Log</a></span>
<span><a href="known_issues.php">Known Issues</a></span>
<?php
    if (isset($_SESSION['user'])) {
      ?>
      <span><a href="suggestions.php">Suggestions</a></span>
      <span><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></span>
      <?php
    }
?>

</nav>
<hr />
