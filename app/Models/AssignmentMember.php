<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssignmentMember extends Model
{
    protected $table = 'assignment_member';
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
