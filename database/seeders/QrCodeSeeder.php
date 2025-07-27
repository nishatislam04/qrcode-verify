<?php

namespace Database\Seeders;

use App\Models\QrCode;
use Illuminate\Database\Seeder;

class QrCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Generate 1 million QR codes in chunks
        // $batchSize = 10000;
        // $total = 1_000_000;
        $batchSize = 1;
        $total = 1;

        for ($i = 0; $i < $total / $batchSize; $i++) {
            QrCode::factory($batchSize)->create();
        }
    }
}
