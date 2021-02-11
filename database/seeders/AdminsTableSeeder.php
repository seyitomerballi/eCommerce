<?php

namespace Database\Seeders;

use App\Models\Admin;
use DB;
use Hash;
use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->truncate();
        $adminRecords = [
            ['id'=>1,
            'name'=>'admin',
            'type'=>'admin',
            'mobile'=>'98000000000',
            'email'=>'admin@admin.com',
            'password'=>Hash::make('1234'),
            'image'=>'',
            'status'=>1],
            ['id'=>2,
                'name'=>'john',
                'type'=>'subadmin',
                'mobile'=>'98000000000',
                'email'=>'john@admin.com',
                'password'=>Hash::make('1234'),
                'image'=>'',
                'status'=>1],
            ['id'=>3,
                'name'=>'steve',
                'type'=>'subadmin',
                'mobile'=>'98000000000',
                'email'=>'steve@admin.com',
                'password'=>Hash::make('1234'),
                'image'=>'',
                'status'=>1],
            ['id'=>4,
                'name'=>'amit',
                'type'=>'admin',
                'mobile'=>'98000000000',
                'email'=>'amit@admin.com',
                'password'=>Hash::make('1234'),
                'image'=>'',
                'status'=>1],
        ];

        Db::table('admins')->insert($adminRecords);
        /*
        foreach ($adminRecords as $key => $record){
            Admin::create($record);
        }
        */
    }
}
