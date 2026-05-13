<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inloggen - Voorraadbeheersysteem</title>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=DM+Mono:wght@400;500&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --navy: #0f1e2e;
            --navy-mid: #1a3248;
            --accent: #3b82f6;
            --accent-hover: #2563eb;
            --danger: #ef4444;
            --danger-light: #fee2e2;
            --gray-50: #f8fafc;
            --gray-100: #f1f5f9;
            --gray-200: #e2e8f0;
            --gray-500: #64748b;
            --white: #ffffff;
            --text: #1e293b;
            --radius: 12px;
            --shadow: 0 4px 24px rgba(0, 0, 0, 0.10);
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

        /* Background grid pattern */
        body::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(59, 130, 246, 0.06) 1px, transparent 1px),
                linear-gradient(90deg, rgba(59, 130, 246, 0.06) 1px, transparent 1px);
            background-size: 40px 40px;
        }

        body::after {
            content: '';
            position: absolute;
            top: -200px;
            right: -200px;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(59, 130, 246, 0.15) 0%, transparent 70%);
            border-radius: 50%;
        }

        .card {
            background: var(--white);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
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
            letter-spacing: -0.3px;
        }

        .logo p {
            font-size: 14px;
            color: var(--gray-500);
            margin-top: 4px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: var(--text);
            margin-bottom: 7px;
            letter-spacing: 0.1px;
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
            transition: background 0.2s, transform 0.1s;
            margin-top: 8px;
        }

        .btn:hover {
            background: var(--navy-mid, #1a3248);
        }

        .btn:active {
            transform: scale(0.99);
        }

        .error {
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

        .test-accounts {
            margin-top: 24px;
            padding: 14px 16px;
            background: var(--gray-50);
            border: 1px solid var(--gray-200);
            border-radius: 8px;
            font-size: 12px;
            color: var(--gray-500);
            font-family: 'DM Mono', monospace;
        }

        .test-accounts strong {
            color: var(--text);
            font-family: 'DM Sans', sans-serif;
            font-size: 12px;
            display: block;
            margin-bottom: 6px;
        }

        .test-accounts span {
            display: block;
            line-height: 1.8;
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="logo">
            <div class="logo-icon">📦</div>
            <h1>Voorraadbeheersysteem</h1>
            <p>Log in om door te gaan</p>
        </div>

        <?php if($errors->any()): ?>
            <div class="error"><?php echo e($errors->first()); ?></div>
        <?php endif; ?>

        <form method="POST" action="/login">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label>E-mailadres</label>
                <input type="email" name="email" value="<?php echo e(old('email')); ?>" required autofocus
                    placeholder="naam@school.nl">
            </div>
            <div class="form-group">
                <label>Wachtwoord</label>
                <input type="password" name="password" required placeholder="••••••••">
            </div>
            <button type="submit" class="btn">Inloggen</button>
        </form>

        <div class="footer-link">
            Nog geen account? <a href="<?php echo e(route('register')); ?>">Registreren</a>
        </div>

        <div class="test-accounts">
            <strong>Test accounts</strong>
            <span>admin@school.nl / SchoolAdmin2024!</span>
            <span>jan@school.nl / password</span>
            <span>piet@school.nl / password</span>
        </div>
    </div>
</body>

</html><?php /**PATH C:\Users\ahmet\Desktop\voorraadbeheersysteem\resources\views/auth/login.blade.php ENDPATH**/ ?>