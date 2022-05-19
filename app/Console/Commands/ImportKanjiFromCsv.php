<?php

namespace App\Console\Commands;

use App\Http\Controllers\KanjiController;
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
        $kanjiController = new KanjiController();
        $kanjiController->importCsv();
        return 0;
    }
}
