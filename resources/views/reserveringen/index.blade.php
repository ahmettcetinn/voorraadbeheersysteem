<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserveringen - Voorraadbeheersysteem</title>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=DM+Mono:wght@400;500&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --navy: #0f1e2e;
            --navy-mid: #1a3248;
            --navy-light: #243d56;
            --accent: #3b82f6;
            --success: #10b981;
            --success-light: #d1fae5;
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
        }

        .header {
            background: var(--navy);
            padding: 0 32px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 100;
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

        .header-right {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .header-user {
            display: flex;
            align-items: center;
            gap: 8px;
            color: rgba(255, 255, 255, 0.7);
            font-size: 13px;
        }

        .header-avatar {
            width: 30px;
            height: 30px;
            background: var(--navy-light);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 700;
            color: var(--white);
            border: 1.5px solid rgba(255, 255, 255, 0.15);
        }

        .role-pill {
            padding: 2px 8px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.4px;
        }

        .role-admin {
            background: rgba(239, 68, 68, 0.2);
            color: #fca5a5;
        }

        .role-docent {
            background: rgba(245, 158, 11, 0.2);
            color: #fcd34d;
        }

        .role-student {
            background: rgba(16, 185, 129, 0.2);
            color: #6ee7b7;
        }

        .btn-logout {
            padding: 6px 14px;
            background: rgba(239, 68, 68, 0.15);
            color: #fca5a5;
            border: 1px solid rgba(239, 68, 68, 0.25);
            border-radius: 6px;
            font-family: 'DM Sans', sans-serif;
            font-size: 13px;
            cursor: pointer;
            transition: background 0.2s;
        }

        .btn-logout:hover {
            background: rgba(239, 68, 68, 0.3);
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
            max-width: 1140px;
            margin: 0 auto;
            padding: 32px 24px;
        }

        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
        }

        .page-title {
            font-size: 22px;
            font-weight: 700;
            letter-spacing: -0.3px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 16px;
            border-radius: var(--radius-sm);
            font-family: 'DM Sans', sans-serif;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            border: none;
            transition: all 0.2s;
            white-space: nowrap;
        }

        .btn-primary {
            background: var(--navy);
            color: var(--white);
        }

        .btn-primary:hover {
            background: var(--navy-mid);
        }

        .btn-danger {
            background: var(--danger-light);
            color: #b91c1c;
            border: 1px solid #fecaca;
        }

        .btn-danger:hover {
            background: #fecaca;
        }

        .btn-sm {
            padding: 5px 12px;
            font-size: 12px;
        }

        .alert {
            padding: 13px 16px;
            border-radius: 8px;
            font-size: 14px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .alert-success {
            background: var(--success-light);
            color: #065f46;
            border-left: 3px solid var(--success);
        }

        .alert-error {
            background: var(--danger-light);
            color: #991b1b;
            border-left: 3px solid var(--danger);
        }

        .card {
            background: var(--white);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            border: 1px solid var(--gray-200);
            overflow: hidden;
        }

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
            padding: 13px 16px;
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

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .badge-success {
            background: var(--success-light);
            color: #065f46;
        }

        .user-link {
            color: var(--text);
            text-decoration: none;
            font-weight: 600;
        }

        .user-link:hover {
            color: var(--accent);
            text-decoration: underline;
        }

        .doel-text {
            color: var(--gray-700);
            font-size: 13px;
            max-width: 200px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .muted {
            color: var(--gray-500);
            font-size: 13px;
        }
    </style>
</head>

<body>

    <header class="header">
        <a href="/" class="header-brand">
            <div class="header-brand-icon">📦</div>
            <span class="header-brand-name">Voorraadbeheersysteem</span>
        </a>
        <div class="header-right">
            <div class="header-user">
                <div class="header-avatar">{{ substr(Auth::user()->Naam, 0, 1) }}</div>
                <span>{{ Auth::user()->Naam }}</span>
                @if(Auth::user()->Rol === 'admin')
                    <span class="role-pill role-admin">Admin</span>
                @elseif(Auth::user()->Rol === 'docent')
                    <span class="role-pill role-docent">Docent</span>
                @else
                    <span class="role-pill role-student">Student</span>
                @endif
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn-logout">Uitloggen</button>
            </form>
        </div>
    </header>

    <nav class="nav">
        <a href="/">📦 Producten</a>
        <a href="/reserveringen" class="active">📋 Reserveringen</a>
        <a href="/mijn-account">👤 Mijn Account</a>
        <a href="/documentatie">📖 Documentatie</a>
    </nav>

    <div class="container">

        @if(session('success'))
            <div class="alert alert-success">✅ {{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-error">❌ {{ session('error') }}</div>
        @endif

        <div class="page-header">
            <div>
                <div class="page-title">Reserveringen</div>
                <div style="font-size:13px;color:var(--gray-500);margin-top:2px;">Alle actieve reserveringen</div>
            </div>
            <a href="/reservering/create" class="btn btn-primary">+ Nieuwe reservering</a>
        </div>

        <div class="card">
            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Gebruiker</th>
                        <th>Aantal</th>
                        <th>Datum</th>
                        <th>Doel</th>
                        <th>Status</th>
                        <th>Actie</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reserveringen as $reservering)
                        <tr>
                            <td>
                                <a href="/product/{{ $reservering->product->ProductID ?? '' }}/detail"
                                    style="color:var(--text);font-weight:600;text-decoration:none;">
                                    {{ $reservering->product->Naam ?? '-' }}
                                </a>
                            </td>
                            <td>
                                <a href="/gebruiker/{{ $reservering->gebruiker->GebruikerID ?? '' }}" class="user-link">
                                    {{ $reservering->gebruiker->Naam ?? '-' }}
                                </a>
                            </td>
                            <td style="font-family:'DM Mono',monospace;">{{ $reservering->Aantal }}x</td>
                            <td class="muted">{{ $reservering->Datum }}</td>
                            <td><span class="doel-text"
                                    title="{{ $reservering->Doel }}">{{ $reservering->Doel ?? '—' }}</span></td>
                            <td><span class="badge badge-success">● {{ $reservering->Status }}</span></td>
                            <td>
                                @if(Auth::user()->isDocent() || $reservering->GebruikerID === Auth::user()->GebruikerID)
                                    <form action="{{ route('reserveringen.destroy', $reservering->ReserveringID) }}"
                                        method="POST">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Reservering annuleren?')">Annuleren</button>
                                    </form>
                                @else
                                    <span class="muted">—</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>