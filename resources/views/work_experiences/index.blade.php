@extends('layouts.app')

@section('content')
<div class="container">
    <div class="Container mt-2 align-items-center">
        @if(Auth::check() && Auth::user()->is_admin)
            <div class="text-center py-2">
                <a href="{{route('work_experiences.create')}}" class="btn btn-outline-primary btn-sm">CREATE</a>
            </div>
        @endif
        @forelse($work_experiences as $work_experience)
        <div class="card mx-auto mb-3 shadow-lg p-4 rounded" style="width: 35rem; border: none;">
            <div class="card-body">
                <h2 class="text-lg font-bold mb-2">{{ $work_experience->title }}</h2>
                <p class="text-gray-600 mb-4">{{ $work_experience->description }}</p>
            </div>
            @if(Auth::check() && Auth::user()->is_admin)
                <hr>
                <div class="text-center py-2 d-flex justify-content-center gap-2">
                    <div class="text-center">
                        <a href="{{route('work_experiences.edit', $work_experience->id)}}" class="btn btn-outline-primary btn-sm">EDIT</a>
                    </div>
                        <div class="text-center">
                            <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{$work_experience->id}}">DELETE</button>
                        </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="deleteModal{{$work_experience->id}}" tabindex="-1" aria-labelledby="deleteModalLabel{{$work_experience->id}}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel{{$work_experience->id}}">Confirm Action: Delete</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete this education record? This action cannot be undone.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">CANCEL</button>
                                <form action="{{route('work_experiences.destroy', $work_experience->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">DELETE</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        @empty
            <div class="card mx-auto mt-3 shadow-lg p-4 rounded" style="width: 35rem; border: none;">
                <div class="card-body">
                    <p class="text-gray-600 mb-4">No items available.</p>
                </div>
            </div>
        @endforelse
    </div>           
</div>
@endsection