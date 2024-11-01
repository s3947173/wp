<?php
include('Includes/header.inc');
?>
<?php
include('Includes/nav.inc');
?>

<div class="login-form">
<form action="process_login.php" method="post">
  <h2>Login!</h2>
    <div class="mb-3">
      <label for="username">Username:</label>
      <input type="text" name="username" id="username" class="form-control w-50"><br><br>
    </div>
    <div class="mb-3">
      <label for="password">Password:</label>
      <input type="password" name="password" id="password" class="form-control w-50"><br><br>
    </div>
    <div class="mb-3">
      <input type="submit" value="Login">
    </div>
</form>
</div>
<?php
include('Includes/footer.inc');
?>