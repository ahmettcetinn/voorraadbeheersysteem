<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserveringen - Voorraadbeheersysteem</title>
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
            align-items: center;
            gap: 10px;
        }

        header h1 {
            font-size: 22px;
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

        nav a:hover {
            text-decoration: underline;
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
            border: none;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .btn:hover {
            background-color: #1a252f;
        }

        .btn-danger {
            background-color: #e74c3c;
        }

        .btn-danger:hover {
            background-color: #c0392b;
        }

        .card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            overflow: hidden;
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

        tr:last-child td {
            border-bottom: none;
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

        .actions {
            display: flex;
            gap: 8px;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            padding: 12px 16px;
            border-radius: 6px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
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
    </header>

    <nav>
        <a href="/">Producten</a>
        <a href="/reserveringen">Reserveringen</a>
    </nav>

    <div class="container">

        @if(session('success'))
            <div class="alert-success">✅ {{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert-error">❌ {{ session('error') }}</div>
        @endif

        <div class="top-bar">
            <h2>Reserveringen overzicht</h2>
            <a href="/reservering/create" class="btn">+ Nieuwe reservering</a>
        </div>

        <div class="card">
            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Gebruiker</th>
                        <th>Aantal</th>
                        <th>Datum</th>
                        <th>Status</th>
                        <th>Acties</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reserveringen as $reservering)
                        <tr>
                            <td>{{ $reservering->product->Naam ?? '-' }}</td>
                            <td>{{ $reservering->gebruiker->Naam ?? '-' }}</td>
                            <td>{{ $reservering->Aantal }}</td>
                            <td>{{ $reservering->Datum }}</td>
                            <td><span class="badge badge-actief">{{ $reservering->Status }}</span></td>
                            <td>
                                <div class="actions">
                                    {{-- Docent mag alles annuleren --}}
                                    {{-- Student mag alleen eigen reserveringen annuleren --}}
                                    @if(Auth::user()->isDocent() || $reservering->GebruikerID === Auth::user()->GebruikerID)
                                        <form action="{{ route('reserveringen.destroy', $reservering->ReserveringID) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Weet je zeker dat je deze reservering wilt annuleren?')">
                                                Annuleren
                                            </button>
                                        </form>
                                    @else
                                        <span style="color: #999; font-size: 12px;">Niet jouw reservering</span>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

</body>

</html>