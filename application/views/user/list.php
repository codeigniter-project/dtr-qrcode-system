<!doctype html>
<html lang="en">

<head>
  <?php $this->load->view('includes/header'); ?>
  <title>Daily Time Record System</title>
</head>

<body>

  <div class="container">
    <div class="row">

      <div class="col-lg-12 my-5">
        <h2 class="text-center mb-3">Users Lists</h2>
      </div>

      <div class="col-lg-12">

        <?php echo $this->session->flashdata('message'); ?>

        <div class="d-flex justify-content-between mb-3">
          <h4>Manage Users</h4>
          <a href="<?= base_url('user/create') ?>" class="btn btn-success"> <i class="fas fa-plus"></i> Add New User</a>
        </div>

        <table class="table table-bordered table-default">

          <thead class="thead-light">
            <tr>
              <!-- 
                <th width="2%">ID</th>
              <th width="30%">Username</th>
              <th width="20%">Password</th>
              <th width="20%">User Type</th>
              <th width="14%">DateTime Added</th>
              <th width="14%">Last Modefied DateTime</th>
              -->
              <th>ID</th>
              <th>Username</th>
              <th>Password</th>
              <th>User Type</th>
              <th>DateTime Added</th>
              <th>Last Modified</th>

            </tr>
          </thead>

          <tbody>

            <?php $i = 1; foreach ($data as $user) { ?>

              <tr>
                <td><?php echo $user->id; ?></td>
                <td><?php echo $user->user_name; ?></td>
                <td><?php echo $user->user_password; ?></td>
                <td><?php echo $user->user_type; ?></td>
                <td><?php echo $user->datetime_added; ?></td>
                <td><?php echo $user->datetime_modified; ?></td>

                <td>
                  <a href="<?= base_url('user/edit/' . $user->id) ?>" class="btn btn-primary"> <i class="fas fa-edit"></i> Edit </a>
                  <a href="<?= base_url('user/delete/' . $user->id) ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?')"> <i class="fas fa-trash"></i> Delete </a>
                </td>

              </tr>

            <?php $i++; } ?>

          </tbody>

        </table>

      </div>
    </div>
  </div>



  <?php $this->load->view('includes/footer'); ?>

</body>

</html>