<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($product->Naam); ?> - Voorraadbeheersysteem</title>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=DM+Mono:wght@400;500&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --navy: #0f1e2e;
            --navy-mid: #1a3248;
            --navy-light: #243d56;
            --accent: #3b82f6;
            --accent-hover: #2563eb;
            --accent-light: #eff6ff;
            --success: #10b981;
            --success-light: #d1fae5;
            --warning: #f59e0b;
            --warning-light: #fef3c7;
            --danger: #ef4444;
            --danger-light: #fee2e2;
            --gray-50: #f8fafc;
            --gray-100: #f1f5f9;
            --gray-200: #e2e8f0;
            --gray-500: #64748b;
            --gray-700: #334155;
            --white: #ffffff;
            --text: #1e293b;
            --radius: 10px;
            --radius-sm: 6px;
            --shadow: 0 1px 3px rgba(0, 0, 0, 0.08), 0 4px 16px rgba(0, 0, 0, 0.06);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--gray-50);
            color: var(--text);
        }

        .header {
            background: var(--navy);
            padding: 0 32px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .header-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
        }

        .header-brand-icon {
            width: 32px;
            height: 32px;
            background: rgba(59, 130, 246, 0.2);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
        }

        .header-brand-name {
            font-size: 15px;
            font-weight: 700;
            color: var(--white);
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .header-user {
            display: flex;
            align-items: center;
            gap: 8px;
            color: rgba(255, 255, 255, 0.7);
            font-size: 13px;
        }

        .header-avatar {
            width: 30px;
            height: 30px;
            background: var(--navy-light);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 700;
            color: var(--white);
            border: 1.5px solid rgba(255, 255, 255, 0.15);
        }

        .role-pill {
            padding: 2px 8px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.4px;
        }

        .role-admin {
            background: rgba(239, 68, 68, 0.2);
            color: #fca5a5;
        }

        .role-docent {
            background: rgba(245, 158, 11, 0.2);
            color: #fcd34d;
        }

        .role-student {
            background: rgba(16, 185, 129, 0.2);
            color: #6ee7b7;
        }

        .btn-logout {
            padding: 6px 14px;
            background: rgba(239, 68, 68, 0.15);
            color: #fca5a5;
            border: 1px solid rgba(239, 68, 68, 0.25);
            border-radius: 6px;
            font-family: 'DM Sans', sans-serif;
            font-size: 13px;
            cursor: pointer;
            transition: background 0.2s;
        }

        .btn-logout:hover {
            background: rgba(239, 68, 68, 0.3);
        }

        .nav {
            background: var(--navy-mid);
            padding: 0 32px;
            display: flex;
            align-items: center;
            gap: 2px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.06);
        }

        .nav a {
            color: rgba(255, 255, 255, 0.6);
            text-decoration: none;
            font-size: 13px;
            font-weight: 500;
            padding: 10px 14px;
            transition: color 0.2s;
        }

        .nav a:hover {
            color: var(--white);
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 32px 24px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 9px 18px;
            border-radius: var(--radius-sm);
            font-family: 'DM Sans', sans-serif;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            border: none;
            transition: all 0.2s;
        }

        .btn-primary {
            background: var(--navy);
            color: var(--white);
        }

        .btn-primary:hover {
            background: var(--navy-mid);
        }

        .btn-accent {
            background: var(--accent);
            color: var(--white);
        }

        .btn-accent:hover {
            background: var(--accent-hover);
        }

        .btn-secondary {
            background: var(--gray-100);
            color: var(--gray-700);
            border: 1px solid var(--gray-200);
        }

        .btn-secondary:hover {
            background: var(--gray-200);
        }

        .card {
            background: var(--white);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            border: 1px solid var(--gray-200);
            margin-bottom: 20px;
        }

        .card-body {
            padding: 28px;
        }

        .alert {
            padding: 13px 16px;
            border-radius: 8px;
            font-size: 14px;
            margin-bottom: 20px;
            border-left: 3px solid var(--success);
            background: var(--success-light);
            color: #065f46;
        }

        /* Product header layout */
        .product-header {
            display: flex;
            gap: 28px;
            align-items: flex-start;
            flex-wrap: wrap;
        }

        .product-image-wrap {
            flex-shrink: 0;
        }

        .product-image {
            width: 200px;
            height: 200px;
            object-fit: cover;
            border-radius: 12px;
            border: 1px solid var(--gray-200);
        }

        .product-placeholder {
            width: 200px;
            height: 200px;
            border-radius: 12px;
            background: var(--gray-100);
            border: 1px solid var(--gray-200);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 64px;
        }

        .product-info {
            flex: 1;
            min-width: 220px;
        }

        .product-name {
            font-size: 26px;
            font-weight: 700;
            letter-spacing: -0.4px;
            margin-bottom: 10px;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 18px;
        }

        .badge-success {
            background: var(--success-light);
            color: #065f46;
        }

        .badge-warning {
            background: var(--warning-light);
            color: #92400e;
        }

        .badge-danger {
            background: var(--danger-light);
            color: #991b1b;
        }

        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            margin-top: 16px;
        }

        .info-item {
            background: var(--gray-50);
            border: 1px solid var(--gray-100);
            padding: 12px 14px;
            border-radius: 8px;
        }

        .info-label {
            font-size: 11px;
            font-weight: 600;
            color: var(--gray-500);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: block;
        }

        .info-value {
            font-size: 15px;
            font-weight: 600;
            color: var(--text);
            margin-top: 4px;
            display: block;
            font-family: 'DM Mono', monospace;
        }

        .description-box {
            margin-top: 20px;
            padding: 16px;
            background: var(--accent-light);
            border-radius: 8px;
            border-left: 3px solid var(--accent);
        }

        .description-box p {
            font-size: 14px;
            line-height: 1.7;
            color: var(--gray-700);
        }

        .action-row {
            display: flex;
            gap: 10px;
            margin-top: 24px;
            flex-wrap: wrap;
        }

        /* History table */
        .section-title {
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            padding: 10px 14px;
            text-align: left;
            font-size: 11px;
            font-weight: 700;
            color: var(--gray-500);
            text-transform: uppercase;
            letter-spacing: 0.6px;
            background: var(--gray-50);
            border-bottom: 1px solid var(--gray-200);
        }

        td {
            padding: 12px 14px;
            font-size: 14px;
            border-bottom: 1px solid var(--gray-100);
            vertical-align: middle;
        }

        tr:last-child td {
            border-bottom: none;
        }

        tbody tr:hover td {
            background: var(--gray-50);
        }

        .status-dot {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-weight: 600;
            font-size: 13px;
        }

        .dot-green {
            color: var(--success);
        }

        .muted {
            color: var(--gray-500);
            font-size: 13px;
            font-style: italic;
            text-align: center;
            padding: 24px;
        }
    </style>
