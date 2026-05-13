<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mijn Account - Voorraadbeheersysteem</title>
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
            max-width: 900px;
            margin: 0 auto;
            padding: 32px 24px;
        }

        .card {
            background: var(--white);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            border: 1px solid var(--gray-200);
            margin-bottom: 20px;
        }

        .card-body {
            padding: 24px 28px;
        }

        /* Profile header */
        .profile-hero {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .profile-avatar {
            width: 72px;
            height: 72px;
            background: var(--navy);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            font-weight: 700;
            color: var(--white);
            flex-shrink: 0;
        }

        .profile-name {
            font-size: 22px;
            font-weight: 700;
            letter-spacing: -0.3px;
        }

        .profile-email {
            color: var(--gray-500);
            font-size: 14px;
            margin-top: 2px;
        }

        .profile-badges {
            display: flex;
            gap: 8px;
            margin-top: 8px;
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

        .badge-student {
            background: #eff6ff;
            color: #1d4ed8;
        }

        .badge-docent {
            background: #fef3c7;
            color: #92400e;
        }

        .badge-admin {
            background: #fee2e2;
            color: #991b1b;
        }

        /* Stats row */
        .stats-row {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
            margin-top: 20px;
        }

        .stat-item {
            background: var(--gray-50);
            border: 1px solid var(--gray-100);
            padding: 14px 16px;
            border-radius: 8px;
            text-align: center;
        }

        .stat-value {
            font-size: 24px;
            font-weight: 700;
            color: var(--text);
            font-family: 'DM Mono', monospace;
        }

        .stat-label {
            font-size: 12px;
            color: var(--gray-500);
            margin-top: 2px;
        }

        /* Table */
        .section-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 18px 24px;
            border-bottom: 1px solid var(--gray-100);
        }

        .section-title {
            font-size: 15px;
            font-weight: 700;
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

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 14px;
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

        .btn-danger {
            background: var(--danger-light);
            color: #b91c1c;
            border: 1px solid #fecaca;
        }

        .btn-danger:hover {
            background: #fecaca;
        }

        .badge-success {
            background: var(--success-light);
            color: #065f46;
        }

        .product-link {
            color: var(--text);
            font-weight: 600;
            text-decoration: none;
        }

        .product-link:hover {
            color: var(--accent);
        }

        .alert {
            padding: 13px 16px;
            border-radius: 8px;
            font-size: 14px;
            margin-bottom: 20px;
            border-left: 3px solid var(--success);
            background: var(--success-light);
            color: #065f46;
        }

        .empty {
            padding: 40px;
            text-align: center;
            color: var(--gray-500);
            font-size: 14px;
        }

        .empty-icon {
            font-size: 36px;
            margin-bottom: 8px;
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
        @if(Auth::user()->isDocent())
            <a href="/reserveringen">📋 Reserveringen</a>
        @endif
        <a href="/mijn-account" class="active">👤 Mijn Account</a>
        <a href="/documentatie">📖 Documentatie</a>
    </nav>

    <div class="container">

        @if(session('success'))
            <div class="alert">✅ {{ session('success') }}</div>
        @endif

        <div class="card card-body">
            <div class="profile-hero">
                <div class="profile-avatar">{{ substr(Auth::user()->Naam, 0, 1) }}</div>
                <div>
                    <div class="profile-name">{{ Auth::user()->Naam }}</div>
                    <div class="profile-email">{{ Auth::user()->email }}</div>
                    <div class="profile-badges">
                        @if(Auth::user()->Rol === 'admin')
                            <span class="badge badge-admin">🔴 Admin</span>
                        @elseif(Auth::user()->Rol === 'docent')
                            <span class="badge badge-docent">🟠 Docent</span>
                        @else
                            <span class="badge badge-student">🎓 Student</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="stats-row">
                <div class="stat-item">
                    <div class="stat-value">{{ $reserveringen->count() }}</div>
                    <div class="stat-label">Totaal reserveringen</div>
                </div>
                <div class="stat-item">
                    <div class="stat-value">{{ $reserveringen->where('Status', 'actief')->count() }}</div>
                    <div class="stat-label">Actief</div>
                </div>
                <div class="stat-item">
                    <div class="stat-value">{{ $reserveringen->sum('Aantal') }}</div>
                    <div class="stat-label">Stuks gereserveerd</div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="section-header">
                <div class="section-title">📋 Mijn reserveringen</div>
                <a href="/reservering/create" class="btn btn-primary">+ Nieuwe reservering</a>
            </div>

            @if($reserveringen->count() > 0)
                <table>
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Aantal</th>
                            <th>Datum</th>
                            <th>Status</th>
                            <th>Actie</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reserveringen as $reservering)
                            <tr>
                                <td>
                                    <a href="/product/{{ $reservering->product->ProductID ?? '' }}/detail" class="product-link">
                                        {{ $reservering->product->Naam ?? '-' }}
                                    </a>
                                </td>
                                <td style="font-family:'DM Mono',monospace;">{{ $reservering->Aantal }}x</td>
                                <td style="color:var(--gray-500);">{{ $reservering->Datum }}</td>
                                <td><span class="badge badge-success">● {{ $reservering->Status }}</span></td>
                                <td>
                                    <form action="{{ route('reserveringen.destroy', $reservering->ReserveringID) }}"
                                        method="POST">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Reservering annuleren?')">Annuleren</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="empty">
                    <div class="empty-icon">📋</div>
                    Je hebt nog geen reserveringen gemaakt.
                </div>
            @endif
        </div>

    </div>
</body>

</html>