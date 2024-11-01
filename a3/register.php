<?php
include('Includes/header.inc');
?>
<?php
include('Includes/nav.inc');
?>
<div class="login-form">
    <form action="process_register.php" method="post">
        <h2>Register Now!</h2>
        <div class="mb-3">
          <label for="username">username</label>
          <input type="text" name="username" id="username" class="form-control w-50"><br><br>
        </div>
        <div class="mb-3">
          <label for="password">password</label>
          <input type="password" name="password" id="password" class="form-control w-50"><br><br>
        </div>
        <div class="mb-3">
          <input type="submit" value="Register" class="form-control w-50">
        </div>
    </form>
</div>
<?php
include('Includes/footer.inc');
?>