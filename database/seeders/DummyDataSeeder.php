<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Media;
use App\Models\Post;
use App\Models\Like;
use App\Models\Comment;
use File;

class DummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = storage_path('app/public/post-photos');

        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true, true);
        }
        
        User::factory(4)->create()->each(function ($user) {
            Post::factory(random_int(1, 10))->create(['user_id'=>$user->id])->each(function ($post) use ($user) {
                Media::factory()->create(['post_id'=>$post->id]);
            });
        });
        
        $this->call(LikeSeeder::class);
        $this->call(CommentSeeder::class);
    }
}
