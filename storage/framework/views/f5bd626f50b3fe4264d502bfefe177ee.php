<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($gebruiker->Naam); ?> - Profiel</title>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=DM+Mono:wght@400;500&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --navy: #0f1e2e;
            --navy-mid: #1a3248;
            --navy-light: #243d56;
            --accent: #3b82f6;
            --success: #10b981;
            --success-light: #d1fae5;
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
            max-width: 820px;
            margin: 0 auto;
            padding: 32px 24px;
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

        .profile-hero {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .profile-avatar {
            width: 72px;
            height: 72px;
            background: linear-gradient(135deg, var(--navy), var(--navy-mid));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            font-weight: 700;
            color: var(--white);
            flex-shrink: 0;
        }

        .profile-name {
            font-size: 22px;
            font-weight: 700;
            letter-spacing: -0.3px;
        }

        .profile-email {
            color: var(--gray-500);
            font-size: 14px;
            margin-top: 2px;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            margin-top: 8px;
        }

        .badge-student {
            background: #eff6ff;
            color: #1d4ed8;
        }

        .badge-docent {
            background: #fef3c7;
            color: #92400e;
        }

        .badge-admin {
            background: #fee2e2;
            color: #991b1b;
        }

        .stats-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            margin-top: 20px;
        }

        .stat-item {
            background: var(--gray-50);
            border: 1px solid var(--gray-100);
            padding: 14px 16px;
            border-radius: 8px;
        }

        .stat-value {
            font-size: 22px;
            font-weight: 700;
            color: var(--text);
            font-family: 'DM Mono', monospace;
        }

        .stat-label {
            font-size: 12px;
            color: var(--gray-500);
            margin-top: 2px;
        }

        .section-header {
            padding: 18px 24px;
            border-bottom: 1px solid var(--gray-100);
        }

        .section-title {
            font-size: 15px;
            font-weight: 700;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            padding: 11px 16px;
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
            padding: 13px 16px;
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

        .badge-success {
            background: var(--success-light);
            color: #065f46;
        }

        .product-link {
            color: var(--text);
            font-weight: 600;
            text-decoration: none;
        }

        .product-link:hover {
            color: var(--accent);
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

        .btn-secondary {
            background: var(--gray-100);
            color: var(--gray-700);
            border: 1px solid var(--gray-200);
        }

        .btn-secondary:hover {
            background: var(--gray-200);
        }

        .empty {
            padding: 40px;
            text-align: center;
            color: var(--gray-500);
            font-size: 14px;
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
    </nav>

    <div class="container">

        <div class="card card-body">
            <div class="profile-hero">
                <div class="profile-avatar"><?php echo e(substr($gebruiker->Naam, 0, 1)); ?></div>
                <div>
                    <div class="profile-name"><?php echo e($gebruiker->Naam); ?></div>
                    <div class="profile-email"><?php echo e($gebruiker->email); ?></div>
                    <?php if($gebruiker->Rol === 'admin'): ?>
                        <span class="badge badge-admin">🔴 Admin</span>
                    <?php elseif($gebruiker->Rol === 'docent'): ?>
                        <span class="badge badge-docent">👨‍🏫 Docent</span>
                    <?php else: ?>
                        <span class="badge badge-student">🎓 Student</span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="stats-row">
                <div class="stat-item">
                    <div class="stat-value"><?php echo e($reserveringen->count()); ?></div>
                    <div class="stat-label">Totaal reserveringen</div>
                </div>
                <div class="stat-item">
                    <div class="stat-value"><?php echo e($reserveringen->sum('Aantal')); ?></div>
                    <div class="stat-label">Stuks gereserveerd</div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="section-header">
                <div class="section-title">📋 Reserveringen van <?php echo e($gebruiker->Naam); ?></div>
            </div>

            <?php if($reserveringen->count() > 0): ?>
                <table>
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Aantal</th>
                            <th>Datum</th>
                            <th>Status</th>
                            <th>Doel</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $reserveringen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reservering): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <a href="/product/<?php echo e($reservering->product->ProductID ?? ''); ?>/detail" class="product-link">
                                        <?php echo e($reservering->product->Naam ?? '-'); ?>

                                    </a>
                                </td>
                                <td style="font-family:'DM Mono',monospace;"><?php echo e($reservering->Aantal); ?>x</td>
                                <td style="color:var(--gray-500);"><?php echo e($reservering->Datum); ?></td>
                                <td><span class="badge badge-success">● <?php echo e($reservering->Status); ?></span></td>
                                <td style="color:var(--gray-700);font-size:13px;"><?php echo e($reservering->Doel ?? '—'); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            <?php else: ?>
                <div class="empty"><?php echo e($gebruiker->Naam); ?> heeft nog geen reserveringen.</div>
            <?php endif; ?>
        </div>

        <div style="text-align:center;">
            <a href="/" class="btn btn-secondary">← Terug naar overzicht</a>
        </div>

    </div>
</body>

</html><?php /**PATH C:\Users\ahmet\Desktop\voorraadbeheersysteem\resources\views/gebruiker/profiel.blade.php ENDPATH**/ ?>