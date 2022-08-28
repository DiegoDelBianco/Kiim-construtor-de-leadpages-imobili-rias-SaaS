<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateVariable extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'team_id',
        'value',
    ];

/*
name
team_id
value
type
*/



}
