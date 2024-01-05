<?php

namespace App\Http\Controllers;

use App\Models\Notifications;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $notifications=Notifications::where('id','!=',-1)->orderBy('id','DESC')->paginate(20);

        return view('notifications.index')->with(compact('notifications'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('notifications.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $notifications=Notifications::create($request->all());
        $this->sendPushNotification(env('fcm_token'), $request->subject, $request->body, $id = null);
        return redirect(route('notifications.index'))->with('success', 'Notification created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Notifications $notifications)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notifications $notifications)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Notifications $notifications)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notifications $notifications)
    {
        //
    }

    public function sendPushNotification($fcm_token, $title, $message, $id = null) {  
    
        $url = "https://fcm.googleapis.com/fcm/send";            
        $header = [
        'authorization: key=' .'wolfsoft1.primewave',
            'content-type: application/json'
        ];    

        $postdata = '{
            "to" : "' . $fcm_token . '",
                "notification" : {
                    "title":"' . $title . '",
                    "text" : "' . $message . '"
                },
            "data" : {
                "id" : "'.$id.'",
                "title":"' . $title . '",
                "description" : "' . $message . '",
                "text" : "' . $message . '",
                "is_read": 0
              }
        }';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

        $result = curl_exec($ch);    
        curl_close($ch);

        return $result;
    }

}
