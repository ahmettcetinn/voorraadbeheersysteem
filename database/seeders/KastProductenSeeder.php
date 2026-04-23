<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Categorie;

class KastProductenSeeder extends Seeder
{
    public function run(): void
    {
        // Categorieën aanmaken
        $categorieen = [
            'Kabels & Adapters' => null,
            'Microcontrollers' => null,
            'Mini PC' => null,
            'Sensoren & Modules' => null,
        ];

        foreach ($categorieen as $naam => $id) {
            $cat = Categorie::firstOrCreate(['Naam' => $naam]);
            $categorieen[$naam] = $cat->CategorieID;
        }

        // === ECHTE ITEMS UIT DE KAST ===
        $producten = [
            // Kabels & Adapters (jij hebt deze gezien!)
            ['Naam' => 'USB-C Oplaadkabel', 'Type' => 'Kabel', 'Aantal' => 12, 'Locatie' => 'Kast - Kabels Lade', 'CategorieID' => $categorieen['Kabels & Adapters'], 'Beschrijving' => 'USB-C naar USB-A oplaadkabel, 1 meter'],
            ['Naam' => 'USB-C Datakabel', 'Type' => 'Kabel', 'Aantal' => 8, 'Locatie' => 'Kast - Kabels Lade', 'CategorieID' => $categorieen['Kabels & Adapters'], 'Beschrijving' => 'USB-C data/sync kabel'],
            ['Naam' => 'USB-C naar USB-C', 'Type' => 'Kabel', 'Aantal' => 6, 'Locatie' => 'Kast - Kabels Lade', 'CategorieID' => $categorieen['Kabels & Adapters'], 'Beschrijving' => 'USB-C naar USB-C kabel (PD charging)'],
            ['Naam' => 'Micro-USB Kabel', 'Type' => 'Kabel', 'Aantal' => 5, 'Locatie' => 'Kast - Kabels Lade', 'CategorieID' => $categorieen['Kabels & Adapters'], 'Beschrijving' => 'Micro-USB oplaad/data kabel'],
            ['Naam' => 'HDMI Kabel', 'Type' => 'Kabel', 'Aantal' => 4, 'Locatie' => 'Kast - Kabels Lade', 'CategorieID' => $categorieen['Kabels & Adapters'], 'Beschrijving' => 'HDMI 2.0 kabel, 2 meter'],
            ['Naam' => 'USB-C Hub / Adapter', 'Type' => 'Adapter', 'Aantal' => 3, 'Locatie' => 'Kast - Kabels Lade', 'CategorieID' => $categorieen['Kabels & Adapters'], 'Beschrijving' => 'Multi-port USB-C hub met HDMI en USB-A'],

            // Microcontrollers (jij hebt deze gezien!)
            ['Naam' => 'Arduino Uno R3', 'Type' => 'Microcontroller', 'Aantal' => 6, 'Locatie' => 'Kast - Microcontrollers', 'CategorieID' => $categorieen['Microcontrollers'], 'Beschrijving' => 'Arduino Uno Rev3 met ATmega328P'],
            ['Naam' => 'Arduino Nano', 'Type' => 'Microcontroller', 'Aantal' => 4, 'Locatie' => 'Kast - Microcontrollers', 'CategorieID' => $categorieen['Microcontrollers'], 'Beschrijving' => 'Compacte Arduino Nano board'],
            ['Naam' => 'ESP32 DevKit', 'Type' => 'Microcontroller', 'Aantal' => 5, 'Locatie' => 'Kast - Microcontrollers', 'CategorieID' => $categorieen['Microcontrollers'], 'Beschrijving' => 'ESP32-WROOM-32 development board met WiFi + Bluetooth'],
            ['Naam' => 'ESP8266 NodeMCU', 'Type' => 'Microcontroller', 'Aantal' => 3, 'Locatie' => 'Kast - Microcontrollers', 'CategorieID' => $categorieen['Microcontrollers'], 'Beschrijving' => 'ESP8266 NodeMCU V3 met WiFi'],
            ['Naam' => 'Arduino Mega 2560', 'Type' => 'Microcontroller', 'Aantal' => 2, 'Locatie' => 'Kast - Microcontrollers', 'CategorieID' => $categorieen['Microcontrollers'], 'Beschrijving' => 'Arduino Mega 2560 met meer I/O pins'],

            // Mini PC (jij hebt deze gezien!)
            ['Naam' => 'Raspberry Pi 4', 'Type' => 'Mini PC', 'Aantal' => 3, 'Locatie' => 'Kast - Mini PC', 'CategorieID' => $categorieen['Mini PC'], 'Beschrijving' => 'Raspberry Pi 4 Model B, 4GB RAM'],
            ['Naam' => 'Raspberry Pi 3B+', 'Type' => 'Mini PC', 'Aantal' => 2, 'Locatie' => 'Kast - Mini PC', 'CategorieID' => $categorieen['Mini PC'], 'Beschrijving' => 'Raspberry Pi 3 Model B+'],
            ['Naam' => 'Raspberry Pi Zero W', 'Type' => 'Mini PC', 'Aantal' => 4, 'Locatie' => 'Kast - Mini PC', 'CategorieID' => $categorieen['Mini PC'], 'Beschrijving' => 'Compacte Raspberry Pi Zero W met WiFi'],

            // Sensoren & Kleine Modules (jij hebt "kleine sensor type dingen" gezien!)
            ['Naam' => 'DHT11 Temperatuur Sensor', 'Type' => 'Sensor', 'Aantal' => 8, 'Locatie' => 'Kast - Sensoren', 'CategorieID' => $categorieen['Sensoren & Modules'], 'Beschrijving' => 'Temperatuur en vochtigheid sensor'],
            ['Naam' => 'DHT22 Temperatuur Sensor', 'Type' => 'Sensor', 'Aantal' => 5, 'Locatie' => 'Kast - Sensoren', 'CategorieID' => $categorieen['Sensoren & Modules'], 'Beschrijving' => 'Nauwkeurige temperatuur en vochtigheid sensor'],
            ['Naam' => 'Ultrasonic Afstand Sensor', 'Type' => 'Sensor', 'Aantal' => 6, 'Locatie' => 'Kast - Sensoren', 'CategorieID' => $categorieen['Sensoren & Modules'], 'Beschrijving' => 'HC-SR04 ultrasonic afstandsmeter'],
            ['Naam' => 'PIR Bewegingssensor', 'Type' => 'Sensor', 'Aantal' => 4, 'Locatie' => 'Kast - Sensoren', 'CategorieID' => $categorieen['Sensoren & Modules'], 'Beschrijving' => 'Passive Infrared bewegingsdetector'],
            ['Naam' => 'LDR Lichtsensor', 'Type' => 'Sensor', 'Aantal' => 10, 'Locatie' => 'Kast - Sensoren', 'CategorieID' => $categorieen['Sensoren & Modules'], 'Beschrijving' => 'Light Dependent Resistor lichtsensor'],
            ['Naam' => 'BMP280 Druk Sensor', 'Type' => 'Sensor', 'Aantal' => 3, 'Locatie' => 'Kast - Sensoren', 'CategorieID' => $categorieen['Sensoren & Modules'], 'Beschrijving' => 'Luchtdruk en temperatuur sensor'],
            ['Naam' => 'MQ-2 Gas Sensor', 'Type' => 'Sensor', 'Aantal' => 2, 'Locatie' => 'Kast - Sensoren', 'CategorieID' => $categorieen['Sensoren & Modules'], 'Beschrijving' => 'Rook en gas detectie sensor'],
            ['Naam' => 'NFC/RFID Module', 'Type' => 'Module', 'Aantal' => 3, 'Locatie' => 'Kast - Sensoren', 'CategorieID' => $categorieen['Sensoren & Modules'], 'Beschrijving' => 'RC522 NFC/RFID reader module'],
            ['Naam' => 'Bluetooth Module HC-05', 'Type' => 'Module', 'Aantal' => 4, 'Locatie' => 'Kast - Sensoren', 'CategorieID' => $categorieen['Sensoren & Modules'], 'Beschrijving' => 'HC-05 Bluetooth serial module'],
            ['Naam' => 'WiFi Module ESP-01', 'Type' => 'Module', 'Aantal' => 5, 'Locatie' => 'Kast - Sensoren', 'CategorieID' => $categorieen['Sensoren & Modules'], 'Beschrijving' => 'ESP-01 WiFi module voor Arduino'],
            ['Naam' => 'OLED Display 0.96"', 'Type' => 'Display', 'Aantal' => 4, 'Locatie' => 'Kast - Sensoren', 'CategorieID' => $categorieen['Sensoren & Modules'], 'Beschrijving' => '128x64 I2C OLED display'],
            ['Naam' => 'Servo Motor SG90', 'Type' => 'Actuator', 'Aantal' => 8, 'Locatie' => 'Kast - Sensoren', 'CategorieID' => $categorieen['Sensoren & Modules'], 'Beschrijving' => 'Kleine 9g servo motor'],
            ['Naam' => 'Stepper Motor + Driver', 'Type' => 'Actuator', 'Aantal' => 2, 'Locatie' => 'Kast - Sensoren', 'CategorieID' => $categorieen['Sensoren & Modules'], 'Beschrijving' => '28BYJ-48 stepper motor met ULN2003 driver'],
            ['Naam' => 'Breadboard 830', 'Type' => 'Prototype', 'Aantal' => 10, 'Locatie' => 'Kast - Sensoren', 'CategorieID' => $categorieen['Sensoren & Modules'], 'Beschrijving' => '830 punts solderless breadboard'],
            ['Naam' => 'Jumper Wires Set', 'Type' => 'Accessoire', 'Aantal' => 15, 'Locatie' => 'Kast - Sensoren', 'CategorieID' => $categorieen['Sensoren & Modules'], 'Beschrijving' => '40 stuks male-male, male-female, female-female jumper wires'],
            ['Naam' => 'LED Set (5mm)', 'Type' => 'Component', 'Aantal' => 20, 'Locatie' => 'Kast - Sensoren', 'CategorieID' => $categorieen['Sensoren & Modules'], 'Beschrijving' => 'Assorted kleuren 5mm LED set'],
            ['Naam' => 'Weerstanden Set', 'Type' => 'Component', 'Aantal' => 10, 'Locatie' => 'Kast - Sensoren', 'CategorieID' => $categorieen['Sensoren & Modules'], 'Beschrijving' => '400 stuks assorted weerstanden (10Ω - 1MΩ)'],
            ['Naam' => 'Potentiometer 10K', 'Type' => 'Component', 'Aantal' => 8, 'Locatie' => 'Kast - Sensoren', 'CategorieID' => $categorieen['Sensoren & Modules'], 'Beschrijving' => '10K Ohm lineaire potentiometer'],
        ];

        foreach ($producten as $product) {
            Product::create($product);
        }
    }
}