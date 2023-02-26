<?php

namespace Database\Seeders;

use App\Models\CartStatus;
use Illuminate\Database\Seeder;

class CartStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CartStatus::updateOrCreate(
            ['id' => CartStatus::IN_PROGRESS],
            ['name' => 'En progreso']
        );

        CartStatus::updateOrCreate(
            ['id' => CartStatus::PAYMENT_SUCCESSFUL],
            ['name' => 'Pago correcto']
        );

        CartStatus::updateOrCreate(
            ['id' => CartStatus::PAYMENT_ERROR],
            ['name' => 'Error en el pago']
        );

        CartStatus::updateOrCreate(
            ['id' => CartStatus::ABANDONED],
            ['name' => 'Abandonado']
        );
    }
}
