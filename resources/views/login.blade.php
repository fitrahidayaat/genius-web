<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Form</title>
    @vite('resources/css/app.css')
</head>
<body>
    {{-- show error message --}}
    @if ($errors->any())
        <h1 class="text-red-500">{{ $errors->first() }}</h1>
    @endif
    <h1>Login Form</h1>
    <form action="/login" method="post">
        @csrf
        <label for="email">Email:</label>
        <input type="email" name="email" id="email">
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
        <br>
        <button type="submit">Register</button>
    </form>
    
</body>
</html>