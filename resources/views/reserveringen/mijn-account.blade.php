<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mijn Account - Voorraadbeheersysteem</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            color: #333;
        }

        header {
            background-color: #2c3e50;
            color: white;
            padding: 16px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav {
            background-color: #34495e;
            padding: 10px 30px;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin-right: 20px;
            font-size: 14px;
        }

        .container {
            max-width: 1100px;
            margin: 30px auto;
            padding: 0 20px;
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .top-bar h2 {
            font-size: 20px;
            color: #2c3e50;
        }

        .btn {
            padding: 9px 16px;
            background-color: #2c3e50;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-size: 14px;
        }

        .btn:hover {
            background-color: #1a252f;
        }

        .card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            padding: 30px;
            margin-bottom: 20px;
        }

        .user-info {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-bottom: 24px;
        }

        .info-item {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
        }

        .info-item label {
            font-size: 12px;
            color: #666;
            text-transform: uppercase;
            display: block;
        }

        .info-item p {
            font-size: 16px;
            font-weight: bold;
            color: #2c3e50;
            margin-top: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background-color: #2c3e50;
            color: white;
            padding: 12px 16px;
            text-align: left;
            font-size: 14px;
        }

        td {
            padding: 12px 16px;
            border-bottom: 1px solid #f0f0f0;
            font-size: 14px;
        }

        tr:hover td {
            background-color: #f9f9f9;
        }

        .badge {
            background-color: #eaf0fb;
            color: #2c3e50;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .badge-actief {
            background-color: #d4edda;
            color: #155724;
        }

        .btn-danger {
            background-color: #e74c3c;
        }

        .btn-danger:hover {
            background-color: #c0392b;
        }

        .geen-reserveringen {
            color: #666;
            font-style: italic;
            padding: 20px;
            text-align: center;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            padding: 12px 16px;
            border-radius: 6px;
            margin-bottom: 20px;
            font-size: 14px;
        }
    </style>
</head>

<body>

    <header>
        <h1>📦 Voorraadbeheersysteem</h1>
        <div style="color: white; font-size: 14px; display: flex; align-items: center; gap: 15px;">
            👤 {{ Auth::user()->Naam }} ({{ Auth::user()->Rol }})
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit"
                    style="background-color: #e74c3c; color: white; border: none; padding: 8px 16px; border-radius: 6px; cursor: pointer; font-size: 14px;">Uitloggen</button>
            </form>
        </div>
    </header>

    <nav>
        <a href="/">Producten</a>
        <a href="/reserveringen">Alle Reserveringen</a>
        <a href="/mijn-account">Mijn Account</a>
    </nav>

    <div class="container">

        @if(session('success'))
            <div class="alert-success">✅ {{ session('success') }}</div>
        @endif

        <div class="card">
            <h2 style="font-size: 20px; color: #2c3e50; margin-bottom: 20px;">👤 Mijn Account</h2>

            <div class="user-info">
                <div class="info-item">
                    <label>Naam</label>
                    <p>{{ Auth::user()->Naam }}</p>
                </div>
                <div class="info-item">
                    <label>Email</label>
                    <p>{{ Auth::user()->email }}</p>
                </div>
                <div class="info-item">
                    <label>Rol</label>
                    <p>{{ Auth::user()->Rol }}</p>
                </div>
                <div class="info-item">
                    <label>Aantal reserveringen</label>
                    <p>{{ $reserveringen->count() }}</p>
                </div>
            </div>
        </div>

        <div class="top-bar">
            <h2>📋 Mijn Reserveringen</h2>
            <a href="/reservering/create" class="btn">+ Nieuwe reservering</a>
        </div>

        <div class="card">
            @if($reserveringen->count() > 0)
                <table>
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Aantal</th>
                            <th>Datum</th>
                            <th>Status</th>
                            <th>Acties</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reserveringen as $reservering)
                            <tr>
                                <td>
                                    <a href="/product/{{ $reservering->product->ProductID }}/detail"
                                        style="color: #2c3e50; text-decoration: none; font-weight: bold;">
                                        {{ $reservering->product->Naam ?? '-' }}
                                    </a>
                                </td>
                                <td>{{ $reservering->Aantal }}</td>
                                <td>{{ $reservering->Datum }}</td>
                                <td><span class="badge badge-actief">{{ $reservering->Status }}</span></td>
                                <td>
                                    <form action="{{ route('reserveringen.destroy', $reservering->ReserveringID) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Weet je zeker dat je deze reservering wilt annuleren?')">Annuleren</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="geen-reserveringen">Je hebt nog geen reserveringen gemaakt.</p>
            @endif
        </div>

    </div>

</body>

</html>