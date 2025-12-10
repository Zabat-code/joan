<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientsModel extends Model
{
    use HasFactory;
    protected $table = 'patients';
    protected $fillable = [
        'name',
        'born_date',
        'sex',
        'address',
        'id_insurances',
        'type_identification',
        'identification',
        'telephone',
        'cellphone',
        'email',
        'state',
    ];
    public function insurance()
    {
        return $this->belongsTo(InsuranceModel::class, 'id_insurance');
    }
}
