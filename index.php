<?php
include "functions.php";
include "includes/header.php";
?>

<nav class="navbar navbar-expand-lg bg-primary navbar-dark">
  <div class="container">
    <a class="navbar-brand" href="#">HOME</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
      aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Portfolio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Github</a>
        </li>
      </ul>
      <?php
        if(isset($_SESSION['auth_id'])){
          if ($_SESSION['auth_role'] == "admin") {
            echo "<a href='dashboard.php' class='btn btn-secondary btn-md me-3'>Dashboard</a>";
          }
          echo "<a href='?logout' class='btn btn-danger btn-md me-3'>Logout</a>";
        }else{
          echo '<a href="login.php" class="btn btn-info btn-md me-3">Login</a>';
          echo '<a href="register.php" class="btn btn-success btn-md">Register</a>';
        }
      ?>
    </div>
  </div>
</nav>

<h1 style="text-align: center; padding-top: 30px">Welcome <?php echo $_SESSION['auth_username'] ?? '' ?></h1>

<?php include __DIR__ ."/includes/footer.php" ?>
  


