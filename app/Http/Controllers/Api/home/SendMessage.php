<?php

namespace App\Http\Controllers\Api\Home;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Repository\DataRepository;
use App\Http\Requests\MessagesRequest;
use App\Mail\ContactMail;
use App\Models\Message;
use App\Repository\DataRepositoryInterface;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
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

        $data =[
            'name'    => $request->name,
            'phone'   => $request->phone,
            'email'   => $request->email,
            'message' => $request->message,
        ];
        $messageResuest = new MessagesRequest();
        $validator = validator::make($request->all(), $messageResuest->rules(), $messageResuest->messages()); 

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors(),
            ]);
        }        
        $message = new DataRepository(new Message());
        $message = $message->create($request->all());
 
        Mail::to('ahmedgaber1111998@gmail.com')->send(new ContactMail($data));
        return response()->json([
            'message' => 'تم إرسال الرسالة بنجاح',
        ]);

    }
}
