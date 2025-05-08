<?php

namespace App\Http\Controllers\Api\service;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    
    public function index()
    {
        $faqs = Faq::get();
        return response()->json(['data' => $faqs], 200);
    }
}
