<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Roof;
use App\Models\Material;
use App\Models\Photos;

class Project extends Model
{
    use HasFactory;

    protected $table = 'projects';
    protected $guarded = false;

    protected $allowedSorts = [
        'name'
    ];
    protected $allowedFilters = [
        'name'
    ];

    public function material()
    {
        return $this->hasOne(Material::class, 'id', 'material')->first()->name;
    }

    public function roof()
    {
        return $this->hasOne(Roof::class, 'id', 'roof')->first()->name;
    }

    public function photos()
    {
        return $this->hasMany(Photos::class)->get();
    }
}
