<?php
include "functions.php";
include "includes/header.php";

  // Check User Login
  if(isset($_SESSION['auth_id'])){
    header("Location: index.php", true, 301);
  }
?>

<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-6 offset-lg-3">
        <div style="padding: 50px 0;" class="login-inner">
          <form method="POST" action="functions.php"
            style="background-color: #f1f1f1; border-radius: 10px; padding: 20px;">
            <h1 class="text-center text-primary">SIGN IN</h1>
            <!-- Show Error Message -->
            <?php
                if (isset($_SESSION['errors']) && count($_SESSION['errors']) > 0) {
                  foreach ($_SESSION['errors'] as $error) {
                    preg_filter('/\s/', '', $error);
                    echo "<div class='alert alert-danger'>$error</div>";
                  }
                  unset($_SESSION['errors']); 
                }
              ?>

            <div class="form-group mt-3">
              <label for="email" class="form-label fw-bolder">Email</label>
              <input name="email" placeholder="Enter Email" type="email" class="form-control" id="email"
                aria-describedby="email">
            </div>

            <div class="form-group mt-3">
              <label for="password" class="form-label fw-bolder">Password</label>
              <input name="password" placeholder="Enter Password" type="password" class="form-control" id="password"
                aria-describedby="password">
            </div>

            <div class="form-group mt-3">
              <button name="login" type="submit" class="btn btn-primary me-2">Login</button>
              <a href="register.php" class="btn btn-link text-success">create an account</a>
            </div>


            <!-- Create User Account Details Page -->
            <div class="row mt-5">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Admin</th>
                    <th scope="col">Password</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>admin@mail.com</td>
                    <td>password</td>
                  </tr>
                  <tr>
                    <td>user@mail.com</td>
                    <td>password</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include __DIR__ ."/includes/footer.php" ?>