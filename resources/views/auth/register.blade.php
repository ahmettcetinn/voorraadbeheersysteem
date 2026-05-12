<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registreren - Voorraadbeheersysteem</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            padding: 40px;
            width: 100%;
            max-width: 400px;
        }

        .card h2 {
            font-size: 24px;
            color: #2c3e50;
            margin-bottom: 24px;
            text-align: center;
        }

        label {
            display: block;
            font-size: 14px;
            font-weight: bold;
            color: #555;
            margin-bottom: 6px;
            margin-top: 16px;
        }

        input {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 14px;
            background-color: #fafafa;
        }

        input:focus {
            outline: none;
            border-color: #2c3e50;
            background-color: white;
        }

        .btn {
            width: 100%;
            padding: 12px;
            background-color: #2c3e50;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            cursor: pointer;
            margin-top: 24px;
        }

        .btn:hover {
            background-color: #1a252f;
        }

        .link {
            text-align: center;
            margin-top: 16px;
            font-size: 14px;
            color: #666;
        }

        .link a {
            color: #2c3e50;
            text-decoration: none;
            font-weight: bold;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 16px;
            font-size: 14px;
        }

        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 16px;
            font-size: 14px;
        }
    </style>
</head>

<body>

    <div class="card">
        <h2>📝 Account Aanmaken</h2>

        @if(session('success'))
            <div class="alert-success">✅ {{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="alert-error">
                @foreach($errors->all() as $error)
                    ❌ {{ $error }}<br>
                @endforeach
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST">
            @csrf

            <label>Naam</label>
            <input type="text" name="Naam" value="{{ old('Naam') }}" required>

            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required>

            <label>Wachtwoord</label>
            <input type="password" name="password" required>

            <label>Wachtwoord bevestigen</label>
            <input type="password" name="password_confirmation" required>

            <button type="submit" class="btn">Account aanmaken</button>
        </form>

        <div class="link">
            Al een account? <a href="{{ route('login') }}">Inloggen</a>
        </div>
    </div>

</body>

</html>