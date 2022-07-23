<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\TestCount;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
  
class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $test = TestCount::create([
            'count' => 25,
            'test_time' => 25
        ]);

        $test = TestCount::create([
            'count' => 5,
            'test_time' => 5
        ]);

        $user = User::create([
            'name' => 'Administrator', 
            'phone' => '(97)-722-66-56',
            'address' => 'Demo Admin',
            'post_id' => '1',
            'password' => bcrypt('123456')
        ]);
    
        $role = Role::create(['name' => 'Admin']);
     
        $permissions = Permission::pluck('id','id')->all();
   
        $role->syncPermissions($permissions);
     
        $user->assignRole([$role->id]);
    }
}