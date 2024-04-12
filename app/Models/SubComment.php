<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubComment extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sub_comments';

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
        'general_comment_id',
        'name',
        'email',
        'page',
        'captcha',
        'text',
    ];
}
