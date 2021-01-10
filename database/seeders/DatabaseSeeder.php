<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()
            ->hasCategories(1, ['name' => 'Food'])
            ->hasCategories(1, ['name' => 'Salary'])
            ->hasCategories(1, ['name' => 'Shopping'])
            ->create([
                'name' => 'John Doe',
                'email' => 'john@outlay.test',
            ]);
    }
}
