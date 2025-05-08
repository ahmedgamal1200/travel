<?php

namespace App\Http\Controllers\Api\service;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Repository\DataRepository;
use App\Http\Requests\ServiceRequest;
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
        $servicesValidation = new ServiceRequest();
        $validator = validator::make($request->all(),$servicesValidation->rules(), $servicesValidation->messages());
        if ($validator->fails()) {
            return response()->json([ 'message' => $validator->errors(),422]);
        }
        $bookiing = new DataRepository(new Booking());
        $bookiing = $bookiing->create($request->all());
        Mail::to('ahmedgaber1111998@gmail.com')->send(new BookingMail($request->all()));
        return response()->json(['message' => 'booking is successfully'],200);
    }
}
