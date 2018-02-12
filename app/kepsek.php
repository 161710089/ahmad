<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kepsek extends Model
{
    protected $table = 'kepseks';
    protected $fillable = ['nama','nama_sekolah'];
    public $timestamps = true;
}
