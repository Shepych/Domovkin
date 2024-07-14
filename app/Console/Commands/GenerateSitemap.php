<?php

namespace App\Console\Commands;

use App\Models\Article;
use App\Models\Portfolio;
use App\Models\Project;
use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Генерация sitemap.xml';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // SitemapGenerator::create(config('app.url'))
        //     ->writeToFile(public_path('sitemap.xml'));

        $sitemap = Sitemap::create();

        $sitemap->add(Url::create('/'));
        $sitemap->add(Url::create('/projects'));
        $sitemap->add(Url::create('/articles'));
        $sitemap->add(Url::create('/services'));
        $sitemap->add(Url::create('/portfolio'));

        $articles = Article::all();
        foreach ($articles as $page) {
            $sitemap->add(Url::create("/articles/{$page->slug}"));
        }

        $projects = Project::all();
        foreach ($projects as $page) {
            $sitemap->add(Url::create("/projects/{$page->id}"));
        }

        $portfolio = Portfolio::all();
        foreach ($portfolio as $page) {
            $sitemap->add(Url::create("/portfolio/{$page->id}"));
        }

        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap generated successfully.');
    }
}
