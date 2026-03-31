<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voorraadbeheersysteem</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }

        h1 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #333;
            color: white;
        }

        tr:hover {
            background-color: #f0f0f0;
        }

        .btn {
            padding: 8px 12px;
            background-color: #333;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
    </style>
</head>

<body>
    <h1>📦 Voorraadbeheersysteem</h1>
    <a href="#" class="btn">+ Product toevoegen</a>
    <br><br>
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
                    <td>{{ $product->categorie->Naam ?? '-' }}</td>
                    <td>
                        <a href="#" class="btn">Bewerken</a>
                        <a href="#" class="btn">Verwijderen</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>