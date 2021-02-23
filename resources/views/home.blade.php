@extends('layouts.app')

@section('content')
<div class="container">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="container">
  <br>                <a class="btn btn-success" href="{{ route('project.create') }}" title="Create a project"> <i class="fas fa-plus-circle">Create a project</i>

<br><br>            
  <table class="table table-bordered table-responsive-lg">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
              @foreach ($projects as $project)

      <tr>

            <td>{{ $project->name }}</td>
            <td>{{ $project->introduction }}</td>
            <td>{{ $project->location }}</td>
            <td>{{ $project->cost }}</td>
           <td>
                    <form action="{{ route('project.destroy', $project->id) }}" method="POST">

                        <a href="{{ route('project.show', $project->id) }}" title="show">
                            <i class="fas fa-eye text-success  fa-lg">show</i>
                        </a>

                        <a href="{{ route('project.edit', $project->id) }}">
                            <i class="fas fa-edit  fa-lg">Edit</i>

                        </a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger">Delete</i>

                        </button>
                    </form>
                </td>
      </tr>
       @endforeach
    </tbody>
  </table>
</div>                </div>
            </div>
        </div>
    </div>
</div>
@endsection
