<!doctype html>
<html lang="en">

<head>
  <?php $this->load->view('includes/header'); ?>
  <title>Edit Post</title>
</head>

<body>

  <div class="container">
    <div class="row">

      <div class="col-lg-12 my-5">
        <h2 class="text-center mb-3">Daily Time Record System</h2>
      </div>

      <div class="col-lg-12">

        <div class="d-flex justify-content-between ">
          <h4>Edit User</h4>
          <a class="btn btn-warning" href="<?php echo base_url(); ?>"> <i class="fas fa-angle-left"></i> Back</a>
        </div>

        <form method="post" action="<?php echo base_url('user/update/' . $data->id); ?>">

          <div class="form-group">
            <label>Username</label>
            <input class="form-control" type="text" name="user_name" value="<?php echo $data->user_name; ?>">
          </div>

          <div class="form-group">
            <label>Password</label>
            <textarea class="form-control" name="user_password"><?php echo $data->user_password; ?></textarea>
          </div>

          <div class="form-group">
            <label>User Type</label>
            <textarea class="form-control" name="user_type"><?php echo $data->user_type; ?></textarea>
          </div>


          <div class="form-group">
            <button type="submit" class="btn btn-success"> <i class="fas fa-check"></i> Submit </button>
          </div>

        </form>


      </div>
    </div>
  </div>



  <?php $this->load->view('includes/footer'); ?>

</body>

</html>