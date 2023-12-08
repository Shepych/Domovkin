<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Article extends Model
{
    use HasFactory;
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
}
