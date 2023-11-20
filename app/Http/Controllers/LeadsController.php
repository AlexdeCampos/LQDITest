<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLeadRequest;
use App\Mail\LeadContact;
use App\Models\Lead;
use App\Services\Leads\ListLeadsService;
use App\Services\Leads\SendLeadContactEmailService;
use App\Services\Leads\StoreLeadService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Mail\Message as MailMessage;
use Illuminate\Support\Facades\Mail;

class LeadsController extends Controller
{
  
    private $storeLeadService;
    private $listLeadsService;
    private $sendLeadContactEmailService;
    
    public function __construct(
        StoreLeadService $storeLeadService,
        ListLeadsService $listLeadsService,
        SendLeadContactEmailService $sendLeadContactEmailService,
    ) {
        $this->storeLeadService = $storeLeadService;
        $this->listLeadsService = $listLeadsService;
        $this->sendLeadContactEmailService = $sendLeadContactEmailService;
    }
    
    public function store(CreateLeadRequest $request)
    {
        try{
            $data = $request->all();
            $lead = $this->storeLeadService->store($data);
            
            return response()->json($lead,201);
        }
        catch(Exception $e){

            return response()->json(["message" => $e->getMessage()], 403);
        }
    }

    public function sendEmail(Request $request, string $id)
    {
        $lead = $this->sendLeadContactEmailService->send($id);
    }
    
    public function list(){
        try{
          $lead = $this->listLeadsService->list();
            
            return response()->json($lead,201);
        }
        catch(Exception $e){

            return response()->json(["message" => $e->getMessage()], 403);
        }
    }
}
