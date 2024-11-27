@extends('layouts.app')

@section('content')
<div class="container">
    <div class="Container d-flex justify-content-center align-items-center vh-100">
        <div class="card mx-auto mb-5 shadow-lg p-4 rounded" style="width: 35rem; border: none;">
            <div class="card-body">
                <h5 class="card-title text-center">Project</h5>
                <form action="{{ route('projects.update', $project->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="title" class="form-label">Project Title</label>
                    <input type="text" class="form-control" id="title" name="title"  value="{{ old('title', $project->title) }}" style="background: linear-gradient(315deg, #ffffff, #d7e1ec);" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Project Description</label>
                    <textarea class="form-control" id="description" name="description" style="background: linear-gradient(315deg, #ffffff, #d7e1ec);" rows="3">{{ old('description', $project->description) }}</textarea>
                </div>
                <hr>
                <div class="text-center">
                    <button type="submit" class="btn btn-outline-primary btn-sm">SAVE</button>
                </div>
                </form>
            </div>
        </div>
    </div>           
</div>
@endsection