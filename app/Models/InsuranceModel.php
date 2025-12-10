<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsuranceModel extends Model
{
    use HasFactory;
    protected $table = 'insurances';
    protected $primaryKey = 'id_insurance';
    protected $fillable = [
        'name',
        'state',
    ];
    public function patients()
    {
        return $this->hasMany(PatientsModel::class, 'id_insurance');
    }
}
