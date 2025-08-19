<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['name' => 'ANTHOLOGY', 'description' => 'Anthology Category', 'status' => 'Enable'],
            ['name' => 'BIOGRAPHY', 'description' => 'Biography Category', 'status' => 'Enable'],
            ['name' => 'ENCYCLOPEDIA', 'description' => 'Encyclopedia Category', 'status' => 'Enable'],
            ['name' => 'ETUE', 'description' => 'Etue Category', 'status' => 'Enable'],
            ['name' => 'FANTASY', 'description' => 'Fantasy Category', 'status' => 'Enable'],
            ['name' => 'NON-FICTION', 'description' => 'Non-Fiction Category', 'status' => 'Enable'],
            ['name' => 'TEST', 'description' => 'Test 123', 'status' => 'Disable'],
        ];

        foreach ($data as $item) {
            Category::create($item);
        }
    }
}
