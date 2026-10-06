<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\SessionDocument;


class SessionMeeting extends Model
{
    protected $connection = 'cms_mysql';

    protected $table = 'session_meetings';

    protected $fillable = [
        'title',
        'session_date',
        'status'
    ];

    public function documents()
    {
        return $this->hasMany(SessionDocument::class);
    }
}
