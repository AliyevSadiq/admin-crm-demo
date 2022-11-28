<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clients = Client::all();
        Company::all()->each(function ($company) use ($clients) {
            $company->clients()->attach(
                $clients->random(rand(1,100))->pluck('id')->toArray()
            );
        });
    }
}
