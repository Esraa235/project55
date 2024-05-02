@extends('layouts.app')
@section('content')

 <div>
    <h2 class="my-4">Projects</h2>
    <a href="{{ route('projects.create')}}" class="btn btn-primary mb-3">Add Project</a>

    @if (session('success'))
    <div class="alert alert-success">{{session('success') }}</div>
    @endif

    <table class="table">
        <thead>
          <tr>
            <th scope="col">name</th>
            <th scope="col">tags</th>
            <th scope="col">students</th>
            <th scope="col">professor</th>
          </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
          <tr>
            <th> {{ $project->name}}</th>
            <td> {{ $project->tags}}</td>
            <td> {{ $project->students}}</td>
            <td> {{ $project->professor}}</td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td colspan="2">Larry the Bird</td>
            <td>@twitter</td>
            <td>
                <a href="{{route('categories.show'.$category->id)}}" class="btn btn btn-primary"></a>
                <a href="{{route('categories.show'.$category->id)}}" class="btn btn btn btn-warning"></a>
                <!-- <form action="{{ route('')}}"></form> -->
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
 </div>
 @endsection