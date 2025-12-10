<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentValueModel extends Model
{
    use HasFactory;
    protected $table = 'document_values';
    protected $primaryKey = 'id_document_value';
    protected $fillable = [
        'values',
        'id_document_body',
        'order',
    ];
    public function body()
    {
        return $this->belongsTo(DocumentBodyModel::class, 'id_document_body');
    }
}
