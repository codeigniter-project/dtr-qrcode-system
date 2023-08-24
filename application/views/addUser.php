


<html>
    
<head>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js"></script> 

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>    
</head>

<body>
<div class="container">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add User</h2>
        </div>
    </div>
</div>

<form>

<div class="row">
  <div class="col-lg-8">
    <strong>USERNAME:</strong>
    <input type="text" name="username" class="form-control" placeholder="USERNAME">
  </div>
  <div class="col-lg-8">
    <strong>PASSWORD:</strong>
    <input type="text" name="password" class="form-control" placeholder="PASSWORD">
  </div>

  <div class="col-lg-8">
    <strong>User Type:</strong>
    <select name="userType" class="form-control">
      <option value="1">Super admin</option>
      <option value="2">Admin</option>
    </select>
  </div>

  <div class="col-lg-8">
    <br/>
    <button type="submit" class="btn btn-success">Save</button>
  </div>
</div>

</form>

</div>


<script type="text/javascript">
    $('form').submit(function(e) {
        e.preventDefault();

       var username = $("input[name='username']").val();
       var password = $("input[name='password']").val();
       var userType = $("select[name='userType']").val();

        $.ajax({  
        type: "POST",  
        url:  "http://localhost:8003/index.php/sample/userAddDb",  
        data: {username: username, password: password, userType: userType},   
        success: function(result){  
            if(result!=0){  
                // On success redirect.  
              console.log(result)
              window.location.replace(result); 

            }  
            else  
                jQuery("div#err_msg").show();  
                jQuery("div#msg").html("Login Failed");  
            }  
        });

    });

</script>


</body>
</html>