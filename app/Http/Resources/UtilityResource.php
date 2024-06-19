<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UtilityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //return parent::toArray($request);
        return [            
            'id' => $this->id,      
            'cod' => $this->   cod,     
            'porcentaje_c_v'=>$this->porcentaje_c_v,
            'plataforma_id'=>$this->plataforma_id,
            'codigo_sede'=>$this->codigo_sede,
           'transaccion_id' => $this->transaccion_id,
            'plataforma_id' => $this->plataforma_id,
            'documento_atribucion' => $this->documento_atribucion,
            'porcentaje_participacion' =>$this->porcentaje_participacion,
            'com_adm_s' => $this->com_adm_s,
            'porcentaje_com_adm' => $this->porcentaje_com_adm,
            'pago' => $this->pago,
            'total_a_depositar' =>$this->total_a_depositar,
            'utilidad_neta' => $this->utilidad_neta,
            'porcentaje_base' => $this->porcentaje_base,
            'utilidad_impuesto' =>$this->utilidad_impuesto,
            'impuesto_12' => $this->impuesto_12,
            'utilidad_bruta_100' => $this->utilidad_bruta_100,
            'ruc' => $this->ruc,
            'razon_social' => $this->razon_social,
            'sede' => $this->sede,
            'shop' => $this->shop,
            'administrador' => $this->administrador,
            'periodo' => $this->periodo,
            'juego' => $this->juego,
            'sistema' => $this->sistema
                        
        ];
    }
}



