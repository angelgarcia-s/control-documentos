<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrintCardRevision extends Model
{
    use HasFactory;

    protected $table = 'print_card_revisiones';

    protected $fillable = [
        'print_card_id',
        'revision',
        'estado',
        'notas',
        'revisado_por',
        'fecha_revision',
        'pdf_path',
        'historial_revision',
    ];

    public function printCard()
    {
        return $this->belongsTo(PrintCard::class);
    }

    public function revisor()
    {
        return $this->belongsTo(User::class, 'revisado_por');
    }
}
