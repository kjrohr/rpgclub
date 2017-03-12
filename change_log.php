<?php
  include_once 'dbconfig.php';
  include 'nav.php';
?>

<title>RPG Club Change Log</title>
</head>
<body>
  <h3>March 12th</h3>
  <hr />
    <h4>Coupon Codes</h4>
    <p>Coupon Codes now in place, roughly 80% complete but usable.</p>
    <ul>
      <li>Coupon Codes being generated.</li>
      <li>Coupon Codes now being show to the user.</li>
      <li>Admin can apply coupon code to users order.</li>
    </ul>
  <hr />

  <h3>March 5th</h3>
  <hr />
  <h4>Registration</h4>
  <p>The ability to register is 95% complete.</p>
  <ul>
    <li>Validation against duplicate email address's is in place.</li>
    <li>Spaces are being trimmed from form fields</li>
    <li>If the field is empty on submission two layers will prevent the form from being submitted.</li>
    <li>Feedback is given to the user is there is an error</li>
  </ul>
  <h4>Login</h4>
  <p>Login is around 60% done. It needs to have the same validation and verification as registration.</p>
  <ul>
    <li>User can login.</li>
    <li>Base validation is in place, passwords are verified using a secure means.</li>
  </ul>


</body>
</html>
