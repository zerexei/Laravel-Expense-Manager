@if ($errors->any())
<div class="border border-red-200 p-4">
    <ul>
        @foreach ($errors->all() as $error)
        <li class="text-red-400">{{ $error }}</li>
        @endforeach
    </ul>
</div>

@else

@if(session()->has('success'))
<p class="border border-green-200 text-green-400 p-4"> {{ session()->get('success') }}</p>
@endif

@if(session()->has('old_password'))
<p class="border border-red-200 text-red-400 p-4"> {{ session()->get('old_password') }}</p>
@endif

@endif
