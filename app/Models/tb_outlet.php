<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_outlet extends Model
{
    use HasFactory;
    protected $table = "tb_outlet";
    protected $primaryKey = "id";
    public $incrementing = false;
    protected $keyType = "string";
    protected $fillable = ['nama', 'alamat', 'tlp'];
}
