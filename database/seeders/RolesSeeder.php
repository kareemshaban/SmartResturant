<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name_ar'=>'البيانات الأساسية', 'name_en'=> 'Basic Data'],
            ['name_ar'=>'الموظفين', 'name_en'=> 'Employees'],
            ['name_ar'=>'العملاء', 'name_en'=> 'Clients'],
            ['name_ar'=>'المورديين', 'name_en'=> 'Suppliers'],
            ['name_ar'=>'الأصناف', 'name_en'=> 'Items'],
            ['name_ar'=>'الشيفتات', 'name_en'=> 'Shifts'],
            ['name_ar'=>'نقطة الببع', 'name_en'=> 'POS'],
            ['name_ar'=>'الإعدادات', 'name_en'=> 'Settings'],
            ['name_ar'=>'الصلاحيات', 'name_en'=> 'Roles'],
            ['name_ar'=>'الحسابات', 'name_en'=> 'Accountancy'],
            ['name_ar'=>'التقارير', 'name_en'=> 'Reports'],
        ];


        DB::table('rolses')->insert( $data);
    }
}
