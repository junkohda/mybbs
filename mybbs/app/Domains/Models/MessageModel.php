<?php

namespace App\Domains\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageModel extends Model
{
    use HasFactory;

    protected $table = 'messages';

    public $incrementing  = true;

    protected $primaryKey = 'post_id';

    protected $guarded = ['created_at'];

    protected $hidden = [
    ];

    protected $dates = [
        'created_at'
    ];

    /**
     * 暗号化・複合化対象Columns
     *
     * @var array
     */
    protected $encryptable = [
    ];

    /**
     * UUID Columns
     */
    protected $uuids = [
    ];
}
