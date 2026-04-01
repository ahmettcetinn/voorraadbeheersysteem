<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Toevoegen</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }

        h1 {
            color: #333;
        }

        form {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            max-width: 500px;
        }

        label {
            display: block;
            margin-top: 10px;
            color: #333;
        }

        input,
        select {
            width: 100%;
            padding: 8px;
            margin-top: 4px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .btn {
            margin-top: 15px;
            padding: 8px 12px;
            background-color: #333;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            border: none;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <h1>➕ Product Toevoegen</h1>

    <form action="/product" method="POST">
        @csrf

        <label>Naam</label>
        <input type="text" name="Naam" required>

        <label>Type</label>
        <input type="text" name="Type" required>

        <label>Aantal</label>
        <input type="number" name="Aantal" required>

        <label>Locatie</label>
        <input type="text" name="Locatie" required>

        <label>Categorie</label>
        <select name="CategorieID">
            <option value="">-- Kies een categorie --</option>
            @foreach($categorieen as $categorie)
                <option value="{{ $categorie->CategorieID }}">{{ $categorie->Naam }}</option>
            @endforeach
        </select>

        <br>
        <button type="submit" class="btn">Opslaan</button>
        <a href="/" class="btn">Annuleren</a>
    </form>

</body>

</html>