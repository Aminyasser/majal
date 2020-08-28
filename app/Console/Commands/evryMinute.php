<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Like;
use App\Story;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
class evryMinute extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete-story';

    public function handle()
    {
        $posts = Story::whereDate('created_at', '<=', Carbon::now()->subDay())->delete();

        // DB::table('posts')->where('created_at', '>', Carbon::now()->subDay())->delete();
    }
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'like del';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */


}
