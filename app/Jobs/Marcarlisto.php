<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use Excel;
use DB;
use File;
use Log;
class Marcarlisto implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $id1;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->id1=$id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
            $INFO=DB::table('listaEncuestados')->where('idLista','=',$this->id1)
                                       ->update(['carga'=> 1]);
    }
}
