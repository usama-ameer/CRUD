<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
  <title>Trash Page</title>
</head>

<body>
  @include('layouts.navbar')
  @if (\Session::has('success'))
  <div class="alert alert-success">
    <ul>
      <li>{!! \Session::get('success') !!}</li>
    </ul>
  </div>
  @endif
  <div class="container">
    <div class="row">
      <div class="col-md-12 ">
        <h2 class="text-center mt-5">View Records</h2>
        <table id="form" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Gender</th>
              <th>Email</th>
              <th>Body</th>
              <th>Position</th>
              <th>Date/Time</th>
              <th>Actions</th>

            </tr>
          </thead>
          <tbody>
            @foreach ($members as $user)
            <tr>
              <td>{{ $user->id }}</td>
              <td>{{ $user->fname }}</td>
              <td>{{ $user->lname }}</td>
              @if ($user->radio == 1)
              <td>Male</td>
              @else
               <td> Female</td>
           @endif
            <td>{{ $user->email }}</td>
            <td>{{ $user->body }}</td>
               @if ($user->dropdown == 3)
               <td> Junior Web Developer</td>
              @elseif ($user->dropdown == 2)
              <td> Senior Web Developer</td>
              @else
              <td> Project Manager</td>
              @endif
              <td>{{ $user->created_at->format('d-M-Y') }} / {{ Carbon\Carbon::parse($user->check_in)->format(' g:i:A' ) }}</td>
              <td>
                <a href={{ "forcedelete/" . $user->id }} class="btn btn-danger delete-confirm"  onclick="return confirm('Are you sure Delete?')">Delete</a>
                <a href={{ "restore/" . $user->id }} class="btn btn-info">Restore</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
 



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"     crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
 <script>
   $(document).ready(function () {
    $('#form').DataTable({
        order: [[0, 'desc']],
    });
    
});
 </script>

</body>

</html>