<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentHeaderModel extends Model
{
    use HasFactory;
    protected $table = 'document_headers';
    protected $primaryKey = 'id_document_header';
    protected $fillable = [
        'name',
        'description',
        'state',
    ];
    public function bodys()
    {
        return $this->hasMany(DocumentBodyModel::class, 'id_document_header');
    }
}
