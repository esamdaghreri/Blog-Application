<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate();
        DB::table('posts')->truncate();
        DB::table('comments')->truncate();
        DB::table('comment_replies')->truncate();


        factory(App\User::class, 20)->create()->each(function($user) {
            $user->posts()->save(factory(App\Post::class)->make());
        });

        factory(App\Comment::class, 10)->create()->each(function($comment) {
            $comment->replies()->save(factory(App\CommentReply::class)->make());
        });

        $this->call(RoleTable::class);
        $this->call(DefaultPhoto::class);
        $this->call(Categories::class);
        $this->call(UsersTableSeeder::class);
    }
}
