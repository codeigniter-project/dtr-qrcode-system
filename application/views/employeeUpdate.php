


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
            <h2>Update Employee /Delete employee</h2>
        </div>
    </div>
</div>

<form>

<div class="row">
<div class="col-lg-8">
    <strong>id:</strong>
    <input type="text" name="id" class="form-control" placeholder="id" value="<?php echo $data[0]->id ?>">
  </div>
  <div class="col-lg-8">
    <strong>Firtname:</strong>
    <input type="text" name="firstname" class="form-control" placeholder="firstname" value="<?php echo $data[0]->first_name ?>">
  </div>
  <div class="col-lg-8">
    <strong>lastname:</strong>
    <input type="text" name="lastname" class="form-control" placeholder="lastname" value="<?php echo $data[0]->last_name ?>">
  </div>


  <div class="col-lg-8">
    <br/>
    <button class="btn btn-success" id="update">update</button>

    <button class="btn btn-danger" id="delete">deletes</button>

  </div>
</div>

</form>

</div>




<script type="text/javascript">
    $('form').submit(function(e) {
        e.preventDefault();

      var id = $("input[name='id']").val();
       var firstname = $("input[name='firstname']").val();
       var lastname = $("input[name='lastname']").val();

   
       $("#delete").click(function () {
            // var url = $(location).attr('href');
            // $('#spn_url').html('<strong>' + url + '</strong>');

            window.location.replace('http://localhost:8003/index.php/sample/employeeDelete?id='+id);

            console.log(id)
        });

        $("#update").click(function () {
          // console.log('fdf')

            $.ajax({
            url: 'http://localhost:8003/index.php/sample/employeeUpdate',
            type: 'POST',
            dataType: 'json',
            data: {firstname: firstname, lastname: lastname, id:id},
            success: function(result){  
            if(result!=0){  
                // On success redirect.  
                console.log(result)
            // window.location.replace(result);  

            window.location.replace('http://localhost:8003/index.php/sample/employee');
            }  
            else  
                jQuery("div#err_msg").show();  
                jQuery("div#msg").html("Login Failed");  
            }  
          });

        });


        


        


    });

</script>


</body>
</html>