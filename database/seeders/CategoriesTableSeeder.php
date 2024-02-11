<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Spatie\Permission\Models\Permission;


class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        Category::create([
            'id' => 1,
            'name' => 'Home',
            'parent_category_id' => null,
            'user_id' => null,
        ]);
        // Permission::create(['name' => 'file_upload']);
        // Permission::create(['name' => 'file_sharing']);
        // Permission::create(['name' => 'reminder_own']);
        // Permission::create(['name' => 'reminder_with_user']);
        // Permission::create(['name' => 'rename']);
        // Permission::create(['name' => 'comment']);
        // Permission::create(['name' => 'view']);
        // Permission::create(['name' => 'download']);
        // Permission::create(['name' => 'add_role']);
        // Permission::create(['name' => 'view_user_list']);
        // Permission::create(['name' => 'manage_pending_list']);
        // Permission::create(['name' => 'view_user_list']);
    }
}
