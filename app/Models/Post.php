<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Symfony\Component\Finder\SplFileInfo;

class Post
{
    public function __construct(public string $title, public string $slug, public string $excert, public string $body,  public $date)
    {
        $this->title = $title;
        $this->slug = $slug;
        $this->excert = $excert;
        $this->body = $body;
        $this->date = $date;
    }

    public static function find(string $slug): Post|null
    {
        return static::all()->firstWhere('slug', '=', $slug);
    }

    public static function all()
    {
        return Cache::rememberForever('post.all', function () {
            return collect(File::allFiles(resource_path("posts")))
                ->map(fn ($file) => YamlFrontMatter::parseFile($file->getPathname()))
                ->map(fn ($document) => new Post($document->title, $document->slug, $document->excert, $document->body(), $document->date))
                ->sortByDesc('date');
        });
    }
}
