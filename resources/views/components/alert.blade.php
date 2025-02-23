@if (session()->has('success'))
    <div class="alert alert-success bg-red-400">
        {{ session('success') }}
    </div>
@endif
@if (session()->has('message'))
    <div class="alert alert-message bg-blue-400">
        {{ session('message') }}
    </div>
@endif
@if (session()->has('error'))
    <div class="alert alert-error bg-yellow-400">
        {{ session('error') }}
    </div>
@endif
@if (session()->has('warning'))
    <div class="alert alert-warning bg-green-400">
        {{ session('warning') }}
    </div> 
@endif

@if ($errors->any())
    <ul class="text-sm text-red-600 dark:text-red-400 space-y-1">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif