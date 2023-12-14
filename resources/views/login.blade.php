<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded shadow-md w-96">
        <h2 class="text-2xl font-semibold mb-6">Login</h2>

        <form action="{{ route('login.auth') }}" method="POST">
            @csrf
            @if (Session::get('failed'))
                <div class="alert alert-danger">{{ Session::get('failed') }}</div>
            @endif
            <br>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                <input type="email" id="email" name="email"
                    class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" />
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                <input type="password" id="password" name="password"
                    class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" />
            </div>

            <div class="flex items-center justify-between">
                <button type="submit"
                    class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                    Login
                </button>
                <a href="#" class="text-blue-500 hover:underline">Forgot Password?</a>
            </div>
        </form>
    </div>

</body>

</html>
