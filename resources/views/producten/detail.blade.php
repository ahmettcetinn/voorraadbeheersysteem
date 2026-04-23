<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->Naam }} - Detail</title>
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
            max-width: 800px;
            margin: 30px auto;
            padding: 0 20px;
        }

        .card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            padding: 30px;
        }

        .product-header {
            display: flex;
            gap: 20px;
            margin-bottom: 24px;
            flex-wrap: wrap;
        }

        .product-image {
            width: 200px;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
            background-color: #e9ecef;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 60px;
            flex-shrink: 0;
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 10px;
        }

        .product-info {
            flex: 1;
            min-width: 250px;
        }

        .product-info h2 {
            font-size: 24px;
            color: #2c3e50;
            margin-bottom: 10px;
        }

        .badge {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
            display: inline-block;
            margin-bottom: 10px;
        }

        .badge-beschikbaar {
            background-color: #d4edda;
            color: #155724;
        }

        .badge-gereserveerd {
            background-color: #f8d7da;
            color: #721c24;
        }

        .badge-gedeeltelijk {
            background-color: #fff3cd;
            color: #856404;
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

        .btn {
            padding: 10px 20px;
            background-color: #2c3e50;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-size: 14px;
            border: none;
            cursor: pointer;
            display: inline-block;
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

        .btn-success {
            background-color: #27ae60;
        }

        .btn-success:hover {
            background-color: #219a52;
        }

        .reserveringen-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        .reserveringen-table th {
            background-color: #34495e;
            color: white;
            padding: 10px;
            text-align: left;
            font-size: 13px;
        }

        .reserveringen-table td {
            padding: 10px;
            border-bottom: 1px solid #eee;
            font-size: 13px;
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

        @media (max-width: 600px) {
            .product-header {
                flex-direction: column;
                align-items: center;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }
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
                    style="background-color: #e74c3c; color: white; border: none; padding: 8px 16px; border-radius: 6px; cursor: pointer; font-size: 14px;">
                    Uitloggen
                </button>
            </form>
        </div>
    </header>

    <nav>
        <a href="/">← Terug naar producten</a>
        <a href="/reserveringen">Reserveringen</a>
    </nav>

    <div class="container">

        @if(session('success'))
            <div class="alert-success">✅ {{ session('success') }}</div>
        @endif

        <div class="card">
            <div class="product-header">
                <div class="product-image">
                    @if($product->Afbeelding)
                        <img src="{{ asset($product->Afbeelding) }}" alt="{{ $product->Naam }}">
                    @else
                        📦
                    @endif
                </div>
                <div class="product-info">
                    <h2>{{ $product->Naam }}</h2>

                    @if($product->gereserveerdAantal > 0 && $product->gereserveerdAantal < $product->Aantal)
                        <span class="badge badge-gedeeltelijk">
                            🟡 Gedeeltelijk gereserveerd ({{ $product->gereserveerdAantal }}/{{ $product->Aantal }})
                        </span>
                    @elseif($product->isGereserveerd && $product->gereserveerdAantal >= $product->Aantal)
                        <span class="badge badge-gereserveerd">
                            🔴 Volledig gereserveerd ({{ $product->gereserveerdAantal }})
                        </span>
                    @else
                        <span class="badge badge-beschikbaar">
                            🟢 Volledig beschikbaar ({{ $product->Aantal }} stuks)
                        </span>
                    @endif

                    <div class="info-grid">
                        <div class="info-item">
                            <label>Type</label>
                            <p>{{ $product->Type }}</p>
                        </div>
                        <div class="info-item">
                            <label>Categorie</label>
                            <p>{{ $product->categorie->Naam ?? '-' }}</p>
                        </div>
                        <div class="info-item">
                            <label>Locatie</label>
                            <p>{{ $product->Locatie }}</p>
                        </div>
                        <div class="info-item">
                            <label>Voorraad</label>
                            <p>{{ $product->Aantal }} stuks</p>
                        </div>
                    </div>
                </div>
            </div>

            @if($product->Beschrijving)
                <div style="margin-top: 20px; padding: 15px; background-color: #f8f9fa; border-radius: 8px;">
                    <label
                        style="font-size: 12px; color: #666; text-transform: uppercase; display: block;">Beschrijving</label>
                    <p style="margin-top: 8px; line-height: 1.6;">{{ $product->Beschrijving }}</p>
                </div>
            @endif

            <div style="margin-top: 30px;">
                <h3 style="font-size: 18px; color: #2c3e50; margin-bottom: 15px;">📋 Reserveringsgeschiedenis</h3>

                @if($reserveringen->count() > 0)
                    <table class="reserveringen-table">
                        <thead>
                            <tr>
                                <th>Gebruiker</th>
                                <th>Aantal</th>
                                <th>Datum</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reserveringen as $res)
                                <tr>
                                    <td>{{ $res->gebruiker->Naam ?? '-' }}</td>
                                    <td>{{ $res->Aantal }}</td>
                                    <td>{{ $res->Datum }}</td>
                                    <td>
                                        @if($res->Status == 'actief')
                                            <span style="color: #27ae60; font-weight: bold;">● Actief</span>
                                        @else
                                            <span style="color: #e74c3c;">{{ $res->Status }}</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="geen-reserveringen">Nog geen reserveringen voor dit product</p>
                @endif
            </div>

            <div
                style="margin-top: 30px; text-align: center; display: flex; gap: 10px; justify-content: center; flex-wrap: wrap;">
                <a href="/" class="btn">← Terug naar overzicht</a>

                @if(Auth::user()->isDocent())
                    <a href="/product/{{ $product->ProductID }}/edit" class="btn">✏️ Bewerken</a>
                @else
                    <a href="/reservering/create" class="btn btn-success">+ Reserveren</a>
                @endif
            </div>
        </div>
    </div>

</body>

</html>