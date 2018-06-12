<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
          [
            'name' => 'content',
          ],
          [
            'name' => 'redaktör',
          ],
          [
            'name' => 'faktagranskning',
          ],
          [
            'name' => 'publicerare',
          ]
        ];

        foreach($roles as $role){
          Role::create($role);
        }
      }
  }
