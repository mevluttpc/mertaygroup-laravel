<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companies = [
            [
                'name' => 'Mertay Group',
                'slug' => 'mertay-group',
                'description' => 'Türkiye\'nin önde gelen teknoloji şirketlerinden biri.',
                'industry' => 'Teknoloji',
                'size' => '201-500',
                'location' => 'İstanbul',
                'email' => 'hr@mertaygroup.com',
                'phone' => '+90 212 555 0123',
                'website' => 'https://mertaygroup.com',
                'is_verified' => true
            ],
            [
                'name' => 'Tech Solutions',
                'slug' => 'tech-solutions',
                'description' => 'Yenilikci yazılım çözümleri sunan şirket.',
                'industry' => 'Yazılım',
                'size' => '51-200',
                'location' => 'Ankara',
                'email' => 'jobs@techsolutions.com',
                'phone' => '+90 312 555 0456',
                'website' => 'https://techsolutions.com',
                'is_verified' => true
            ],
            [
                'name' => 'Creative Agency',
                'slug' => 'creative-agency',
                'description' => 'Kreatif tasarım ve pazarlama ajansı.',
                'industry' => 'Pazarlama',
                'size' => '11-50',
                'location' => 'İzmir',
                'email' => 'design@creative.com',
                'phone' => '+90 232 555 0789',
                'website' => 'https://creativeagency.com',
                'is_verified' => false
            ]
        ];

        foreach ($companies as $company) {
            \App\Models\Company::create($company);
        }
    }
}
