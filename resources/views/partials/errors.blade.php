@if(count($errors)> 0)
    @foreach($errors->all() as $error)
        <div class="alert alert-danger mx-auto shadow-lg p-2 rounded" style="width: 35rem; border: none;">
            <span class="font-semibold">{{ $error }}</span>
        </div>
    @endforeach
@endif

@if(session('success'))
    <div class="alert alert-success mx-auto shadow-lg p-2 rounded" style="width: 35rem; border: none;">
        <span class="font-semibold">{{ session('success') }}</span>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger mx-auto shadow-lg p-2 rounded" style="width: 35rem; border: none;">
        <span class="font-semibold">{{ session('error') }}</span>
    </div>
@endif