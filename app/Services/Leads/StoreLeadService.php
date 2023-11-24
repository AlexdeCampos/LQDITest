<?php

namespace App\Services\Leads;

use App\Models\Lead;
use Illuminate\Validation\ValidationException;

class StoreLeadService {
    public function store(array $data): Lead{
        $this->validateUniqueEmail($data['email']);

        $lead = Lead::create($data);
        return $lead;
    }

    private function validateUniqueEmail($email){
        $existEmail = Lead::where('email', $email)->first();
        if($existEmail){

    throw ValidationException::withMessages(['message' => 'Email já cadastrado!']);
    }
}}