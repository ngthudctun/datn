<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Biến user thành mảng JSON.
     */
    public function toArray($request)
    {
        return [
            'id'       => $this->user_id,
            'username' => $this->username,
            'email'    => $this->email,
            'phone'    => $this->phone,
            'role'     => $this->role,
            'avatar'   => $this->avatar_image,
            'birthday' => $this->birthday,
            'status'   => $this->status,
            'verified' => $this->verified,
        ];
    }

}
