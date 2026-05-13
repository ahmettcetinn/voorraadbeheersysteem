<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nieuwe Reservering - Voorraadbeheersysteem</title>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --navy: #0f1e2e;
            --navy-mid: #1a3248;
            --navy-light: #243d56;
            --accent: #3b82f6;
            --accent-hover: #2563eb;
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

        .container {
            max-width: 620px;
            margin: 0 auto;
            padding: 32px 24px;
        }

        .page-header {
            margin-bottom: 24px;
        }

        .page-title {
            font-size: 22px;
            font-weight: 700;
            letter-spacing: -0.3px;
        }

        .page-subtitle {
            font-size: 13px;
            color: var(--gray-500);
            margin-top: 3px;
        }

        .card {
            background: var(--white);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            border: 1px solid var(--gray-200);
            padding: 28px;
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
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 10px 13px;
            border: 1.5px solid var(--gray-200);
            border-radius: 8px;
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            color: var(--text);
            background: var(--gray-50);
            transition: all 0.2s;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: var(--accent);
            background: var(--white);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.10);
        }

        input:disabled {
            background: var(--gray-100);
            color: var(--gray-500);
            cursor: not-allowed;
        }

        textarea {
            resize: vertical;
            min-height: 90px;
        }

        .divider {
            border: none;
            border-top: 1px solid var(--gray-100);
            margin: 24px 0;
        }

        .btn-group {
            display: flex;
            gap: 10px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 10px 20px;
            border-radius: var(--radius-sm);
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
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

        .section-label {
            font-size: 11px;
            font-weight: 700;
            color: var(--gray-500);
            text-transform: uppercase;
            letter-spacing: 0.6px;
            margin-bottom: 14px;
            padding-bottom: 8px;
            border-bottom: 1px solid var(--gray-100);
        }

        .alert-error {
            background: var(--danger-light);
            color: #991b1b;
            padding: 13px 16px;
            border-radius: 8px;
            font-size: 14px;
            margin-bottom: 20px;
            border-left: 3px solid var(--danger);
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
            margin-bottom: 18px;
        }
    </style>
</head>

<body>

    <header class="header">
        <a href="/" class="header-brand">
            <div class="header-brand-icon">📦</div>
            <span class="header-brand-name">Voorraadbeheersysteem</span>
        </a>
    </header>
    <nav class="nav">
        <a href="/">← Producten</a>
        <a href="/reserveringen">📋 Reserveringen</a>
    </nav>

    <div class="container">
        <div class="page-header">
            <div class="page-title">➕ Nieuwe reservering</div>
            <div class="page-subtitle">Reserveer een product uit de schoolvoorraad</div>
        </div>

        <div class="card">

            @if(session('error'))
                <div class="alert-error">❌ {{ session('error') }}</div>
            @endif

            <form action="/reservering" method="POST">
                @csrf

                <div class="section-label">Productinformatie</div>

                <div class="form-group">
                    <label>Product</label>
                    <select name="ProductID" required>
                        <option value="">— Kies een product —</option>
                        @foreach($producten as $product)
                            <option value="{{ $product->ProductID }}">
                                {{ $product->Naam }} — {{ $product->Aantal }} beschikbaar
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-row">
                    <div class="form-group" style="margin-bottom:0;">
                        <label>Aantal</label>
                        <input type="number" name="Aantal" min="1" required placeholder="1">
                    </div>
                    <div class="form-group" style="margin-bottom:0;">
                        <label>Datum</label>
                        <input type="date" name="Datum" required>
                    </div>
                </div>

                <div class="divider"></div>
                <div class="section-label">Reserveringsdetails</div>

                @if(Auth::user()->isDocent())
                    <div class="form-group">
                        <label>Reserveren voor gebruiker</label>
                        <select name="GebruikerID" required>
                            <option value="">— Kies een gebruiker —</option>
                            @foreach($gebruikers as $gebruiker)
                                <option value="{{ $gebruiker->GebruikerID }}">
                                    {{ $gebruiker->Naam }} ({{ $gebruiker->Rol }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                @else
                    <div class="form-group">
                        <label>Reserveren voor</label>
                        <input type="text" value="{{ Auth::user()->Naam }} ({{ Auth::user()->Rol }})" disabled>
                        <input type="hidden" name="GebruikerID" value="{{ Auth::user()->GebruikerID }}">
                    </div>
                @endif

                <div class="form-group">
                    <label>Doel / Waarvoor heb je dit nodig?</label>
                    <textarea name="Doel"
                        placeholder="bv. PWS project — weerstation bouwen, les robotica, eindopdracht IoT..."></textarea>
                </div>

                <div class="btn-group">
                    <button type="submit" class="btn btn-primary">✅ Reserveren</button>
                    <a href="/reserveringen" class="btn btn-secondary">Annuleren</a>
                </div>
            </form>
        </div>
    </div>

</body>

</html>