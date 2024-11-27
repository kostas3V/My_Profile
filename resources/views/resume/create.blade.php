@extends('layouts.app')

@section('content')
<div class="container">
    <div class="Container mt-2 align-items-center vh-100">
        <div class="card mx-auto mb-3 shadow-lg p-4 rounded" style="width: 35rem; border: none;">
            <div class="card-body">
                <form action="{{ route('resume.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="resume" class="form-label">Resume</label>
                        <input type="file" id="resume" name="resume" class="form-control" style="background: linear-gradient(315deg, #ffffff, #d7e1ec);">
                    </div>
                    <hr>
                    <div class="text-center">
                        <button type="submit" class="btn btn-outline-primary btn-sm">UPLOAD</button>
                    </div>
                </form>
            </div>
        </div>
    </div>           
</div>
@endsection