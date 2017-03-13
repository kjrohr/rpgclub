<?php
  session_start();
  require_once 'dbconfig.php';

  // if session is not set this will redirect to login page
  if( !isset($_SESSION['user']) ) {
   header("Location: login.php");
   exit;
  }

  if (isset($_POST['submit-post'])) {
    $user_id = $_SESSION['user'];
    $content = $_POST['content'];
    $date = getdate();
    $timestamp = $date['weekday'] . ', ' . $date['month'] . ', ' . $date['year'] . ' | ' . $date['hours'] . ':' . $date['minutes'] . ":" $date['seconds'];
    echo $timestamp;
    $sql_query = "INSERT INTO suggestions(poster_id,time_stamp,content) values('$user_id','$timestamp','$content')";

  }

?>

<title>WPRPG Club - Make A Suggestion!</title>
</head>
<body>
  <form method="post">
    <textarea name="content" rows="20" cols="50">Please make a suggestion.</textarea>
    <button type="submit" name="submit-post">Make Suggestion</button>
  </form>
</body>
</html>
