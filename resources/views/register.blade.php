<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Form</title>
    @vite('resources/css/app.css')
</head>
<body>
    {{-- show error messages --}}
    @if ($errors->any())
        <h1 class="text-red-500">{{ $errors->first() }}</h1>
    @endif
    <form action="/register" method="post">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" id="name">
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email">
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
        <br>
        {{-- role --}}
        <label for="role">Role:</label>
        <select name="role" id="role">
            <option value="student">student</option>
            <option value="teacher">teacher</option>
        </select>
        <br>
        <button type="submit">Register</button>
    </form>
    
</body>
</html>