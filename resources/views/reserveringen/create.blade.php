<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nieuwe Reservering - Voorraadbeheersysteem</title>
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
            max-width: 600px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            padding: 30px;
        }

        .card h2 {
            font-size: 20px;
            color: #2c3e50;
            margin-bottom: 24px;
        }

        label {
            display: block;
            font-size: 14px;
            font-weight: bold;
            color: #555;
            margin-bottom: 6px;
            margin-top: 16px;
        }

        input,
        select {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 14px;
            background-color: #fafafa;
            transition: border-color 0.2s;
        }

        input:focus,
        select:focus {
            outline: none;
            border-color: #2c3e50;
            background-color: white;
        }

        .btn-group {
            display: flex;
            gap: 10px;
            margin-top: 24px;
        }

        .btn {
            padding: 10px 20px;
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

        .btn-secondary {
            background-color: #95a5a6;
        }

        .btn-secondary:hover {
            background-color: #7f8c8d;
        }

        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
            padding: 12px 16px;
            border-radius: 6px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .voorraad-info {
            font-size: 12px;
            color: #666;
            margin-top: 4px;
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
        <div class="card">
            <h2>➕ Nieuwe Reservering</h2>

            @if(session('error'))
                <div class="alert-error">❌ {{ session('error') }}</div>
            @endif

            <form action="/reservering" method="POST">
                @csrf

                <label>Product</label>
                <select name="ProductID" required>
                    <option value="">-- Kies een product --</option>
                    @foreach($producten as $product)
                        <option value="{{ $product->ProductID }}">
                            {{ $product->Naam }} (Beschikbaar: {{ $product->Aantal }})
                        </option>
                    @endforeach
                </select>

                <label>Gebruiker</label>
                <select name="GebruikerID" required>
                    <option value="">-- Kies een gebruiker --</option>
                    @foreach($gebruikers as $gebruiker)
                        <option value="{{ $gebruiker->GebruikerID }}">
                            {{ $gebruiker->Naam }} ({{ $gebruiker->Rol }})
                        </option>
                    @endforeach
                </select>

                <label>Aantal</label>
                <input type="number" name="Aantal" min="1" required>

                <label>Datum</label>
                <input type="date" name="Datum" required>

                <div class="btn-group">
                    <button type="submit" class="btn">Reserveren</button>
                    <a href="/reserveringen" class="btn btn-secondary">Annuleren</a>
                </div>

            </form>
        </div>
    </div>

</body>

</html>