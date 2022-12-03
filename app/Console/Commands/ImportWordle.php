<?php

namespace App\Console\Commands;

use App\Imports\WordleImport;
use App\Models\WordleScore;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class ImportWordle extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wordle:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import the wordle scores';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        WordleScore::truncate();

        Excel::import(new WordleImport, storage_path('Wordle.xlsx'));

        return Command::SUCCESS;
    }
}
