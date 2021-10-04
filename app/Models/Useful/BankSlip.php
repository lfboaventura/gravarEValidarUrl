<?php

namespace App\Models\Useful;

use Illuminate\Database\Eloquent\Model;

class BankSlip extends Model
{
    protected $fillable = [
        'nosso_numero',
        'numero_documento',
        'data_vencimento',
        'data_documento',
        'data_processamento',
        'valor_boleto',
        
        'sacado',
        'endereco1',
        'endereco2',
        
        'demonstrativo1',
        'demonstrativo2',
        'demonstrativo3',
        'instrucoes1',
        'instrucoes2',
        'instrucoes3',
        'instrucoes4',
        
        'quantidade',
        'valor_unitario',
        'aceite',
        'especie',
        'especie_doc',
        
        'agencia',
        'conta',
        'conta_dv',
        
        'carteira',
        
        'identificacao',
        'cpf_cnpj',
        'endereco',
        'cidade_uf',
        'cedente',
    ];

    public static function sessionBankSlip()
    {
        $bankSlip = \Session::get('bankSlip');
        if ( !empty($bankSlip) ) {
            return $bankSlip;
        }
        return null;
   }

}
