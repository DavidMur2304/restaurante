<?php

namespace Database\Seeders;

use App\Models\Table;
use Illuminate\Database\Seeder;

class TableSeeder extends Seeder
{
    public function run(): void
    {
        $tables = [
            // Bar - 6 tables
            ['number' => 'B1', 'location' => 'bar', 'capacity' => 2, 'status' => 'free'],
            ['number' => 'B2', 'location' => 'bar', 'capacity' => 2, 'status' => 'free'],
            ['number' => 'B3', 'location' => 'bar', 'capacity' => 4, 'status' => 'free'],
            ['number' => 'B4', 'location' => 'bar', 'capacity' => 4, 'status' => 'free'],
            ['number' => 'B5', 'location' => 'bar', 'capacity' => 2, 'status' => 'free'],
            ['number' => 'B6', 'location' => 'bar', 'capacity' => 6, 'status' => 'free'],
            // Room / Salon - 8 tables
            ['number' => 'S1', 'location' => 'room', 'capacity' => 4, 'status' => 'free'],
            ['number' => 'S2', 'location' => 'room', 'capacity' => 4, 'status' => 'free'],
            ['number' => 'S3', 'location' => 'room', 'capacity' => 6, 'status' => 'free'],
            ['number' => 'S4', 'location' => 'room', 'capacity' => 6, 'status' => 'free'],
            ['number' => 'S5', 'location' => 'room', 'capacity' => 8, 'status' => 'free'],
            ['number' => 'S6', 'location' => 'room', 'capacity' => 8, 'status' => 'free'],
            ['number' => 'S7', 'location' => 'room', 'capacity' => 10, 'status' => 'free'],
            ['number' => 'S8', 'location' => 'room', 'capacity' => 2, 'status' => 'free'],
            // Restaurant - 10 tables
            ['number' => 'R1',  'location' => 'restaurant', 'capacity' => 2,  'status' => 'free'],
            ['number' => 'R2',  'location' => 'restaurant', 'capacity' => 2,  'status' => 'free'],
            ['number' => 'R3',  'location' => 'restaurant', 'capacity' => 4,  'status' => 'free'],
            ['number' => 'R4',  'location' => 'restaurant', 'capacity' => 4,  'status' => 'free'],
            ['number' => 'R5',  'location' => 'restaurant', 'capacity' => 4,  'status' => 'free'],
            ['number' => 'R6',  'location' => 'restaurant', 'capacity' => 6,  'status' => 'free'],
            ['number' => 'R7',  'location' => 'restaurant', 'capacity' => 6,  'status' => 'free'],
            ['number' => 'R8',  'location' => 'restaurant', 'capacity' => 8,  'status' => 'free'],
            ['number' => 'R9',  'location' => 'restaurant', 'capacity' => 10, 'status' => 'free'],
            ['number' => 'R10', 'location' => 'restaurant', 'capacity' => 12, 'status' => 'free'],
        ];

        foreach ($tables as $table) {
            Table::create($table);
        }
    }
}
