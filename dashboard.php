<?php
 session_start();
 require_once 'dbconfig.php';

 // if session is not set this will redirect to login page
 if( !isset($_SESSION['user']) ) {
  header("Location: login.php");
  exit;
 }
 // select loggedin users detail
 $res=mysql_query("SELECT * FROM admin WHERE userId=".$_SESSION['user']);
 $userRow=mysql_fetch_array($res);
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome - <?php echo $userRow['user_name']; ?></title>
<link rel="stylesheet" href="styles.css" type="text/css" />
</head>
<body>
Hello <?php echo $userRow['user_name']; ?>
<a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a>

<div id="body">
 <div id="content">
    <table align="center">
    <tr>
    <th colspan="8"><a href="index.php">Add Members Here</a></th>
    </tr>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Email Address</th>
    <th>Degree Program</th>
    </tr>
    <?php
 $sql_query="SELECT * FROM members";
 $result_set=mysql_query($sql_query);;
 while($row=mysql_fetch_row($result_set))
 {
  ?>
        <tr>
        <td><?php echo $row[0]; ?></td>
        <td><?php echo $row[1]; ?></td>
        <td><?php echo $row[2]; ?></td>
        <td><?php echo $row[3]; ?></td>
        </tr>

        <?php
 }
 ?>
    </table>
    </div>
</div>

</center>
</body>
</html>
