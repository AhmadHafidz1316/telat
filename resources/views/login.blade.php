<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .login-card {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #e8e8e8;
            box-shadow: 2px 2px 10px #ccc;
        }

        .card-header {
            text-align: center;
            margin-bottom: 20px
        }

        .card-header .log {
            margin: 0;
            font-size: 24px;
            color: black;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-size: 18px;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px 20px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            transition: 0.5s;
        }

        input[type="submit"] {
            width: 100%;
            background-color: #333;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #ccc;
            color: black;
        }
    </style>
</head>

<body class=" h-screen flex items-center justify-center">
        <form action="{{ route('login.auth') }}" method="POST"
            class="animate__animated animate__fadeIn animate__faster">
            @csrf
            @if (Session::get('failed'))
                <div class="bg-red-100 p-2 mb-4 text-red-600 border border-red-500 rounded">
                    {{ Session::get('failed') }}
                </div>
            @endif

            <div class="login-card">
                <div class="card-header">
                    <div class="log"></div>
                </div>
                <form>
                    <div class="form-group">
                        <label for="email">Email :</label>
                        <input required="" name="email" id="email" type="text">
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input required="" name="password" id="password" type="password">
                    </div>
                    <div class="form-group">
                        <input value="Login" type="submit">
                    </div>
                </form>
            </div>

</body>

</html>
