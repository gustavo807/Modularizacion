<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WSNotificacion extends Model
{
	// Función para enviar notificación Firebase
    public static function sendnotification($title,$body)
    {
    	$url = 'https://fcm.googleapis.com/fcm/send';

	    $headers = array(
	    'Authorization: key=' . "AAAAUwKbLXw:APA91bFDUhlUnp2RQcGLPp3UzNdbPGOWE340jJ6UOwDP_paybt6crmjdSKZ2EADEPY6UEQK5bKoyL6LbYnt9HE9Fj8UgmNW-nVHUgl4HgIKsEdjqvhWhZ0dy1GJqE8htll8-6BZ9ojro",
	    'Content-Type: application/json'
	    );
	    $message = array("data"=>array("title"=>$title,"message"=>$body));
	    $fields = array(
	            'to' => '/topics/global',
	            'data' => $message,
	        );
	    // Open connection
	    $ch = curl_init();

	    // Set the url, number of POST vars, POST data
	    curl_setopt($ch, CURLOPT_URL, $url);

	    curl_setopt($ch, CURLOPT_POST, true);
	    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	    // Disabling SSL Certificate support temporarly
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

	    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

	    // Execute post
	    $result = curl_exec($ch);
	    if ($result === FALSE) {
	    die('Curl failed: ' . curl_error($ch));
	    }

	    // Close connection
	    curl_close($ch);
    }
}
