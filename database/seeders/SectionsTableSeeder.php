<?php

namespace Database\Seeders;

use App\Models\Section;
use DB;
use Illuminate\Database\Seeder;

class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Section::toBase()->truncate();
        $sectionsRecords = [
            [
                'name' => 'Men',
                'status' => 1
            ],
            [
                'name' => 'Women',
                'status' => 1
            ],
            [
                'name' => 'Kids',
                'status' => 1
            ]
        ];

        Section::toBase()->insert($sectionsRecords);
    }
}
