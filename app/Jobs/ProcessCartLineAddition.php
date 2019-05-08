<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ProcessCartLineAddition implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * The cart line that has just been added.
     *
     * @var [type]
     */
    protected $cartLine;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($cartLine)
    {
        $this->cartLine = $cartLine;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        sleep(5);
    }
}
