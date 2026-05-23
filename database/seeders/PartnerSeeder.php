<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Partner;

class PartnerSeeder extends Seeder
{
    public function run(): void
    {
        $partners = [
            ['name' => 'Google', 'logo_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2f/Google_2015_logo.svg/1200px-Google_2015_logo.svg.png'],
            ['name' => 'Microsoft', 'logo_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/44/Microsoft_logo.svg/1200px-Microsoft_logo.svg.png'],
            ['name' => 'Meta', 'logo_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/09/Meta_Platforms_Logo.svg/1200px-Meta_Platforms_Logo.svg.png'],
            ['name' => 'Amazon', 'logo_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a9/Amazon_logo.svg/1200px-Amazon_logo.svg.png'],
            ['name' => 'Apple', 'logo_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/fa/Apple_logo_black.svg/1200px-Apple_logo_black.svg.png'],
        ];

        foreach ($partners as $partner) {
            Partner::firstOrCreate(
                ['name' => $partner['name']],
                ['logo_url' => $partner['logo_url']]
            );
        }
    }
}

