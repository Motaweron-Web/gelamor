<?php

namespace App\Http;

use App\Models\PhoneToken;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Admin;
trait FirebaseNotification{

    public function sendNotification($title,$body){

        $ids = Admin::pluck('id')->toArray();
        $firebaseToken = PhoneToken::whereIn('admin_id',$ids)->pluck('token')->toArray();

        $SERVER_API_KEY = 'AAAAQQckzyU:APA91bHDc753hYb9H80I4_d75bA9fCbhrq_tFyfQQgVITMBzzzoumyR3F88BjzHRP02dxFdvhfE1bVr3wklLSKi1zMhSjUvH_xzU1570r-aV_tzSAWJcIijePBxq5aKHhaA6g2q_EqDz';

        $data = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "title" => $title,
                "body" => $body,
            ]
        ];
        $dataString = json_encode($data);

        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        $response = curl_exec($ch);

        return $response;
        }


}