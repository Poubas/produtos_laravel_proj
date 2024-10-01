<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ url('/css/bootstrap.min.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <title>Todo App - {{ $title }}</title>
    </head>
    <body>
        {{ isset($nav) ? $nav : '' }} 
        <main class="container-fluid">
            {{ $slot }}
        </main>

        <script src="{{ url('/js/bootstrap.bundle.min.js') }}"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>        
        <script>
            $('.alert').fadeOut(2000);
        </script>
    </body>
</html>