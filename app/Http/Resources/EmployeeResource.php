<?php

namespace App\Http\Resources;
use App\Http\Resources\CompanyResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name'=> $this->last_name,
            'company_id' => $this->company_id,
            'email' => $this->email,
            'phone' => $this->phone,
            'occupation' => $this->occupation,
            // 'company' => CompanyResource::collection($this->company),

        ];
    }
}
