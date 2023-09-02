<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Orchid\Attachment\Attachable;
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

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    protected $allowedSorts = [
        'title'
    ];
    protected $allowedFilters = [
        'title'
    ];

    # Ссылка на обложку для статьи
    public function poster() {
        $poster = DB::table('attachments')
            ->join('attachmentable', 'attachments.id', '=', 'attachmentable.attachment_id')
            ->where('group', '=', 'poster')
            ->where('attachmentable_id', '=', $this->attributes['id'])
            ->first();
        return '/storage/' . $poster->path . $poster->name . ".{$poster->extension}";
    }
}
