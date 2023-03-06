<?php

namespace App\Lib;

use Illuminate\Support\Facades\Storage;

class OpenAI
{
    public static function send_prompt($prompt = ''): void
    {
        $API_KEY = '';

        if (!$prompt) {
            return;
        }

        $headers = array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $API_KEY
        );

        $data = array(
            'model' => 'text-davinci-003',
            'prompt' => $prompt,
            "max_tokens" => 150,
            "temperature" => 1,
            "top_p" => 1,
            "frequency_penalty" => 0.0,
            "presence_penalty" => 0.6,
            "stop" => array(" Human:", " AI:")
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.openai.com/v1/chat/completions');
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        $response_data = json_decode($response, true);
        echo trim($response_data['choices'][0]['text']);
    }
}
