<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Modelo para dados pessoais reutilizáveis (clientes, funcionários, fornecedores).
 * Comentários em PT-BR conforme convenção do repositório.
 */
class Person extends Model
{
    use SoftDeletes;

    protected $table = 'people';

    /**
     * Campos preenchíveis.
     * @var array<string>
     */
    protected $fillable = [
        'name',
        // fiscal_document stored in DB (can be CPF, CNPJ, etc.)
        'fiscal_document',
        'phone',
        'email',
        // Structured address fields
        'street',
        'neighborhood',
        'city',
        'state',
        'postal_code',
        'person_type',
    ];

    /**
     * Relacionamento para a conta de usuário, quando existir.
     */
    public function user()
    {
        return $this->hasOne(User::class, 'person_id');
    }
}
