<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $gebruiker->Naam }} - Profiel</title>
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
            max-width: 800px;
            margin: 30px auto;
            padding: 0 20px;
        }

        .card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            padding: 30px;
            margin-bottom: 20px;
        }

        .profiel-header {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 24px;
        }

        .avatar {
            width: 80px;
            height: 80px;
            background-color: #2c3e50;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            font-weight: bold;
        }

        .profiel-info h2 {
            font-size: 24px;
            color: #2c3e50;
            margin-bottom: 5px;
        }

        .profiel-info p {
            color: #666;
            font-size: 14px;
        }

        .badge {
            background-color: #eaf0fb;
            color: #2c3e50;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .badge-docent {
            background-color: #d4edda;
            color: #155724;
        }

        .badge-student {
            background-color: #e3f2fd;
            color: #0d47a1;
        }

        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-top: 20px;
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
            margin-top: 15px;
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

        .btn {
            padding: 10px 20px;
            background-color: #2c3e50;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-size: 14px;
            display: inline-block;
        }

        .btn:hover {
            background-color: #1a252f;
        }

        .geen-reserveringen {
            color: #666;
            font-style: italic;
            padding: 20px;
            text-align: center;
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
        <a href="/">← Terug naar producten</a>
        <a href="/reserveringen">Reserveringen</a>
        <a href="/mijn-account">Mijn Account</a>
    </nav>

    <div class="container">

        <div class="card">
            <div class="profiel-header">
                <div class="avatar">{{ substr($gebruiker->Naam, 0, 1) }}</div>
                <div class="profiel-info">
                    <h2>{{ $gebruiker->Naam }}</h2>
                    <p>{{ $gebruiker->email }}</p>
                    @if($gebruiker->Rol == 'docent')
                        <span class="badge badge-docent">👨‍🏫 Docent</span>
                    @else
                        <span class="badge badge-student">🎓 Student</span>
                    @endif
                </div>
            </div>

            <div class="info-grid">
                <div class="info-item">
                    <label>Rol</label>
                    <p>{{ $gebruiker->Rol }}</p>
                </div>
                <div class="info-item">
                    <label>Aantal reserveringen</label>
                    <p>{{ $reserveringen->count() }}</p>
                </div>
            </div>
        </div>

        <div class="card">
            <h3 style="font-size: 18px; color: #2c3e50; margin-bottom: 15px;">📋 Reserveringen van
                {{ $gebruiker->Naam }}
            </h3>

            @if($reserveringen->count() > 0)
                <table>
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Aantal</th>
                            <th>Datum</th>
                            <th>Status</th>
                            <th>Doel</th>
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
                                <td>{{ $reservering->Status }}</td>
                                <td>{{ $reservering->Doel ?? '-' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="geen-reserveringen">{{ $gebruiker->Naam }} heeft nog geen reserveringen.</p>
            @endif
        </div>

        <div style="text-align: center; margin-top: 20px;">
            <a href="/" class="btn">← Terug naar overzicht</a>
        </div>

    </div>

</body>

</html>