<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voorraadbeheersysteem</title>
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
    </style>
</head>

<body>

    <header style="display: flex; justify-content: space-between; align-items: center;">
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

    <nav style="background-color: #34495e; padding: 10px 30px;">
        <a href="/" style="color: white; text-decoration: none; margin-right: 20px; font-size: 14px;">Producten</a>
        <a href="/reserveringen"
            style="color: white; text-decoration: none; margin-right: 20px; font-size: 14px;">Reserveringen</a>
    </nav>

    <div class="container">

        @if(session('success'))
            <div class="alert-success">✅ {{ session('success') }}</div>
        @endif

        <div class="top-bar">
            <h2>Producten overzicht</h2>
            @if(Auth::user()->isDocent())
                <a href="/product/create" class="btn">+ Product toevoegen</a>
            @endif
        </div>

        <!-- ZOEK EN FILTER FORMULIER -->
        <form method="GET" action="/" style="margin-bottom: 20px; display: flex; gap: 10px; flex-wrap: wrap;">
            <input type="text" name="zoeken" placeholder="Zoek op naam, type of locatie..."
                value="{{ request('zoeken') }}"
                style="flex: 2; min-width: 200px; padding: 10px 12px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px;">

            <select name="categorie"
                style="flex: 1; min-width: 150px; padding: 10px 12px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px; background-color: white;">
                <option value="">-- Alle categorieën --</option>
                @foreach($categorieen as $categorie)
                    <option value="{{ $categorie->CategorieID }}" {{ request('categorie') == $categorie->CategorieID ? 'selected' : '' }}>
                        {{ $categorie->Naam }}
                    </option>
                @endforeach
            </select>

            <button type="submit" class="btn">Zoeken</button>

            @if(request('zoeken') || request('categorie'))
                <a href="/" class="btn btn-secondary">Reset</a>
            @endif
        </form>

        <div class="card">
            <table>
                <thead>
                    <tr>
                        <th>Naam</th>
                        <th>Type</th>
                        <th>Aantal</th>
                        <th>Locatie</th>
                        <th>Categorie</th>
                        <th>Acties</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($producten as $product)
                        <tr>
                            <td>{{ $product->Naam }}</td>
                            <td>{{ $product->Type }}</td>
                            <td>{{ $product->Aantal }}</td>
                            <td>{{ $product->Locatie }}</td>
                            <td><span class="badge">{{ $product->categorie->Naam ?? '-' }}</span></td>
                            <td>
                                <div class="actions">
                                    @if(Auth::user()->isDocent())
                                        <a href="/product/{{ $product->ProductID }}/edit" class="btn">Bewerken</a>
                                        <form action="{{ route('producten.destroy', $product->ProductID) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Weet je zeker dat je dit product wilt verwijderen?')">
                                                Verwijderen
                                            </button>
                                        </form>
                                    @else
                                        <span style="color: #999; font-size: 12px;">Alleen bekijken</span>
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