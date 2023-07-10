<!DOCTYPE html>
<html lang="en">
<head>
  <title>Details</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<body>

<div class="container-fluid p-5 bg-primary text-white text-center">
  <h1>Maintenance Details</h1>
</div>
  
<table class="table">
    <thead>
        <tr>
            <td> Room Number </td>
            <td> Paid </td>
            <td> Paid To </td>
            <td> Paid At </td>
        </tr>

        @foreach($AllDetails as $x)
        <tr>
            <td> {{ $x->RoomNumber }} <input type="hidden" value='{{ $x->id }}'></td>
            <td> <input type="checkbox" {{ ($x->PaidTo)?"checked": ""}}> </td>
            <td> {{ $x->PaidTo }} </td>
            <td> {{ $x->PaidAt }} </td>
        </tr>
        @endforeach
    </thead>
</table>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Accepting Payment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="update" method='POST'>
            @csrf
            @method('put')
                <div class="form-group">
                    <label for=""> Room Number</label>
                    <input type="text" name="RoomNumber" id="RoomNumber" disabled class="form-control">

                </div>

                <div class="form-group">
                    <label for=""> Accepted Date</label>
                    <input type="date" name="PaidAt" id="PaidAt" class="form-control">
                </div>

                <div class="form-group">
                    <label for=""> Accepted By</label>
                    <input type="text" name="PaidTo" id="PaidTo" class="form-control">
                </div>

                <div class="form-group text-center">
                    <input type="submit" id="submit" class="btn btn-success" >
                </div>
        </form>        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>





<script>

$(document).ready(function() {
  $('input[type="checkbox"]').change(function(e) {
    if ($(this).is(':checked')) {
        rm = e.target.parentElement.previousElementSibling.innerText
        id = e.target.parentElement.previousElementSibling.querySelector('input[type="hidden"]').value
        
        $('#myModal').find('form').find('#RoomNumber').attr('value',rm);
        $('#myModal').find('form').attr('action',"details/"+id);
        $('#myModal').modal();
    }else {
        $('#RoomNumber').val('');
        $('#PaidTo').val('');
        $('#PaidAt').val('');
        $('#submit').val('');

        rm = e.target.parentElement.previousElementSibling.innerText
        id = e.target.parentElement.previousElementSibling.querySelector('input[type="hidden"]').value
        
        $('#myModal').find('form').find('#RoomNumber').attr('value',rm);
        $('#myModal').find('form').attr('action',"details/"+id);
        $('#myModal').modal();
        
    }
  });
});

</script>


</body>
</html>
