<?php 

use GuzzleHttp\Client;

class TelegramBot {
    

    protected $token = "885580719:AAHuClGeSq4xZsDWJBtejeNPjEt3VSe6pqE";

    protected $updateId;

    protected function query($method, $params = []) {

        $url = "https://api.telegram.org/bot";

        $url .=$this->token;

        $url .="/" . $method;

        if (!empty($params)) {

            $url .="?" . http_build_query($params);
        }

        $client = new Client([
            'base_uri' => $url
        ]);

        $result = $client->request('GET');

        return json_decode($result->getBody());
    }    

    public function sendMessage($chat_id, $text) {

        $response = $this->query('sendMessage', [
            'text' => $text,
            'chat_id' => $chat_id
        ]);

        return $response;

    }
}


?>