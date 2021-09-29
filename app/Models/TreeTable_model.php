<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class TreeTable_model extends Model
{
    use NodeTrait;
    protected $table = 'tree_table';
    protected $primarykey = 'id';

    protected $fillable = [
    	'name',
    	'id_user'
    ];
}