</head>

<body>

    <header class="header">
        <a href="/" class="header-brand">
            <div class="header-brand-icon">📦</div>
            <span class="header-brand-name">Voorraadbeheersysteem</span>
        </a>
        <div class="header-right">
            <div class="header-user">
                <div class="header-avatar"><?php echo e(substr(Auth::user()->Naam, 0, 1)); ?></div>
                <span><?php echo e(Auth::user()->Naam); ?></span>
                <?php if(Auth::user()->Rol === 'admin'): ?>
                    <span class="role-pill role-admin">Admin</span>
                <?php elseif(Auth::user()->Rol === 'docent'): ?>
                    <span class="role-pill role-docent">Docent</span>
                <?php else: ?>
                    <span class="role-pill role-student">Student</span>
                <?php endif; ?>
            </div>
            <form method="POST" action="<?php echo e(route('logout')); ?>">
                <?php echo csrf_field(); ?>
                <button type="submit" class="btn-logout">Uitloggen</button>
            </form>
        </div>
    </header>

    <nav class="nav">
        <a href="/">← Producten</a>
        <?php if(Auth::user()->isDocent()): ?>
            <a href="/reserveringen">📋 Reserveringen</a>
        <?php endif; ?>
        <a href="/mijn-account">👤 Mijn Account</a>
        <a href="/documentatie">📖 Documentatie</a>
    </nav>

    <div class="container">

        <?php if(session('success')): ?>
            <div class="alert">✅ <?php echo e(session('success')); ?></div>
        <?php endif; ?>

        <div class="card card-body">
            <div class="product-header">
                <div class="product-image-wrap">
                    <?php if($product->Afbeelding): ?>
                        <img src="<?php echo e(asset($product->Afbeelding)); ?>" alt="<?php echo e($product->Naam); ?>" class="product-image">
                    <?php else: ?>
                        <div class="product-placeholder">📦</div>
                    <?php endif; ?>
                </div>
                <div class="product-info">
                    <div class="product-name"><?php echo e($product->Naam); ?></div>

                    <?php $beschikbaar = $product->Aantal - $product->gereserveerdAantal; ?>
                    <?php if($product->gereserveerdAantal >= $product->Aantal && $product->Aantal > 0): ?>
                        <span class="badge badge-danger">🔴 Volledig gereserveerd</span>
                    <?php elseif($product->gereserveerdAantal > 0): ?>
                        <span class="badge badge-warning">🟡 Gedeeltelijk gereserveerd — <?php echo e($beschikbaar); ?> van
                            <?php echo e($product->Aantal); ?> vrij</span>
                    <?php else: ?>
                        <span class="badge badge-success">🟢 Volledig beschikbaar — <?php echo e($product->Aantal); ?> stuks</span>
                    <?php endif; ?>

                    <div class="info-grid">
                        <div class="info-item">
                            <span class="info-label">Type</span>
                            <span class="info-value"><?php echo e($product->Type); ?></span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Categorie</span>
                            <span class="info-value"><?php echo e($product->categorie->Naam ?? '-'); ?></span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Locatie</span>
                            <span class="info-value"><?php echo e($product->Locatie); ?></span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Voorraad</span>
                            <span class="info-value"><?php echo e($product->Aantal); ?> stuks</span>
                        </div>
                    </div>

                    <?php if($product->Beschrijving): ?>
                        <div class="description-box">
                            <p><?php echo e($product->Beschrijving); ?></p>
                        </div>
                    <?php endif; ?>

                    <div class="action-row">
                        <a href="/" class="btn btn-secondary">← Terug</a>
                        <?php if(Auth::user()->isDocent()): ?>
                            <a href="/product/<?php echo e($product->ProductID); ?>/edit" class="btn btn-primary">✏️ Bewerken</a>
                        <?php else: ?>
                            <a href="/reservering/create?product=<?php echo e($product->ProductID); ?>" class="btn btn-accent">+
                                Reserveren</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-body">
            <div class="section-title">📋 Reserveringsgeschiedenis</div>
            <?php if($reserveringen->count() > 0): ?>
                <table>
                    <thead>
                        <tr>
                            <th>Gebruiker</th>
                            <th>Aantal</th>
                            <th>Datum</th>
                            <th>Doel</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $reserveringen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $res): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><strong><?php echo e($res->gebruiker->Naam ?? '-'); ?></strong></td>
                                <td><?php echo e($res->Aantal); ?>x</td>
                                <td><?php echo e($res->Datum); ?></td>
                                <td style="color:var(--gray-700);"><?php echo e($res->Doel ?? '-'); ?></td>
                                <td>
                                    <?php if($res->Status == 'actief'): ?>
                                        <span class="status-dot dot-green">● Actief</span>
                                    <?php else: ?>
                                        <span style="color:var(--gray-500);"><?php echo e($res->Status); ?></span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p class="muted">Nog geen reserveringen voor dit product.</p>
            <?php endif; ?>
        </div>

    </div>
</body>

</html><?php /**PATH C:\Users\ahmet\Desktop\voorraadbeheersysteem\resources\views/producten/detail.blade.php ENDPATH**/ ?>