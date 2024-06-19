<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
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
            'porcentaje_c_v' => $this->porcentaje_c_v,
            'plataforma_id'  => $this->plataforma_id,
            'codigo_sede'  => $this->codigo_sede               
        ];
    }
}
