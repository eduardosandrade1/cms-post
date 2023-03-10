<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Blog - {{ $title }}</title>
    @stack('styles')
    @livewireStyles
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark d-flex justify-content-evenly">
        <a class="navbar-brand" href="{{ route('web.view-posts') }}">
            Blog - {{ $title }}
        </a>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <x-button text="Sair" type="submit"></x-button>
        </form>
    </nav>
    <main>
        <div class="w-100 p-4 d-flex justify-content-center pb-4 flex-row">
            {{ $slot }}
        </div>
    </main>

    @stack('scripts')
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
