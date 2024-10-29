<?php
include('Includes/header.inc');
?>
<?php
include('Includes/nav.inc');
?>
<div class="heading">
<h1>Login page</h1>
</div>
<form action="process_login.php" method="post">
    <label for="username">username</label>
    <input type="text" name="username" id="username"><br><br>
    <label for="password">password</label>
    <input type="password" name="password" id="password"><br><br>
    <input type="submit" value="Login">
</form>
<?php
include('Includes/footer.inc');
?>