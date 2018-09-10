<?php

namespace App\Http\Controllers\Pdf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Policy;

class PdfController extends Controller
{
    /**
     * show builder introduction page
     * @param Request $request
     */
    public function index(Request $request) 
    {
        $policy = Policy::getBuilderPolicyLink();
        return view('pdf.index', compact('policy'));
    }

}
