<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registreren - Voorraadbeheersysteem</title>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=DM+Mono:wght@400;500&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --navy: #0f1e2e;
            --accent: #3b82f6;
            --danger: #ef4444;
            --danger-light: #fee2e2;
            --success-light: #d1fae5;
            --gray-50: #f8fafc;
            --gray-200: #e2e8f0;
            --gray-500: #64748b;
            --white: #ffffff;
            --text: #1e293b;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--navy);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        body::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(59, 130, 246, 0.06) 1px, transparent 1px),
                linear-gradient(90deg, rgba(59, 130, 246, 0.06) 1px, transparent 1px);
            background-size: 40px 40px;
        }

        .card {
            background: var(--white);
            border-radius: 12px;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.10);
            padding: 48px 40px;
            width: 100%;
            max-width: 420px;
            position: relative;
            z-index: 1;
            animation: slideUp 0.4s ease;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(16px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .logo {
            text-align: center;
            margin-bottom: 32px;
        }

        .logo-icon {
            width: 56px;
            height: 56px;
            background: var(--navy);
            border-radius: 14px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 26px;
            margin-bottom: 16px;
        }

        .logo h1 {
            font-size: 20px;
            font-weight: 700;
            color: var(--text);
        }

        .logo p {
            font-size: 14px;
            color: var(--gray-500);
            margin-top: 4px;
        }

        .form-group {
            margin-bottom: 16px;
        }

        label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: var(--text);
            margin-bottom: 7px;
        }

        input {
            width: 100%;
            padding: 11px 14px;
            border: 1.5px solid var(--gray-200);
            border-radius: 8px;
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            color: var(--text);
            background: var(--gray-50);
            transition: border-color 0.2s, box-shadow 0.2s, background 0.2s;
        }

        input:focus {
            outline: none;
            border-color: var(--accent);
            background: var(--white);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.12);
        }

        .btn {
            width: 100%;
            padding: 12px;
            background: var(--navy);
            color: var(--white);
            border: none;
            border-radius: 8px;
            font-family: 'DM Sans', sans-serif;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s;
            margin-top: 8px;
        }

        .btn:hover {
            background: #1a3248;
        }

        .alert-success {
            background: var(--success-light);
            color: #065f46;
            padding: 12px 14px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 13px;
            border-left: 3px solid #10b981;
        }

        .alert-error {
            background: var(--danger-light);
            color: #991b1b;
            padding: 12px 14px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 13px;
            border-left: 3px solid var(--danger);
        }

        .footer-link {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: var(--gray-500);
        }

        .footer-link a {
            color: var(--accent);
            text-decoration: none;
            font-weight: 600;
        }

        .footer-link a:hover {
            text-decoration: underline;
        }

        .rol-info {
            margin-top: 16px;
            padding: 12px 14px;
            background: #eff6ff;
            border-radius: 8px;
            font-size: 13px;
            color: #1d4ed8;
            border-left: 3px solid var(--accent);
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="logo">
            <div class="logo-icon">📝</div>
            <h1>Account aanmaken</h1>
            <p>Registreer als student</p>
        </div>

        @if(session('success'))
            <div class="alert-success">✅ {{ session('success') }}</div>
        @endif
        @if($errors->any())
            <div class="alert-error">
                @foreach($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Naam</label>
                <input type="text" name="Naam" value="{{ old('Naam') }}" required placeholder="Voor- en achternaam">
            </div>
            <div class="form-group">
                <label>E-mailadres</label>
                <input type="email" name="email" value="{{ old('email') }}" required placeholder="naam@school.nl">
            </div>
            <div class="form-group">
                <label>Wachtwoord</label>
                <input type="password" name="password" required placeholder="Minimaal 6 tekens">
            </div>
            <div class="form-group">
                <label>Wachtwoord bevestigen</label>
                <input type="password" name="password_confirmation" required placeholder="Herhaal wachtwoord">
            </div>
            <button type="submit" class="btn">Account aanmaken</button>
        </form>

        <div class="rol-info">🎓 Nieuwe accounts worden automatisch als <strong>Student</strong> aangemaakt.</div>

        <div class="footer-link">
            Al een account? <a href="{{ route('login') }}">Inloggen</a>
        </div>
    </div>
</body>

</html>