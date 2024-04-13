<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class GeneralComment extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'general_comments';

    /**
     * The primary key associated with the table.
     *
     * @var int
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string, text>
     */
    protected $fillable = [
        'name',
        'email',
        'comment',
    ];
}
