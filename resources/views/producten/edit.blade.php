<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Bewerken</title>
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
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        input,
        select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .btn {
            margin-top: 15px;
            padding: 10px 15px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <h1>✏️ Product Bewerken</h1>
    <form method="POST" action="/product/{{ $product->ProductID }}">
        @csrf
        @method('PUT')

        <label>Naam</label>
        <input type="text" name="Naam" value="{{ $product->Naam }}">

        <label>Type</label>
        <input type="text" name="Type" value="{{ $product->Type }}">

        <label>Aantal</label>
        <input type="number" name="Aantal" value="{{ $product->Aantal }}">

        <label>Locatie</label>
        <input type="text" name="Locatie" value="{{ $product->Locatie }}">

        <label>Categorie</label>
        <select name="CategorieID">
            @foreach($categorieen as $categorie)
                <option value="{{ $categorie->CategorieID }}" {{ $product->CategorieID == $categorie->CategorieID ? 'selected' : '' }}>
                    {{ $categorie->Naam }}
                </option>
            @endforeach
        </select>

        <button type="submit"
            style="margin-top:15px; padding:10px 15px; background-color:green; color:white; border:none; border-radius:4px; cursor:pointer;">Opslaan</button>
        <a href="/"
            style="display:inline-block; margin-top:15px; padding:10px 15px; background-color:#333; color:white; border-radius:4px; text-decoration:none;">Terug</a>
    </form>
</body>

</html>