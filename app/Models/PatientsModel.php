<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientsModel extends Model
{
    use HasFactory;
    protected $table = 'patients';
    protected $primaryKey = 'id_patient';
    public $incrementing = true;
    protected $fillable = [
        'photo_path',
        'identification',
        'first_name',
        'last_name',
        'birth_date',
        'gender',
        'phone',
        'cellphone',
        'email',
        'insurance',
        'insurance_number',
        'address',
        'observations',
    ];
    public function insurance()
    {
        return $this->belongsTo(InsuranceModel::class, 'id_insurance');
    }
}
