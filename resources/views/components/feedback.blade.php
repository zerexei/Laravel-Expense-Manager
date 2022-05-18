@if ($errors->any())
<div class="border border-red-200 text-red-400 p-4 mb-4">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>

@else

@if(session()->has('success'))
<div class="border border-green-200 text-green-400 p-4 mb-4">
    <p> {{ session()->get('success') }}</p>
</div>
@endif

@if(session()->has('old_password'))
<div class="border border-red-200 text-red-400 p-4 mb-4">
    <p> {{ session()->get('old_password') }}</p>
</div>
@endif

@endif
