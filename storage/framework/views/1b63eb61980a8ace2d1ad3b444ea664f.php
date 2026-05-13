<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documentatie - Voorraadbeheersysteem</title>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=DM+Mono:wght@400;500&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --navy: #0f1e2e;
            --navy-mid: #1a3248;
            --navy-light: #243d56;
            --accent: #3b82f6;
            --accent-light: #eff6ff;
            --success: #10b981;
            --success-light: #d1fae5;
            --warning: #f59e0b;
            --warning-light: #fef3c7;
            --danger: #ef4444;
            --danger-light: #fee2e2;
            --gray-50: #f8fafc;
            --gray-100: #f1f5f9;
            --gray-200: #e2e8f0;
            --gray-500: #64748b;
            --gray-700: #334155;
            --white: #ffffff;
            --text: #1e293b;
            --radius: 10px;
            --radius-sm: 6px;
            --shadow: 0 1px 3px rgba(0, 0, 0, 0.08), 0 4px 16px rgba(0, 0, 0, 0.06);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--gray-50);
            color: var(--text);
            line-height: 1.6;
        }

        /* Header */
        .header {
            background: var(--navy);
            padding: 0 32px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .header-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
        }

        .header-brand-icon {
            width: 32px;
            height: 32px;
            background: rgba(59, 130, 246, 0.2);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
        }

        .header-brand-name {
            font-size: 15px;
            font-weight: 700;
            color: var(--white);
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .nav {
            background: var(--navy-mid);
            padding: 0 32px;
            display: flex;
            gap: 2px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.06);
        }

        .nav a {
            color: rgba(255, 255, 255, 0.6);
            text-decoration: none;
            font-size: 13px;
            font-weight: 500;
            padding: 10px 14px;
            transition: color 0.2s;
        }

        .nav a:hover {
            color: var(--white);
        }

        .nav a.active {
            color: var(--white);
            border-bottom: 2px solid var(--accent);
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 40px 24px;
        }

        /* Hero */
        .hero {
            background: var(--navy);
            border-radius: var(--radius);
            padding: 40px 36px;
            margin-bottom: 28px;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: -60px;
            right: -60px;
            width: 200px;
            height: 200px;
            background: rgba(59, 130, 246, 0.15);
            border-radius: 50%;
        }

        .hero h1 {
            font-size: 28px;
            font-weight: 700;
            color: var(--white);
            letter-spacing: -0.4px;
            position: relative;
        }

        .hero p {
            color: rgba(255, 255, 255, 0.65);
            font-size: 15px;
            margin-top: 8px;
            position: relative;
            max-width: 560px;
        }

        .hero-tip {
            margin-top: 20px;
            padding: 14px 16px;
            background: rgba(59, 130, 246, 0.15);
            border: 1px solid rgba(59, 130, 246, 0.25);
            border-radius: 8px;
            font-size: 14px;
            color: rgba(255, 255, 255, 0.8);
            position: relative;
        }

        .card {
            background: var(--white);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            border: 1px solid var(--gray-200);
            margin-bottom: 20px;
        }

        .card-header {
            padding: 20px 24px;
            border-bottom: 1px solid var(--gray-100);
        }

        .card-header h2 {
            font-size: 17px;
            font-weight: 700;
        }

        .card-body {
            padding: 24px;
        }

        /* Role boxes */
        .role-box {
            border-radius: 10px;
            padding: 20px 22px;
            margin-bottom: 14px;
            border-left: 4px solid;
        }

        .role-admin {
            background: #fff5f5;
            border-color: var(--danger);
        }

        .role-docent {
            background: #fffbeb;
            border-color: var(--warning);
        }

        .role-student {
            background: #f0fdf4;
            border-color: var(--success);
        }

        .role-title {
            font-size: 15px;
            font-weight: 700;
            margin-bottom: 6px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .role-admin .role-title {
            color: #b91c1c;
        }

        .role-docent .role-title {
            color: #92400e;
        }

        .role-student .role-title {
            color: #065f46;
        }

        .role-desc {
            font-size: 13px;
            color: var(--gray-700);
            margin-bottom: 10px;
        }

        .role-list {
            list-style: none;
        }

        .role-list li {
            font-size: 13px;
            padding: 3px 0;
            color: var(--gray-700);
            display: flex;
            align-items: baseline;
            gap: 8px;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 2px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }

        .badge-admin {
            background: var(--danger-light);
            color: #991b1b;
        }

        .badge-docent {
            background: var(--warning-light);
            color: #92400e;
        }

        .badge-student {
            background: var(--success-light);
            color: #065f46;
        }

        /* Table */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            padding: 11px 16px;
            text-align: left;
            font-size: 11px;
            font-weight: 700;
            color: var(--gray-500);
            text-transform: uppercase;
            letter-spacing: 0.6px;
            background: var(--gray-50);
            border-bottom: 1px solid var(--gray-200);
        }

        td {
            padding: 12px 16px;
            font-size: 14px;
            border-bottom: 1px solid var(--gray-100);
            vertical-align: middle;
        }

        tr:last-child td {
            border-bottom: none;
        }

        tbody tr:hover td {
            background: var(--gray-50);
        }

        td:first-child {
            font-weight: 500;
        }

        td:not(:first-child) {
            text-align: center;
        }

        /* Accounts table */
        .account-row td {
            font-family: 'DM Mono', monospace;
            font-size: 13px;
        }

        .account-row td:first-child {
            font-family: 'DM Sans', sans-serif;
            font-weight: 600;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 9px 18px;
            border-radius: var(--radius-sm);
            font-family: 'DM Sans', sans-serif;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            border: none;
            transition: all 0.2s;
        }

        .btn-primary {
            background: var(--navy);
            color: var(--white);
        }

        .btn-primary:hover {
            background: var(--navy-mid);
        }

        .btn-secondary {
            background: var(--gray-100);
            color: var(--gray-700);
            border: 1px solid var(--gray-200);
        }

        .btn-secondary:hover {
            background: var(--gray-200);
        }

        .btn-accent {
            background: var(--accent);
            color: var(--white);
        }

        .btn-accent:hover {
            background: #2563eb;
        }

        .header-link {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            font-size: 13px;
            font-weight: 500;
            padding: 6px 14px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 6px;
            transition: all 0.2s;
        }

        .header-link:hover {
            color: var(--white);
            background: rgba(255, 255, 255, 0.08);
        }
    </style>
