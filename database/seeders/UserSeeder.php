<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::factory()->count(100)->create();

        // User::withoutTimestamps(
        //     fn() => User::factory()->count(3)->create()
        // );

        // User::factory()->count(6)->sequence(
        //     fn(Sequence $sequence) => ['name' => 'name ' . $sequence->index + 1]
        // )->create();

        // User::factory()->count(6)->state(new Sequence(
        //     ['is_admin' => 1],
        //     ['is_admin' => 3],
        //     ['is_admin' => 5],
        // ))->create();

        // User::factory()->count(6)->sequence(
        //     ['is_admin' => 1],
        //     ['is_admin' => 2],
        //     ['is_admin' => 3]
        // )->create();

        // User::factory()->count(2)->state([
        //     'name' => 'karem hazem'
        // ])
        //     ->create();

        // User::factory()->count(2)->create([
        //     'name' => 'hazem mohammed',
        //     'is_admin' => 1
        // ]);

        // UserFactory::new()->count(5)->create();
    }
}
