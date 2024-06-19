<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utility extends Model
{
    use HasFactory;

    protected $table = 'utilidad'; // Nombre de la tabla en la base de datos

    protected $fillable = [   
        'id'=>'',
        'porcentaje_c_v'=>''	,
        'plataforma_id'=>'',
        'codigo_sede'=>'' ,   
       'transaccion_id' => '',
        'plataforma_id' => '',
        'documento_atribucion' => '',
        'porcentaje_participacion' =>'' ,
        'com_adm_s' => '',
        'porcentaje_com_adm' => '',
        'pago' => '',
        'total_a_depositar' =>'' ,
        'utilidad_neta' => '',
        'porcentaje_base' => '',
        'utilidad_impuesto' =>'' ,
        'impuesto_12' => '',
        'utilidad_bruta_100' => '',
        'ruc' => '',
        'razon_social' => '',
        'sede' => '',
        'shop' => '',
        'administrador' => '',
        'periodo' => '',
        'juego' => '',
        'sistema' => '',
        'cod' => '',        
    ];
    
   

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at'=>'datetime'
    ];

    protected $primaryKey = 'ID'; // Nombre de la clave primaria
}
