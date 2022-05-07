<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class Empresa extends Model
{
    use HasFactory;

    protected $fillable = [
        'cnpj',
        'razao',
        'fantasia',
        'tipo',
        'endereco',
        'numero',
        'complemento',
        'bairro',
        'cidade',
        'uf',
        'cep',
        'pais_origem',
        'telefone_1',
        'telefone_2',
        'email',
        'cnae_principal',
        'cnae_secundario',
        'matriz_filial',
        'situacao',
        'data_situacao',
        'natureza_juridica',
        'data_inicio_atv',
        'opcao_mei',
        'porte_empresa',
        'data_exclusao',
        'regime_tributario',
        'data_opcao_simples',
        'capital_social',
        'id_socio',
        'nome_socio',
        'cpf_socio',
        'qualificacao',
        'data_entrada',
        'faturamento_estimado',
        'qd_funcionarios',
        'dividas_federais',
        'ativas',
    ];
}
