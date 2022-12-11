<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class WordleImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        $collection->filter(function ($row) {
            return $row['ian'] > 0
                && $row['liz'] > 0
                && $row['rob'] > 0
                && $row['susan'] > 0
                && $row['alex'] > 0;
        })->each(function ($row) {

            User::whereName('Ian')->first()
                ->wordleScores()
                ->create(['score' => $row['ian'], 'game_id' => $row[0]]);

            User::whereName('Liz')->first()
            ->wordleScores()
            ->create(['score' => $row['liz'], 'game_id' => $row[0]]);

            User::whereName('Rob')->first()
            ->wordleScores()
            ->create(['score' => $row['rob'], 'game_id' => $row[0]]);

            User::whereName('Susan')->first()
            ->wordleScores()
            ->create(['score' => $row['susan'], 'game_id' => $row[0]]);

            User::whereName('Alex')->first()
            ->wordleScores()
            ->create(['score' => $row['alex'], 'game_id' => $row[0]]);

        });
    }
}
