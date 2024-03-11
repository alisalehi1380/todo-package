<?php

namespace AliSalehi\Task\Console\Commands;

use AliSalehi\Task\Jobs\SendTaskDueJob;
use Illuminate\Console\Command;

class TaskCommand extends Command
{
    protected $signature = 'schedule:tasks';
    protected $description = 'Schedule tasks due within the next 24 hours';
    
    public function handle()
    {
        SendTaskDueJob::dispatch();
        
        $this->info('Scheduled tasks due within the next 24 hours.');
    }
}
