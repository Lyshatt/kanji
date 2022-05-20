<?php

namespace App\Console\Commands;

use App\Http\Controllers\ImportController;
use Illuminate\Console\Command;

class ImportKanjiFromCsv extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kanji:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $importController = new ImportController();
        $importController->importCsv();
        return 0;
    }
}
