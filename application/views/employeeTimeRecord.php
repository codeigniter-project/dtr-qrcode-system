
<html>

<head>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js"></script> 

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>    
</head>



<div class="container">
<a type="button" class="btn btn-primary"   href="http://localhost:8003/index.php/sample/employee">Employee</a>
<!-- <a type="button" class="btn btn-primary"  href="http://localhost:8003/index.php/sample/employee_time_record">Employee Time Record</a> -->
<a type="button" class="btn btn-primary" href="http://localhost:8003/index.php/sample">User list</a>

<hr>
<button type="button" class="btn btn-primary">add</button>

<table id="user" class="table table-bordered table-striped table-hover">
     <thead>
     <tr><td>user</td><td>password</td><td>Usert Type</td><td>Date added</td><td>date modified</td></tr>
     </thead>
     <tbody>
     </tbody>
</table>



<!-- <script type="text/javascript">
$(document).ready(function() {
    $('#user').DataTable({
        "ajax": {
            url : "",
            type : 'GET'
        },
    });
});
</script> -->





</div>


</html>
