<?php

namespace App\Models\Larapacks;

use Illuminate\Database\Eloquent\Model;

class Larapack extends Model
{
    //

    protected $fillable = ['tag1','tag2','tag3','install_str','git_url', 'doc_url','important','is_installed','description','pt_title','pt_link'];

    protected $casts = [
        //'is_installed' => 'boolean',
    ];
}
