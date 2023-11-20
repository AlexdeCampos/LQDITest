<?php

namespace App\Services\Leads;

use App\Mail\LeadContact;
use App\Models\Lead;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class SendLeadContactEmailService {
    public function send(string $id){
        $lead = $this->getLead($id);
        Mail::to($lead["email"])->send(new LeadContact($lead));

        response()->json(['message'=> "Email enviado com sucesso"]);
    }

    private function getLead(string $id){

        $lead = Lead::where('id', $id)->first();

        if(!$lead){
            throw ValidationException::withMessages(['message' => 'Email already exists!']);
        }
        return $lead;
    }
}