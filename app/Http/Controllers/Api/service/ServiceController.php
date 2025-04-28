<?php

namespace App\Http\Controllers\Api\service;

use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceResource;
use App\Mail\BookingMail;
use App\Models\Booking;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    public function index()
    {
        $services= ServiceResource::collection(Service::paginate(3));
        return response()->json(['data' => $services],200);
    }

    public function book(Request $request)
    {
        $rules = [
            'first_name'    => 'required|string',
            'last_name'     => 'required|string',
            'email'         => 'required|email',                    
            'adults_count'  => 'required|integer|min:1'
        ];

        if ($request->is_there_kids == 'yes') {
            $rules['number_of_kids'] = 'required|integer|min:1';
        }

        $vlidator= Validator::make($request->all(),$rules);

        if ($vlidator->fails())
        {
            return response()->json(['errors'  => $vlidator->errors()]);
        }

        $bookiing =Booking::create($request->all());
        $bookiing->save();
        $data = [
            'first_name'     => $request->first_name,
            'last_name'      => $request->last_name,
            'email'          => $request->email,
            'adults_count'   => $request->adults_count,
        ];
        Mail::to('ahmedgaber1111998@gmail.com')->send(new BookingMail($data));
        // return response()->json(['data' => $bookiing],200);
    }
}
