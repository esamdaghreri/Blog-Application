<?php

use Illuminate\Database\Seeder;
use App\Photo;

class DefaultPhoto extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $photo = new Photo();
        $photo->file = 'default.jpg';
        $photo->save();
    }
}
