<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
        	'name' => 'Budi', 
        	'email' => 'budi@trackux.com',
        	'password' => bcrypt('123456')
        ]);
  
        $role = Role::create(['name' => 'User']);
   
        $role->givePermissionTo('product-list', 'post-list', 'comment-list', 'comment-create');
   
        $user->assignRole([$role->id]);
    }
}
