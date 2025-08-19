<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Author;
use Carbon\Carbon;

class AuthorSeeder extends Seeder
{
    public function run(): void
    {
        $authors = [
            [
                'name' => 'John Doe',
                'dob' => '1990-05-12',
                'address' => 'Jl. Mawar No. 1, Jakarta',
            ],
            [
                'name' => 'Jane Smith',
                'dob' => '1985-09-20',
                'address' => 'Jl. Melati No. 5, Bandung',
            ],
            [
                'name' => 'Michael Jordan',
                'dob' => '1963-02-17',
                'address' => 'Jl. Kenanga No. 9, Surabaya',
            ],
        ];

        foreach ($authors as $author) {
            Author::create($author);
        }
    }
}

