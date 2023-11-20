<?php

namespace App\Services\Leads;

use App\Models\Lead;

class ListLeadsService {
    public function list(){
        $lead = Lead::all();
        return $lead;
}}