@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <a href = "{{ route('project.create') }}">Create</a><br><br>        
  <table class="table table-striped">
    <thead>
      <tr>
      <th>First Name</th>
        <th>Last Name</th>
        <th>Phone Number</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
              @foreach ($projects as $project)

      <tr>

      <td>{{ $project->first_name }}</td>
            <td>{{ $project->last_name }}</td>
            <td>{{ $project->phone_number }}</td>
           <td>
                    

                        <a href="{{ route('project.show', $project->id) }}" title="show">
                            <i class="fas fa-eye text-success  fa-lg">show</i>
                        </a>
                </td>
      </tr>
       @endforeach
    </tbody>
  </table>
</div>

</body>
</html>
@endsection