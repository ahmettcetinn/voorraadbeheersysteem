<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Toevoegen</title>
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
    </style>
</head>

<body>

    <header>
        <h1>📦 Voorraadbeheersysteem</h1>
    </header>

    <div class="container">
        <div class="card">
            <h2>➕ Product Toevoegen</h2>

            <form action="/product" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>

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
                    <?php $__currentLoopData = $categorieen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($categorie->CategorieID); ?>"><?php echo e($categorie->Naam); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>

                <label>Afbeelding</label>
                <input type="file" name="Afbeelding" accept="image/*"
                    style="padding: 8px; border: 1px solid #ddd; border-radius: 6px;">

                <label>Beschrijving</label>
                <textarea name="Beschrijving" rows="3" placeholder="Beschrijving van het product..."
                    style="width: 100%; padding: 10px 12px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px; background-color: #fafafa;"></textarea>

                <div class="btn-group">
                    <button type="submit" class="btn">Opslaan</button>
                    <a href="/" class="btn btn-secondary">Annuleren</a>
                </div>

            </form>
        </div>
    </div>

</body>

</html><?php /**PATH C:\Users\ahmet\Desktop\voorraadbeheersysteem\resources\views/producten/create.blade.php ENDPATH**/ ?>