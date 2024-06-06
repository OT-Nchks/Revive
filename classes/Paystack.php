<?php
error_reporting(E_ALL);

class Paystack{

    #METHOD TO GENERATE THE CARD DETAILS AREA FOR US

    public function paystack_initialize($email, $amt, $ref){
    
        $postRequest = ['email' => $email, 
                                        'amount' => $amt, 
                                        'reference' => $ref];

        $headers = ['Content-Type: application/json', 'Authorization: Bearer sk_test_df698d9d66e82a4e0c375eaa288c47b56adf5592'];
        $url = "https://api.paystack.co/transaction/initialize"; // Fixed URL syntax.

        // Step 1: Initialize cURL.
        $curlobj = curl_init($url);

        // Step 2: Set cURL options using curl_setopt().
        curl_setopt($curlobj, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($curlobj, CURLOPT_POSTFIELDS, json_encode($postRequest));
        curl_setopt($curlobj, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlobj, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curlobj, CURLOPT_SSL_VERIFYPEER, false);

        // Step 3: Execute cURL call session using curl_exec.
        $apiResponse = curl_exec($curlobj);

        if ($apiResponse) {
            curl_close($curlobj);
            return json_decode($apiResponse);
        } else {
            $r = curl_error($curlobj);
            return false;
        }
    } 
    
    
    
    
    public function paystack_verify($reference){
    
        // Step 1: Initialize cURL.
        $headers = ['Content-Type: application/json', 'Authorization: Bearer sk_test_df698d9d66e82a4e0c375eaa288c47b56adf5592'];
        $url = "https://api.paystack.co/transaction/verify/$reference";

        //Step 1 = initialize curl

        $curlobj = curl_init($url);

        // Step 2: Set cURL options using curl_setopt().
        curl_setopt($curlobj, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlobj, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curlobj, CURLOPT_SSL_VERIFYPEER, false);

        // Step 3: Execute cURL call session using curl_exec.
        $apiResponse = curl_exec($curlobj);

        if ($apiResponse) {
            curl_close($curlobj);
            return json_decode($apiResponse);
        } else {
            $r = curl_error($curlobj);
            return false;
        }
    }
}



?>