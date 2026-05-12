<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documentatie - Voorraadbeheersysteem</title>
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
            line-height: 1.6;
        }

        header {
            background-color: #2c3e50;
            color: white;
            padding: 16px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
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

        .container {
            max-width: 900px;
            margin: 30px auto;
            padding: 0 20px;
        }

        .card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            padding: 30px;
            margin-bottom: 20px;
        }

        h1 {
            font-size: 28px;
            color: #2c3e50;
            margin-bottom: 10px;
        }

        h2 {
            font-size: 22px;
            color: #2c3e50;
            margin-top: 30px;
            margin-bottom: 15px;
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
        }

        h3 {
            font-size: 18px;
            color: #34495e;
            margin-top: 20px;
            margin-bottom: 10px;
        }

        .role-box {
            background-color: #f8f9fa;
            border-left: 4px solid #2c3e50;
            padding: 15px 20px;
            margin: 15px 0;
            border-radius: 0 8px 8px 0;
        }

        .role-admin {
            border-left-color: #e74c3c;
        }

        .role-docent {
            border-left-color: #f39c12;
        }

        .role-student {
            border-left-color: #27ae60;
        }

        .role-title {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .role-admin .role-title {
            color: #e74c3c;
        }

        .role-docent .role-title {
            color: #f39c12;
        }

        .role-student .role-title {
            color: #27ae60;
        }

        ul {
            margin-left: 20px;
            margin-top: 8px;
        }

        li {
            margin-bottom: 6px;
        }

        .badge {
            display: inline-block;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            margin-left: 10px;
        }

        .badge-admin {
            background-color: #fdecea;
            color: #e74c3c;
        }

        .badge-docent {
            background-color: #fef5e7;
            color: #f39c12;
        }

        .badge-student {
            background-color: #e9f7ef;
            color: #27ae60;
        }

        .btn {
            padding: 10px 20px;
            background-color: #2c3e50;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-size: 14px;
            display: inline-block;
            margin-top: 10px;
        }

        .btn:hover {
            background-color: #1a252f;
        }

        .info-box {
            background-color: #e3f2fd;
            border: 1px solid #bbdefb;
            padding: 15px;
            border-radius: 8px;
            margin: 20px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th {
            background-color: #2c3e50;
            color: white;
            padding: 12px;
            text-align: left;
            font-size: 14px;
        }

        td {
            padding: 12px;
            border-bottom: 1px solid #eee;
            font-size: 14px;
        }

        tr:hover td {
            background-color: #f9f9f9;
        }
    </style>
</head>

<body>

    <header>
        <h1>📦 Voorraadbeheersysteem</h1>
        @if(Auth::check())
            <div style="color: white; font-size: 14px;">
                👤 {{ Auth::user()->Naam }}
                <a href="/" style="color: white; margin-left: 15px;">Terug naar site</a>
            </div>
        @else
            <a href="/login" style="color: white; font-size: 14px; text-decoration: none;">Inloggen</a>
        @endif
    </header>

    <nav>
        <a href="/">← Terug naar producten</a>
        <a href="/documentatie">Documentatie</a>
    </nav>

    <div class="container">

        <div class="card">
            <h1>📖 Documentatie</h1>
            <p>Welkom bij het Voorraadbeheersysteem. Op deze pagina vind je een overzicht van wat elke rol kan doen
                binnen het systeem.</p>

            <div class="info-box">
                <strong>💡 Tip:</strong> Klik op "Inloggen" rechtsboven om het systeem te gebruiken. Heb je nog geen
                account? Vraag je docent om een account of registreer jezelf als student.
            </div>
        </div>

        <div class="card">
            <h2>👥 Rollen & Rechten</h2>
            <p>Het systeem kent drie rollen. Hieronder staat wat elke rol mag en kan doen:</p>

            <div class="role-box role-admin">
                <div class="role-title">🔴 Admin <span class="badge badge-admin">Developer / Systeembeheer</span></div>
                <p>De admin is de ontwikkelaar of systeembeheerder van het voorraadbeheersysteem.</p>
                <ul>
                    <li>✅ <strong>Alles</strong> wat een docent kan</li>
                    <li>✅ Gebruikers beheren (rollen toewijzen, accounts aanmaken)</li>
                    <li>✅ Producten toevoegen, bewerken, verwijderen</li>
                    <li>✅ Alle reserveringen inzien en annuleren</li>
                    <li>✅ Categorieën beheren</li>
                    <li>✅ Systeeminstellingen wijzigen</li>
                </ul>
            </div>

            <div class="role-box role-docent">
                <div class="role-title">🟠 Docent <span class="badge badge-docent">Beheerder</span></div>
                <p>Docenten beheren de voorraad en houden toezicht op reserveringen.</p>
                <ul>
                    <li>✅ Producten <strong>toevoegen</strong> (met afbeelding en beschrijving)</li>
                    <li>✅ Producten <strong>bewerken</strong> (voorraad, locatie, info)</li>
                    <li>✅ Producten <strong>verwijderen</strong></li>
                    <li>✅ <strong>Alle</strong> reserveringen bekijken</li>
                    <li>✅ <strong>Alle</strong> reserveringen annuleren</li>
                    <li>✅ Gebruikersprofielen bekijken</li>
                    <li>✅ Zien waarvoor studenten iets reserveren (doel/beschrijving)</li>
                    <li>❌ Geen eigen reserveringen maken (alleen namens studenten)</li>
                </ul>
            </div>

            <div class="role-box role-student">
                <div class="role-title">🟢 Student <span class="badge badge-student">Gebruiker</span></div>
                <p>Studenten kunnen producten bekijken en reserveren voor hun projecten.</p>
                <ul>
                    <li>✅ Producten <strong>bekijken</strong> met afbeelding en status</li>
                    <li>✅ Product details zien (voorraad, locatie, reserveringsgeschiedenis)</li>
                    <li>✅ Producten <strong>reserveren</strong> (met doel/beschrijving)</li>
                    <li>✅ <strong>Eigen</strong> reserveringen bekijken</li>
                    <li>✅ <strong>Eigen</strong> reserveringen annuleren</li>
                    <li>✅ Eigen profiel bekijken</li>
                    <li>❌ Producten <strong>niet</strong> toevoegen/bewerken/verwijderen</li>
                    <li>❌ Reserveringen van <strong>anderen</strong> niet zien/annuleren</li>
                </ul>
            </div>
        </div>

        <div class="card">
            <h2>📋 Functionaliteiten Overzicht</h2>
            <table>
                <thead>
                    <tr>
                        <th>Functionaliteit</th>
                        <th>Admin</th>
                        <th>Docent</th>
                        <th>Student</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Producten bekijken</td>
                        <td>✅</td>
                        <td>✅</td>
                        <td>✅</td>
                    </tr>
                    <tr>
                        <td>Product details zien</td>
                        <td>✅</td>
                        <td>✅</td>
                        <td>✅</td>
                    </tr>
                    <tr>
                        <td>Product toevoegen</td>
                        <td>✅</td>
                        <td>✅</td>
                        <td>❌</td>
                    </tr>
                    <tr>
                        <td>Product bewerken</td>
                        <td>✅</td>
                        <td>✅</td>
                        <td>❌</td>
                    </tr>
                    <tr>
                        <td>Product verwijderen</td>
                        <td>✅</td>
                        <td>✅</td>
                        <td>❌</td>
                    </tr>
                    <tr>
                        <td>Reservering maken</td>
                        <td>✅</td>
                        <td>✅</td>
                        <td>✅</td>
                    </tr>
                    <tr>
                        <td>Eigen reserveringen zien</td>
                        <td>✅</td>
                        <td>✅</td>
                        <td>✅</td>
                    </tr>
                    <tr>
                        <td>Alle reserveringen zien</td>
                        <td>✅</td>
                        <td>✅</td>
                        <td>❌</td>
                    </tr>
                    <tr>
                        <td>Reservering annuleren (eigen)</td>
                        <td>✅</td>
                        <td>✅</td>
                        <td>✅</td>
                    </tr>
                    <tr>
                        <td>Reservering annuleren (andere)</td>
                        <td>✅</td>
                        <td>✅</td>
                        <td>❌</td>
                    </tr>
                    <tr>
                        <td>Gebruikersprofiel bekijken</td>
                        <td>✅</td>
                        <td>✅</td>
                        <td>❌ (alleen eigen)</td>
                    </tr>
                    <tr>
                        <td>Account registreren</td>
                        <td>-</td>
                        <td>-</td>
                        <td>✅</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="card">
            <h2>🔐 Test Accounts</h2>
            <p>Gebruik deze accounts om het systeem te testen:</p>
            <table>
                <thead>
                    <tr>
                        <th>Rol</th>
                        <th>Email</th>
                        <th>Wachtwoord</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><span class="badge badge-admin">Admin</span></td>
                        <td>admin@school.nl</td>
                        <td>password</td>
                    </tr>
                    <tr>
                        <td><span class="badge badge-docent">Docent</span></td>
                        <td>jan@school.nl</td>
                        <td>password</td>
                    </tr>
                    <tr>
                        <td><span class="badge badge-student">Student</span></td>
                        <td>piet@school.nl</td>
                        <td>password</td>
                    </tr>
                </tbody>
            </table>
            <p style="margin-top: 15px; color: #666; font-size: 13px;">
                💡 <strong>Tip:</strong> Je kan ook een nieuw student account aanmaken via "Registreren" op de login
                pagina.
            </p>
        </div>

        <div style="text-align: center; margin: 30px 0;">
            <a href="/" class="btn">← Terug naar Voorraadbeheersysteem</a>
        </div>

    </div>

</body>

</html>