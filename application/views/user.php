
<html>

<head>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js"></script> 

    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>    
</head>



<div class="container" >


<a type="button" class="btn btn-primary"   href="http://localhost:8003/index.php/sample/employee">Employee</a>
<!-- <a type="button" class="btn btn-primary"  href="http://localhost:8003/index.php/sample/employee_time_record">Employee Time Record</a> -->
<a type="button" class="btn btn-primary" href="http://localhost:8003/index.php/sample/user">User list</a>



<hr>

<div style="float:right">
<a type="button" class="btn btn-primary"  href="http://localhost:8003/index.php/sample/userAdd">Add User</a>    
<a type="button" class="btn btn-primary"  value="delete" name="delete" id="delete">udpate</a>
</div>



<table id="user" class="table table-bordered table-striped table-hover">
     <thead>
     <tr><td>ID</td><td>user</td><td>password</td><td>Usert Type</td><td>Date added</td><td>date modified</td></tr>
     </thead>
     <tbody>
     </tbody>
</table>



</div>


<script type="text/javascript">
$(document).ready(function() {
    
    var id;

    var table =$('#user').DataTable({
        "ajax": {
            url : "http://localhost:8003/index.php/sample/data",
            type : 'GET'
        },
        select: true,
    
    });

    table.on( 'select', function ( e, dt, type, indexes ) {
      if ( type === 'row' ) {
        var x = table.rows().data().pluck('Stek').context[0].jqXHR.responseJSON.data;

        id = x[indexes][0]

      }
    });

    $("#delete").click(function () {
        // var url = $(location).attr('href');
        // $('#spn_url').html('<strong>' + url + '</strong>');

        window.location.replace('http://localhost:8003/index.php/sample/userUpdate?id='+id);

        console.log(id)
    });



},






);

</script>






</script>








</html>
