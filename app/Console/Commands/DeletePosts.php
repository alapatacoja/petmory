<?php

namespace App\Console\Commands;
use Illuminate\Support\Carbon;
use App\Models\Post;
use Illuminate\Console\Command;

class DeletePosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-posts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete expired posts';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $posts = Post::where('type', 'daily')->where('created_at', '<=', Carbon::now()->subDay())->delete();
        foreach($posts as $post){
            $post->delete();
        }

    }
}
