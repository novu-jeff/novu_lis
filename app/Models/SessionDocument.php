<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SessionDocument extends Model
{
    protected $connection = 'cms_mysql';

    protected $table = 'session_documents';

    public function document()
    {
        return $this->belongsTo(MemberDocument::class,'document_id');
    }
}
