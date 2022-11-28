<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Client
 * @package App\Models
 * @property string full_name
 */
class Client extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $hidden = ['pivot'];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s'
    ];

    public function companies()
    {
        return $this->belongsToMany(Company::class);
    }

    public function setFullName(string $full_name): self
    {
        $this->full_name = $full_name;
        return $this;
    }

    public function getFullName(): string
    {
        return $this->full_name;
    }
}
