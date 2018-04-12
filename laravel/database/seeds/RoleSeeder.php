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
            'name' => 'konstnär',
            'url' => '/kostnär',
            'color' => '#4286f4'
          ],
          [
            'name' => 'politiker',
            'url' => '/politiker',
            'color' => '#d81e6f'
          ],
          [
            'name' => 'tjänsteman',
            'url' => '/tjansteman',
            'color' => '#ffc107'
          ],
          [
            'name' => 'byggbolag',
            'url' => '/byggbolag',
            'color' => '#20c997'
          ],
          [
            'name' => 'beställare',
            'url' => '/bestallare',
            'color' => '#6f42c1'
          ],
          [
            'name' => 'utförare',
            'url' => '/utforare',
            'color' => '#6c757d'
          ],
          [
            'name' => 'arkitekt',
            'url' => '/arkitekt',
            'color' => '#28a745'
          ],
          [
            'name' => 'curator',
            'url' => '/curator',
            'color' => '#fd7e14'
          ],

        ];

        foreach($roles as $role){
          Role::create($role);
        }
      }
  }
