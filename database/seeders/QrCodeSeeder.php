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
        // $batchSize = 10000;
        $batchSize = 100;
        // $total = 1_000_000;
        $total = 1_000;

        for ($i = 0; $i < ($total / $batchSize); $i++) {
            $qrcodes = QrCode::factory()->count($batchSize)->make()->toArray();
            QrCode::insert($qrcodes); // Bulk insert - faster and lighter
        }
    }
}
