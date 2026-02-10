<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    public function index()
    {
        $leads = Lead::with('vehicle')->get();
        return view('admin.pages.lead.index', compact('leads'));
    }

    public function destroy(Lead $lead)
    {
        $lead->delete();

        return redirect()
            ->back()
            ->with('success', 'Lead deleted successfully');
    }
}
