<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DiskonSeeder extends Seeder
{
    public function run()
    {
        $builder = $this->db->table('diskon');

        $tanggalAwal = date('Y-m-d'); // Misalnya hari ini 2025-07-01
        $createdAt = date('Y-m-d H:i:s');

        for ($i = 0; $i < 10; $i++) {
            $tanggal = date('Y-m-d', strtotime("$tanggalAwal +$i day"));
            $nominal = rand(10000, 200000); // Random nominal

            $builder->insert([
                'tanggal'    => $tanggal,
                'nominal'    => $nominal,
                'created_at' => $createdAt,
                'updated_at' => $createdAt,
            ]);
        }
    }
}
