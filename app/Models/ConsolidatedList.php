<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsolidatedList extends Model
{
    use HasFactory;

    protected $table = 'consolidated_lists';

    protected $fillable = [
        'name',
        'un_list_type',
        'listed_on',
        'comment',
        ];
}
