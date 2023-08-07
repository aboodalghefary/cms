<?php

namespace App\Jobs;

use App\Models\Blog;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateBlogStatus implements ShouldQueue
{
   use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
   /**
    * Create a new job instance.
    *
    * @return void
    */
   public function __construct()
   {
   }


   /**
    * Execute the job.
    *
    * @return void
    */
   public function handle()
   {
      Blog::where('scheduled_at', '<=', now())
         ->where('status', 'scheduled')
         ->update(['status' => 'posted']);
   }
}
