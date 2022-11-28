<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Company
 * @package App\Models
 * @property string title
 */
class Company extends Model
{
    use HasFactory;

    protected $guarded=[];

    protected $hidden = ['pivot'];

    protected $casts=[
        'created_at'=>'datetime:Y-m-d H:i:s'
    ];

    public function clients()
    {
        return $this->belongsToMany(Client::class);
    }

    public function setTitle(string $title): self
    {
        $this->title=$title;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}
