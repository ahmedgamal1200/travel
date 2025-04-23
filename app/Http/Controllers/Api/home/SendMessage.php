<?php

namespace App\Http\Controllers\Api\Home;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class SendMessage extends Controller
{
         
    /**
     * send message
     * @param Request $request
     * @return \Iluminate\Http\JsonResponse
     */

    public function sendMessage(Request $request)
    {
        $rules = [
            'name'    => 'required|string|max:255',
            'phone'   => 'required|string|max:20',
            'email'   => 'required|email',
            'message' => 'required|string|max:1000',
        ];

        $validator=Validator::make($request->all(),$rules);
        if ($validator->fails()) {

            return response()->json([
                'status'  => false,
                'message' => $validator->errors()
            ],422);
        }

        $data = [
            'name'         => $request->name,
            'phone'        => $request->phone,
            'email'        => $request->email,
            'message'      => $request->message,
        ];

        $message = Message::create($data);
        Mail::to('ahmedgaber1111998@gmail.com')->send(new ContactMail($data));

        return response()->json([
            'status'  => true,
            'message' => 'Message sent successfully!',
            'data'    => $message
        ], 200);
    }
}
