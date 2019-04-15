<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ContactsSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\Contact');
        for($i = 1 ; $i <= 20 ; $i++) {
            DB::table('contacts')->insert([
                'civilite' => $this->civilite(),
                'nom' => $faker->firstName,
                'prenom' => $faker->lastName,
                'fonction' => $faker->jobTitle,
                'service' => $faker->userAgent,
                'email' => $faker->email,
                'telephone' => $faker->phoneNumber,
                'date_naissance' => \Carbon\Carbon::now(),
                'societe_nom' => $faker->title,
                'societe_adresse' => $faker->address,
                'societe_code_postal' => $faker->randomDigit,
                'societe_ville' => $faker->city,
                'societe_telephone' => $faker->phoneNumber,
                'societe_site_web' => "https://www.".$faker->domainName,
            ]);
        }
    }

    public function civilite() {
        $str = str_shuffle('FMFMFM');
        return $str[0];
    }
}
