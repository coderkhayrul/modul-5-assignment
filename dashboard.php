<?php
include "functions.php";
include "includes/header.php";
  if($_SESSION['auth_role'] != "admin")
  {
    header("Location: index.php", true, 301);
  }
?>


<!-- Include Navigation Page -->
<?php include __DIR__ ."/navigation.php" ?>

<div class="container my-4">
  <h1 class="display-4 text-primary text-center my-2">Welcome To Dashboard</h1>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h4 class="card-title">All User List</h4>
          <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Create User</a>
        </div>
        <div class="card-body">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">UserName</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
        $data = file_get_contents('user.json');
        $data = json_decode($data, true);
        foreach ($data as $key => $value) { 
        if($value['id'] != $_SESSION['auth_id']){?>
              <tr>
                <td><?php echo $value['username'] ?></td>
                <td><?php echo $value['email'] ?></td>
                <td><?php echo $value['role'] ?></td>
                <td>
                  <a href="userEdit.php?id=<?php echo $value['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                  <a href="functions.php?delete=<?php echo $value['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                </td>
              </tr>
              <?php }?>
              <?php } ?>
            
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- User Create Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Create User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="functions.php" method="POST">
        <div class="modal-body">
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
            <label for="username" class="form-label fw-bolder">User Name</label>
            <input name="username" placeholder="Enter User Name" type="text" class="form-control" id="username"
              aria-describedby="username">
          </div>

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
            <label for="role" class="form-label fw-bolder">Select Role</label>
            <select class="form-select" name="role" id="role">
              <option selected disabled>Select Role</option>
              <option value="admin">Admin</option>
              <option value="user">User</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button name="createUser" type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- User Edit Modal -->

<?php include __DIR__ ."/includes/footer.php" ?>