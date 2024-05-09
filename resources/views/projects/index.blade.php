@extends('layouts.dashboard')
@section('content')

 <div class="container-fluid">
    <h2 class="my-4">Projects</h2>
    <a href="{{ route('projects.create')}}" class="btn btn-primary mb-3">Add Project</a>

    @if (session('success'))
    <div class="alert alert-success">{{session('success') }}</div>
    @endif

    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
          <tr>
            <th >name</th>
            <!-- <th >tags</th> -->
            <th >students</th>
            <th >professor</th>
            <th >actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
          <tr>
            <th> {{ $project->name}}</th>
            <!-- <td> {{ $project->tags}}</td> -->
            <td> {{ $project->students}}</td>
            <td> {{ $project->professor}}</td>
            <td>
                <a href="{{route('projects.show'.$project->id)}}" class="btn btn btn-info btn-sm">View</a>
                <a href="{{route('projects.edit'.$project->id)}}" class="btn btn btn btn-primary btn-sm">Edit</a>
                <form action="{{ route('projects.destroy',$$project->id)}}" method="POST"
                 style="display:inline;" >
                @csrf
                @method('DELETE')
                <button type-"submit" class="btn btn-danger btn-sm"
                  onclick="return confirm('Are you sure you want to delete this project')">Delete</button>
                </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
 </div>
 @endsection