<?php
include "functions.php";
include "includes/header.php";
if($_SESSION['auth_role'] != "admin")
    {
        header("Location: index.php", true, 301);
    }

    // Get Single User Data
    $data = file_get_contents('user.json');
    $data = json_decode($data, true);
    $user = array();
    foreach ($data as $key => $value) {
        if($value['id'] == $_GET['id']){
            $user = $value;
        }
    }
?>

<!-- Include Navigation Page -->
<?php include __DIR__ ."/navigation.php" ?>

<div class="container my-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary d-flex justify-content-between align-items-center">
                    <h4 class="card-title text-white">Edit User</h4>
                </div>
                <div class="card-body" style="background-color: #bdc3c7;">
                    <form action="functions.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $user['id'] ?>">
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-6">
                                <div class="form-group mt-3">
                                    <label for="username" class="form-label fw-bolder">User Name</label>
                                    <input name="username" placeholder="Enter User Name" type="text" class="form-control"
                                        id="username" aria-describedby="username" value="<?php echo $user['username'] ?>">
                                </div>

                                <div class="form-group mt-3">
                                    <label for="email" class="form-label fw-bolder">Email</label>
                                    <input name="email" placeholder="Enter Email" type="email" class="form-control"
                                        id="email" aria-describedby="email" value="<?php echo $user['email'] ?>">
                                </div>

                                <div class="form-group mt-3">
                                    <label for="role" class="form-label fw-bolder">Select Role</label>
                                    <select class="form-select" name="role" id="role">
                                        <option selected disabled>Select Role</option>
                                        <option value="admin" <?php echo $user['role'] == 'admin' ? 'selected' : '' ?> >Admin</option>
                                        <option value="user" <?php echo $user['role'] == 'user' ? 'selected' : '' ?> >User</option>
                                    </select>
                                </div>

                                <div class="form-group mt-3 d-flex justify-content-end">
                                    <button name="updateUser" type="submit" class="btn btn-success">Update User</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include __DIR__ ."/includes/footer.php" ?>