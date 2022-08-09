<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PericiandoVivoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $array = parent::toArray($request);
        $endereco = [...$this->endereco->toArray(), 'tipoEndereco' => $this->endereco->tipoEndereco];
        return [...$array, 'endereco' => $endereco];
    }
}
