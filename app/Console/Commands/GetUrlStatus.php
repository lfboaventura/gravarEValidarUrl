<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Traits\GetUrlStatusTrait;


class GetUrlStatus extends Command
{
    use GetUrlStatusTrait;


    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'getUrl:urlStatus';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comando para testar status url tabela url, gravando o status na tabela urlStatus';

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
    public function handle()
    {
        $this->getStatus();

    }
}
