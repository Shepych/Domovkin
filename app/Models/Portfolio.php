<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Portfolio extends Model
{
    use HasFactory;

    protected $table = 'portfolio';
    protected $guarded = false;

    public function type() {
        return DB::table('portfolio_types')->where('id', $this->type_id)->first()->name;
        // return $this->hasOne(Material::class, 'id', 'material')->first()->name;
    }

    public function photos() {
        return DB::table('portfolio_photos')->where('portfolio_id', $this->id)->get();
    }
}
