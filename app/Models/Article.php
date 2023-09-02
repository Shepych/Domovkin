<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Attachment\Models\Attachment;
use Orchid\Attachment\Models\Attachmentable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Article extends Model
{
    use HasFactory;
    use AsSource;
    use Filterable;
    use Attachable;


    protected $table = 'articles';
    protected $guarded = false;

    protected $allowedSorts = [
        'title'
    ];
    protected $allowedFilters = [
        'title'
    ];

    public function poster() {
        return $this->hasOne(Attachment::class, 'attachmentable_id', 'id');
    }
}
