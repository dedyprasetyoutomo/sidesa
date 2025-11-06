<?php

namespace Database\Seeders;

use App\Models\Complaint;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComplaintSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Complaint::create([
            'resident' => 1,
            'title' => 'Sampah Menumpuk',
            'content' => 'Halo pak lurah, ada sampah menumpuk nih',
        ]);
    }
}
