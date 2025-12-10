<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentBodyModel extends Model
{
    use HasFactory;
    protected $table = 'document_bodys';
    protected $primaryKey = 'id_document_body';
    protected $fillable = [
        'label',
        'code',
        'format',
        'id_document_header',
        'order',
        'format_type',
        'type',
        'required',
    ];
    public function header()
    {
        return $this->belongsTo(DocumentHeaderModel::class, 'id_document_header');
    }

}
