@extends('layouts.dashboard')
@section('content')


<h2>
    {{isset($project)? 'Edit Project': 'Create Project'}}
</h2>

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ isset($project) ? route('project.update' ,$project->id) :route('project.store')}}"
    method="POST" enctype="multipart/form-data" >
@csrf
@if (isset ($project ))
    @method('PUT')
@endif

<div class="form-group">
   <label for="name">Project Name</label>
   <input type="text" class="form-control" id="name" name="project-name"
     values="{{isset($project) ? $project->name :''}}" required>
</div>
<div class="form-group">
    <label for="details"> Details</label>
    <textarea type="text" class="form-control" id="details" name="details"
      values="{{isset($project) ? $project->details :''}}" required>
 </div>
 
 <div class="form-group">
    <label for="professor"> Progessor</label>
    <input type="text" class="form-control" id="professor" name="professor"
      values="{{isset($project) ? $project->professor :''}}" required>
 </div>
 <div class="form-group">
    <label for="summary"> Summary</label>
    <input type="text" class="form-control" id="summary" name="summary"
      values="{{isset($project) ? $project->summary :''}}" required>
 </div>
 <div class="form-group">
    <label for="image"> Image of Book</label>
    <input type="file" class="form-control-file" id="image" name="image" accept="image/*"
      values="{{isset($project) ? $project->summary :''}}" required>
      @if (isset($project)&& $project->image)
      <img src="{{asset($project->image)}}" alt="{{$image->title}}" class="mt-2 img-thumbnail"
      style="max-width:200px ;">
 </div>
 <button type="submit" class="btn btn-primary">{{isset($project) ?'Update':'Create Project'}}</button>
</form>