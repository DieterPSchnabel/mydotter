<?php

namespace App\Models\Admintests;

use Illuminate\Database\Eloquent\Model;

class Larapack extends Model
{
    //

    protected $fillable = ['tag1','tag2','tag3','install_str','git_url', 'doc_url','is_installed','description'];

    protected $casts = [
        //'is_installed' => 'boolean',
    ];
}