</head>

<body>

    <header class="header">
        <a href="/" class="header-brand">
            <div class="header-brand-icon">📦</div>
            <span class="header-brand-name">Voorraadbeheersysteem</span>
        </a>
        <div class="header-actions">
            <?php if(Auth::check()): ?>
                <span style="color:rgba(255,255,255,0.6);font-size:13px;"><?php echo e(Auth::user()->Naam); ?></span>
                <a href="/" class="header-link">← Naar site</a>
            <?php else: ?>
                <a href="/login" class="header-link">Inloggen</a>
            <?php endif; ?>
        </div>
    </header>

    <nav class="nav">
        <a href="/">← Producten</a>
        <a href="/documentatie" class="active">📖 Documentatie</a>
    </nav>

    <div class="container">

        <div class="hero">
            <h1>📖 Documentatie</h1>
            <p>Welkom bij het Voorraadbeheersysteem. Hier vind je een overzicht van alle functionaliteiten en rollen.
            </p>
            <div class="hero-tip">
                💡 <strong>Nieuw?</strong> Log in met een van de testaccounts onderaan deze pagina, of registreer als
                student via de loginpagina.
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h2>👥 Rollen & Rechten</h2>
            </div>
            <div class="card-body">
                <div class="role-box role-admin">
                    <div class="role-title">🔴 Admin <span class="badge badge-admin">Systeembeheer</span></div>
                    <div class="role-desc">De admin is de ontwikkelaar of systeembeheerder.</div>
                    <ul class="role-list">
                        <li>✅ Alles wat een docent kan doen</li>
                        <li>✅ Gebruikers beheren en rollen toewijzen</li>
                        <li>✅ Categorieën beheren</li>
                        <li>✅ Volledige systeemtoegang</li>
                    </ul>
                </div>
                <div class="role-box role-docent">
                    <div class="role-title">🟠 Docent <span class="badge badge-docent">Beheerder</span></div>
                    <div class="role-desc">Docenten beheren de voorraad en houden toezicht op reserveringen.</div>
                    <ul class="role-list">
                        <li>✅ Producten toevoegen, bewerken en verwijderen</li>
                        <li>✅ Alle reserveringen inzien en annuleren</li>
                        <li>✅ Gebruikersprofielen bekijken</li>
                        <li>✅ Reserveringen namens studenten aanmaken</li>
                        <li>❌ Geen eigen reserveringen als student</li>
                    </ul>
                </div>
                <div class="role-box role-student">
                    <div class="role-title">🟢 Student <span class="badge badge-student">Gebruiker</span></div>
                    <div class="role-desc">Studenten kunnen producten bekijken en reserveren voor hun projecten.</div>
                    <ul class="role-list">
                        <li>✅ Producten bekijken met status en details</li>
                        <li>✅ Producten reserveren (met doel/beschrijving)</li>
                        <li>✅ Eigen reserveringen beheren en annuleren</li>
                        <li>❌ Geen producten toevoegen/bewerken</li>
                        <li>❌ Reserveringen van anderen niet zien</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h2>📋 Functionaliteiten overzicht</h2>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Functionaliteit</th>
                        <th>Admin</th>
                        <th>Docent</th>
                        <th>Student</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Producten bekijken</td>
                        <td>✅</td>
                        <td>✅</td>
                        <td>✅</td>
                    </tr>
                    <tr>
                        <td>Product details</td>
                        <td>✅</td>
                        <td>✅</td>
                        <td>✅</td>
                    </tr>
                    <tr>
                        <td>Product toevoegen</td>
                        <td>✅</td>
                        <td>✅</td>
                        <td>❌</td>
                    </tr>
                    <tr>
                        <td>Product bewerken</td>
                        <td>✅</td>
                        <td>✅</td>
                        <td>❌</td>
                    </tr>
                    <tr>
                        <td>Product verwijderen</td>
                        <td>✅</td>
                        <td>✅</td>
                        <td>❌</td>
                    </tr>
                    <tr>
                        <td>Reservering maken</td>
                        <td>✅</td>
                        <td>✅</td>
                        <td>✅</td>
                    </tr>
                    <tr>
                        <td>Eigen reserveringen zien</td>
                        <td>✅</td>
                        <td>✅</td>
                        <td>✅</td>
                    </tr>
                    <tr>
                        <td>Alle reserveringen zien</td>
                        <td>✅</td>
                        <td>✅</td>
                        <td>❌</td>
                    </tr>
                    <tr>
                        <td>Eigen reservering annuleren</td>
                        <td>✅</td>
                        <td>✅</td>
                        <td>✅</td>
                    </tr>
                    <tr>
                        <td>Andere reserveringen annuleren</td>
                        <td>✅</td>
                        <td>✅</td>
                        <td>❌</td>
                    </tr>
                    <tr>
                        <td>Gebruikerprofielen bekijken</td>
                        <td>✅</td>
                        <td>✅</td>
                        <td>❌</td>
                    </tr>
                    <tr>
                        <td>Account registreren</td>
                        <td>—</td>
                        <td>—</td>
                        <td>✅</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="card">
            <div class="card-header">
                <h2>🔐 Test accounts</h2>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Rol</th>
                        <th style="text-align:left;">E-mail</th>
                        <th style="text-align:left;">Wachtwoord</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="account-row">
                        <td><span class="badge badge-admin">Admin</span></td>
                        <td style="text-align:left;">admin@school.nl</td>
                        <td style="text-align:left;">SchoolAdmin2024!</td>
                    </tr>
                    <tr class="account-row">
                        <td><span class="badge badge-docent">Docent</span></td>
                        <td style="text-align:left;">jan@school.nl</td>
                        <td style="text-align:left;">password</td>
                    </tr>
                    <tr class="account-row">
                        <td><span class="badge badge-student">Student</span></td>
                        <td style="text-align:left;">piet@school.nl</td>
                        <td style="text-align:left;">password</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div style="text-align:center;margin-top:8px;">
            <a href="/login" class="btn btn-accent">→ Naar inlogpagina</a>
            &nbsp;
            <a href="/" class="btn btn-secondary">← Naar producten</a>
        </div>

    </div>
</body>

</html><?php /**PATH C:\Users\ahmet\Desktop\voorraadbeheersysteem\resources\views/documentatie.blade.php ENDPATH**/ ?>