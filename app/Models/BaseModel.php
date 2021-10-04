<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BaseModel extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'id';
    
    protected $guarded = [
        'id', 'active', 'idCombo',
    ];

    protected $dates = [
        'created_at', 'updated_at', 'deleted_at', 
    ];

    public function getFormattedActiveAttribute(){
        $active = $this->attributes['active'];
        return $active = 1 ? 'Ativo' : 'Inativo';
    }

    public function arrayTypePerson($typePerson = null){
        $opTypePerson = [
            'J' => 'Jurídica',
            'F' => 'Física',
        ];

        if (!$typePerson){
            return $opTypePerson;
        }

        return $opTypePerson[$typePerson];
    }

    public function arrayIntegerInOut($in = 0, $out = 0){
        $array = [];
        for ($i = $in; $i <= $out ; $i++) { 
            $array[$i] = $i < 10 ? ( '0' . $i) : strval($i);
        }
        return $array;
    }

    public function arrayGenre($genre = null){
        $opGenre = [
            'M' => 'Masculino',
            'F' => 'Feminino',
        ];

        if (!$genre){
            return $opGenre;
        }

        return $opGenre[$genre];
    }

    public static function setFormatValue($value){
        $value = str_replace('.', '', $value);
        $value = str_replace(',', '.', $value);
        return $value;
    }

    public static function getFormatValue($value, $decimal = 2){
        return number_format($value,$decimal,',','.');
    }

    public function convertDateDMY($date){
        if ( empty($date) ){
            return null;
        }
        return \Carbon\Carbon::parse($date)->format('d/m/Y');
    }
    
}
