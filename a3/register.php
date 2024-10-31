<?php
include('Includes/header.inc');
?>
<?php
include('Includes/nav.inc');
?>
<div class="login-form">
    <form action="process_register.php" method="post">
        <h2>Register Now!</h2>
        <label for="username">username</label>
        <input type="text" name="username" id="username"><br><br>
        <label for="password">password</label>
        <input type="password" name="password" id="password"><br><br>
        <input type="submit" value="Register">
    </form>
</div>
<?php
include('Includes/footer.inc');
?>