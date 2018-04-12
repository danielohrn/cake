<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
          [
            'name' => 'konst',
          ],
          [
            'name' => 'ställa ut',
          ],
          [
            'name' => 'permanent konst',
          ],
          [
            'name' => 'tillfällig konst',
          ],
          [
            'name' => 'stadsutveckling',
          ],
          [
            'name' => 'offentliga rummet',
          ],
          [
            'name' => 'arkitekt',
          ],
          [
            'name' => 'curator',
          ],
          [
            'name' => 'boendemiljö',
          ],
          [
            'name' => 'nyheter',
          ],
        ];

        foreach($tags as $tag){
          Tag::create($tag);
        }
      }
  }
