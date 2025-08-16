<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobListingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jobs = [
            [
                'title' => 'Senior Laravel Developer',
                'slug' => 'senior-laravel-developer-1',
                'description' => 'Deneyimli Laravel developer aranıyor. Modern web uygulamaları geliştirmek için ekibimize katılın. Mikroservis mimarisi ve API geliştirme deneyimi tercih sebebidir.',
                'company_id' => 1,
                'category_id' => 1,
                'company_name' => 'Mertay Group',
                'location' => 'İstanbul',
                'job_type' => 'full-time',
                'work_type' => 'hybrid',
                'salary_min' => 18000,
                'salary_max' => 28000,
                'experience_level' => 'senior',
                'requirements' => 'PHP, Laravel, MySQL, JavaScript, Git, Docker, AWS bilgisi gerekli',
                'contact_email' => 'hr@mertaygroup.com',
                'deadline' => now()->addDays(30),
                'skills' => ['PHP', 'Laravel', 'MySQL', 'JavaScript', 'Git', 'Docker'],
                'benefits' => ['Sağlık Sigortası', 'Yemek Kartı', 'Esnek Çalışma', 'Eğitim Desteği'],
                'is_featured' => true,
                'is_urgent' => false
            ],
            [
                'title' => 'React Frontend Developer',
                'slug' => 'react-frontend-developer-1',
                'description' => 'Modern React uygulamaları geliştirecek deneyimli frontend developer aranıyor. TypeScript ve Next.js deneyimi artı puan.',
                'company_id' => 2,
                'category_id' => 1,
                'company_name' => 'Tech Solutions',
                'location' => 'Ankara',
                'job_type' => 'full-time',
                'work_type' => 'remote',
                'salary_min' => 14000,
                'salary_max' => 22000,
                'experience_level' => 'mid',
                'requirements' => 'React, TypeScript, Next.js, HTML, CSS, JavaScript',
                'contact_email' => 'jobs@techsolutions.com',
                'deadline' => now()->addDays(25),
                'skills' => ['React', 'TypeScript', 'Next.js', 'HTML', 'CSS'],
                'benefits' => ['Uzaktan Çalışma', 'Esnek Saatler', 'Yemek Kartı'],
                'is_featured' => false,
                'is_urgent' => true
            ],
            [
                'title' => 'UI/UX Tasarımcı',
                'slug' => 'ui-ux-tasarimci-1',
                'description' => 'Kullanıcı deneyimi odaklı tasarımlar yapacak kreatif tasarımcı aranıyor.',
                'company_id' => 3,
                'category_id' => 6,
                'company_name' => 'Creative Agency',
                'location' => 'İzmir',
                'job_type' => 'full-time',
                'work_type' => 'office',
                'salary_min' => 12000,
                'salary_max' => 18000,
                'experience_level' => 'mid',
                'requirements' => 'Figma, Adobe XD, Photoshop, Illustrator, Prototyping',
                'contact_email' => 'design@creative.com',
                'deadline' => now()->addDays(20),
                'skills' => ['Figma', 'Adobe XD', 'Photoshop', 'Illustrator'],
                'benefits' => ['Kreatif Ortam', 'Yemek Kartı', 'Sosyal Aktiviteler'],
                'is_featured' => true,
                'is_urgent' => false
            ],
            [
                'title' => 'Dijital Pazarlama Uzmanı',
                'slug' => 'dijital-pazarlama-uzmani-1',
                'description' => 'SEM, SEO ve sosyal medya pazarlaması konusunda deneyimli uzman aranıyor.',
                'company_id' => 1,
                'category_id' => 2,
                'company_name' => 'Mertay Group',
                'location' => 'İstanbul',
                'job_type' => 'full-time',
                'work_type' => 'hybrid',
                'salary_min' => 10000,
                'salary_max' => 16000,
                'experience_level' => 'mid',
                'requirements' => 'Google Ads, Facebook Ads, SEO, Analytics, Content Marketing',
                'contact_email' => 'hr@mertaygroup.com',
                'deadline' => now()->addDays(15),
                'skills' => ['Google Ads', 'Facebook Ads', 'SEO', 'Analytics'],
                'benefits' => ['Performans Primi', 'Eğitim Desteği', 'Esnek Çalışma'],
                'is_featured' => false,
                'is_urgent' => false
            ],
            [
                'title' => 'DevOps Engineer',
                'slug' => 'devops-engineer-1',
                'description' => 'AWS ve Kubernetes deneyimi olan DevOps engineer aranıyor.',
                'company_id' => 2,
                'category_id' => 1,
                'company_name' => 'Tech Solutions',
                'location' => 'Ankara',
                'job_type' => 'full-time',
                'work_type' => 'remote',
                'salary_min' => 20000,
                'salary_max' => 30000,
                'experience_level' => 'senior',
                'requirements' => 'AWS, Kubernetes, Docker, CI/CD, Terraform, Linux',
                'contact_email' => 'jobs@techsolutions.com',
                'deadline' => now()->addDays(35),
                'skills' => ['AWS', 'Kubernetes', 'Docker', 'Terraform', 'Linux'],
                'benefits' => ['Yüksek Maaş', 'Uzaktan Çalışma', 'Teknik Eğitimler'],
                'is_featured' => true,
                'is_urgent' => true
            ]
        ];

        foreach ($jobs as $job) {
            \App\Models\JobListing::create($job);
        }
    }
}
