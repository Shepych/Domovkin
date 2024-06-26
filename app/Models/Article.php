<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $table = 'articles';
    protected $guarded = false;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public function poster() {
        if(env('DEV') == 'true') {
            $link = "$this->img";
        } else {
            $link = "/storage/articles/$this->folder/$this->id/$this->img";
        }
        return $link;
    }
}
