<?php

namespace App\Utilities;

class PasswordUtility
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Generate password berdasarkan nama depan huruf kecil dan 4 angka nomor telepon terakhir
     * Jika jumlah karakter kurang dari 8, tambahkan huruf "bsu" di belakang.
     */
    public static function generatePassword(string $name, string $phone): string
    {
        // Pisahkan nama depan (kata pertama) dan ubah menjadi huruf kecil
        $firstName = strtolower(explode(' ', trim($name))[0]);

        // Ambil 4 angka terakhir dari nomor telepon
        $lastFourDigits = substr($phone, -4);

        // Gabungkan nama depan huruf kecil dan 4 angka terakhir
        $password = $firstName . $lastFourDigits;

        // Tambahkan huruf "bsu" jika panjang password kurang dari 8 karakter
        if (strlen($password) < 8) {
            $password .= 'bsu';
        }

        return $password;
    }
}
