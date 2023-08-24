


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
            <h2>Add Employee</h2>
        </div>
    </div>
</div>

<form>

<div class="row">
  <div class="col-lg-8">
    <strong>Firtname:</strong>
    <input type="text" name="firstname" class="form-control" placeholder="firstname">
  </div>
  <div class="col-lg-8">
    <strong>lastname:</strong>
    <input type="text" name="lastname" class="form-control" placeholder="lastname">
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

       var firstname = $("input[name='firstname']").val();
       var lastname = $("input[name='lastname']").val();
     

        $.ajax({  
        type: "POST",  
        url:  "http://localhost:8003/index.php/sample/userAddEmployee",  
        data: {firstname: firstname, lastname: lastname},   
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