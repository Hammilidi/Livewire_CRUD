<!DOCTYPE html>
<html>

<head>
    <title></title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @livewireStyles
</head>

<body>
    <div class="col-md-6 mx-auto">
        <div class="card">
            <div class="card-header">
                <h2> First Laravel Livewire CRUD </h2>
            </div>
            <div class="card-body">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('messsage') }}
                    </div>
                @endif
                @livewire('users')
            </div>
        </div>
    </div>
    </div>
    @livewireScripts
</body>

</html>
