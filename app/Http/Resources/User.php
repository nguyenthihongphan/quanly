<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'birth' => $this->birth,
            'user_flg' => $this->user_flg,
            'information' => $this->information,
            'created_by'=>$this->created_by,
            'created_at'=>$this->created_at->format('d/m/Y'),
            'updated_by'=>$this->updated_by,
            'updated_at'=>$this->updated_at->format('d/m/Y'),
            'deleted_by'=>$this->deleted_by,
            'deleted_at'=>$this->deleted_at->format('d/m/Y'),


            
            
        ];
    }
}
