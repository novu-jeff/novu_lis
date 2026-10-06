<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MemberDocument extends Model
{
    protected $connection = 'mysql';
    protected $table = 'member_documents';
    protected $fillable = [
        'member_id',
        'title',
        'description',
        'member_account_id',
        'file_name',
        'file_path',
        'status',
        'remarks',
        'session_id',
        'agenda_order'
    ];

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }

    public function memberAccount()
    {
        return $this->belongsTo(MembersAccount::class, 'member_account_id');
    }

    public function documentRemarks()
    {
        return $this->hasMany(DocumentRemark::class,'document_id');
    }
}

    