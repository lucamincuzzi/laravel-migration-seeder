<?php

namespace Database\Seeders;

use App\Models\Train;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TrainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $_orario_partenza = $faker->dateTimeBetween('0 day', '+1 week');
        $_nome_azienda = $faker->randomElement(['Trenitalia', 'Italo', 'ITrenì']);

        function codiceTreno($_nome_azienda) {
            if($_nome_azienda === 'Trenitalia') {
                return '######';
            } elseif ($_nome_azienda === 'Italo') {
                return '####';
            } else {
                return '###';
            }
        };

        $train = new Train();
        $train->azienda = $_nome_azienda;
        $train->stazione_di_partenza = $faker->word();
        $train->stazione_di_arrivo = $faker->word();
        $train->orario_partenza = $_orario_partenza;
        $train->orario_arrivo = $faker->dateTimeBetween($_orario_partenza, '+1 week');
        $train->codice_treno = $faker->numerify(codiceTreno($_nome_azienda));
        $train->n_carrozze = $faker->numberBetween(5, 7);
        $train->in_orario = $faker->numberBetween(0, 1);
        $train->cancellato = $faker->numberBetween(0, 1);

        $train->save();
    }
}
