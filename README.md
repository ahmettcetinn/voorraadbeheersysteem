# 📦 Voorraadbeheersysteem

Een Laravel webapplicatie voor het beheren van schoolvoorraad (electronica, microcontrollers, kabels, sensoren).

## 🎯 Functionaliteiten

| Rol | Wat kan deze rol? |
|-----|------------------|
| **Admin** | Alles (producten, gebruikers, reserveringen, systeembeheer) |
| **Docent** | Producten beheren, alle reserveringen zien/annuleren, gebruikersprofielen bekijken |
| **Student** | Producten bekijken, reserveren, eigen reserveringen beheren |

## 🗄️ Database Structuur

- **Categorie** - Productcategorieën
- **Gebruiker** - Gebruikers met rol (admin/docent/student)
- **Product** - Producten met afbeelding, beschrijving, voorraad
- **Reservering** - Reserveringen met doel, datum, status

## 🔐 Test Accounts

| Rol | Email | Wachtwoord |
|-----|-------|-----------|
| Admin | admin@school.nl | password |
| Docent | jan@school.nl | password |
| Student | piet@school.nl | password |

## 🛠️ Technologieën

Laravel, PHP 8.2, MySQL, Blade, HTML/CSS

## 👤 Auteur

Ahmet - Stageproject