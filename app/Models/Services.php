<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'type_id',
        'price'
    ];

    public function category() {
        return $this->belongsTo(ServiceCategory::class);
    }

    public function type() {
        return $this->belongsTo(ServiceType::class, 'type_id');
    }
}
