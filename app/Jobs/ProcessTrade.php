<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessTrade implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $trade;
    protected $tries = 2;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($ticket_id)
    {
        //
        $this->trade = $ticket_id;
        
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //执行业务逻辑
        var_dump($this->trade->trade);
        throw new Exception($this->trade->trade, "执行失败");
        
    }

    public function failed(Exception $exception)
    {
        var_dump('失败的任务');
    }
}
