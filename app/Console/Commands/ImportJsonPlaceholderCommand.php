<?php

namespace App\Console\Commands;

use App\Components\ImportDataClient;
use App\Models\Post;
use Illuminate\Console\Command;

class ImportJsonPlaceholderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:json-placeholder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get data from json placeholder';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $import = new ImportDataClient();
        $response = $import->client->request('GET', 'posts');
        $data = json_decode($response->getBody()->getContents());

        foreach ($data as $item) {
            Post::firstOrCreate([
                'title' => 'Mandarine',
            ],
            [
                'title' => $item->title,
                'content' => $item->body,
                'category_id'=> rand(1, 10),
                'image' => 'https://picsum.photos/640/480?random=' . rand(1, 1000),
            ]);
        }
    }
}
