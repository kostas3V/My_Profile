@extends('layouts.app')

@section('content')
<div class="container">
    <div class="Container mt-2 align-items-center vh-100">
        @if(Auth::check() && Auth::user()->is_admin)
            <div class="text-center py-2">
                <a href="{{route('resume.create')}}" class="btn btn-outline-primary btn-sm">CREATE</a>
            </div>
        @endif
    @if($resume)
        <div class="card mx-auto mb-3 shadow-lg p-4 rounded" style="width: 35rem; border: none;">
            <div class="card-body">
                <h2 class="text-2xl font-bold mb-4">Download My Resume</h2>
                <p class="mb-4">Click the button below to download my resume:</p>
                <hr>
                <div class="text-center">
                    <a href="{{ route('resume.download', $resume->id) }}" class="py-2 px-4">DOWNLOAD RESUME</a>  
                </div>
            </div>
        </div>
        @else
            <div class="card mx-auto mt-3 shadow-lg p-4 rounded" style="width: 35rem; border: none;">
                <div class="card-body">
                    <p class="text-gray-600 mb-4">No items available.</p>
                </div>
            </div>
        @endif
    </div>           
</div>
@endsection