@extends('layouts.dashboard')
@section('content')

<h2>Project - {{ $project->name }}</h2>
<div class="card">
    <div class="card-body">
        <h5 class="card-text">{{$project->professor}}</h5>
        <p class="card-text">{{$project->students}}></p>
        <img src="{{asset('storage/project_images/'.basename($project->image))}}" alt="{{$project->title}}"
        class="img-thumbnail mb-2" style="max-width:200px;">
    

        <a href="{{route('project.edit',$project-<id)}}" class="btn btn-primary">Edit</a>
    </div>
</div>
@endsection