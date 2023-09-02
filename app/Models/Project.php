<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Project extends Model
{
    use HasFactory;
    use AsSource;
    use Filterable;
    use Attachable;

    protected $table = 'projects';
    protected $guarded = false;

    protected $allowedSorts = [
        'name'
    ];
    protected $allowedFilters = [
        'name'
    ];
}
