@if(session('status'))
    <div class="mb-4 rounded border border-green-200 bg-green-50 px-4 py-2 text-green-700 text-sm">
        {{ session('status') }}
    </div>
@endif
@if($errors->any())
    <div class="mb-4 rounded border border-red-200 bg-red-50 px-4 py-2 text-red-700 text-sm">
        <ul class="list-disc ms-5">
            @foreach($errors->all() as $e)
                <li>{{ $e }}</li>
            @endforeach
        </ul>
    </div>
@endif
