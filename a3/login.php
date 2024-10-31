<?php
include('Includes/header.inc');
?>
<?php
include('Includes/nav.inc');
?>

<div class="login-form">
<form action="process_login.php" method="post">
  <h2>Login!</h2>
    <label for="username">Username:</label>
    <input type="text" name="username" id="username"><br><br>
    <label for="password">Password:</label>
    <input type="password" name="password" id="password"><br><br>
    <input type="submit" value="Login">
</form>
</div>
<?php
include('Includes/footer.inc');
?>