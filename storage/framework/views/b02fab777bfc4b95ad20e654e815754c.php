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
            👤 <?php echo e(Auth::user()->Naam); ?> (<?php echo e(Auth::user()->Rol); ?>)
            <form method="POST" action="<?php echo e(route('logout')); ?>" style="display: inline;">
                <?php echo csrf_field(); ?>
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

        <?php if(session('success')): ?>
            <div class="alert-success">✅ <?php echo e(session('success')); ?></div>
        <?php endif; ?>

        <div class="top-bar">
            <h2>Producten overzicht</h2>
            <?php if(Auth::user()->isDocent()): ?>
                <a href="/product/create" class="btn">+ Product toevoegen</a>
            <?php endif; ?>
        </div>

        <!-- ZOEK EN FILTER FORMULIER -->
        <form method="GET" action="/" style="margin-bottom: 20px; display: flex; gap: 10px; flex-wrap: wrap;">
            <input type="text" name="zoeken" placeholder="Zoek op naam, type of locatie..."
                value="<?php echo e(request('zoeken')); ?>"
                style="flex: 2; min-width: 200px; padding: 10px 12px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px;">

            <select name="categorie"
                style="flex: 1; min-width: 150px; padding: 10px 12px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px; background-color: white;">
                <option value="">-- Alle categorieën --</option>
                <?php $__currentLoopData = $categorieen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($categorie->CategorieID); ?>" <?php echo e(request('categorie') == $categorie->CategorieID ? 'selected' : ''); ?>>
                        <?php echo e($categorie->Naam); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>

            <button type="submit" class="btn">Zoeken</button>

            <?php if(request('zoeken') || request('categorie')): ?>
                <a href="/" class="btn btn-secondary">Reset</a>
            <?php endif; ?>
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
                        <th>Status</th>
                        <th>Acties</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $producten; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <div style="display: flex; align-items: center; gap: 10px;">
                                    <?php if($product->Afbeelding): ?>
                                        <img src="<?php echo e(asset($product->Afbeelding)); ?>" alt="<?php echo e($product->Naam); ?>"
                                            style="width: 40px; height: 40px; object-fit: cover; border-radius: 6px;">
                                    <?php else: ?>
                                        <div
                                            style="width: 40px; height: 40px; background-color: #e9ecef; border-radius: 6px; display: flex; align-items: center; justify-content: center; font-size: 18px;">
                                            📦</div>
                                    <?php endif; ?>
                                    <a href="/product/<?php echo e($product->ProductID); ?>/detail"
                                        style="color: #2c3e50; text-decoration: none; font-weight: bold;">
                                        <?php echo e($product->Naam); ?>

                                    </a>
                                </div>
                            </td>
                            <td><?php echo e($product->Type); ?></td>
                            <td><?php echo e($product->Aantal); ?></td>
                            <td><?php echo e($product->Locatie); ?></td>
                            <td><span class="badge"><?php echo e($product->categorie->Naam ?? '-'); ?></span></td>
                            <td>
                                <div class="actions">
                                    <?php if(Auth::user()->isDocent()): ?>
                                        <a href="/product/<?php echo e($product->ProductID); ?>/edit" class="btn">Bewerken</a>
                                        <form action="<?php echo e(route('producten.destroy', $product->ProductID)); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Weet je zeker dat je dit product wilt verwijderen?')">
                                                Verwijderen
                                            </button>
                                        </form>
                                    <?php else: ?>
                                        <span style="color: #999; font-size: 12px;">Alleen bekijken</span>
                                    <?php endif; ?>
                                </div>
                            </td>
                            <td>
                                <?php if($product->isGereserveerd): ?>
                                    <span class="badge" style="background-color: #f8d7da; color: #721c24;">
                                        🔴 Gereserveerd (<?php echo e($product->gereserveerdAantal); ?>)
                                    </span>
                                <?php else: ?>
                                    <span class="badge" style="background-color: #d4edda; color: #155724;">
                                        🟢 Beschikbaar
                                    </span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>

    </div>

</body>

</html><?php /**PATH C:\Users\ahmet\Desktop\voorraadbeheersysteem\resources\views/producten/index.blade.php ENDPATH**/ ?>