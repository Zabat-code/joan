<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StadistictModel extends Model
{
    use HasFactory;
    protected $table = 'stadisticts';
    protected $fillable = [
        'type',
        'name',
        'id_document_header',
        'total_patients',
        'total_insurances',
        'values',
        'date_resume',
    ];
}
