<?php

namespace App\Models;

use App\Classes\UrlGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Secret_codes extends Model
{
    use HasFactory;

    protected $fillable = [
        'url_id', 'code',
    ];

    public $timestamps = false;

    public function scopeCode($q, $code)
    {
        return $q->where('code', $code);
    }

    public function stats()
    {
        return $this->hasMany(Statisticts::class, 'url_id', 'url_id');
    }

    public function short()
    {
        return $this->hasOne(Short_urls::class, 'id', 'url_id');
    }

    public function getStatsUrlAttribute()
    {
        $shorlUrl = new UrlGenerator();
        return  $shorlUrl->createStatsLink($this->code);
    }
}
