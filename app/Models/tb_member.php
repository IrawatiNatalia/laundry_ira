<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_member extends Model
{
    use HasFactory;
    protected $table = "tb_member";
    protected $primaryKey = "id";
    public $incrementing = false;
    protected $keyType = "string";
    protected $fillable = ['nama', 'jenis_kelamin', 'alamat', 'tlp'];
}
