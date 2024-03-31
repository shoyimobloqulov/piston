<?php
    date_Default_timezone_set('Asia/Tashkent');

    include (__DIR__ . '/vendor/autoload.php');
    $telegram = new Telegram('7147016435:AAGvoV7mHZk7lm-jkFY3JECrESo4_jRs-wU');

    $result = $telegram->getData();
    $text = $result['message'] ['text'];
    $chat_id = $result['message'] ['chat']['id'];
    $user_id = $result['message']['from']['id'];

    if ($text == "/start" or $text == "/run") {
        $stats = "<b>Foydalanish:</b><pre>
/run [language]
[your code]
...
/stdin [input text] (optional)
...
</pre>
Mavjud tillar haqida ma'lumot olish uchun /langs komandasini bering.
";
        $content = array('chat_id' => $chat_id, 'text' => $stats,"parse_mode" => "HTML");
        $telegram->sendMessage($content);
    }

    elseif($text == "/langs") {
        $url = 'https://emkc.org/api/v2/piston/runtimes';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        if($response === false) {
            $content = array('chat_id' => $chat_id, 'text' => "Xatolik: HTTP so'rovni bajarmayapman");
            $telegram->sendMessage($content);
        }
        else {
            $data = json_decode($response,true);
            $text = "";

            for ($i = 0; $i < count($data); $i++) {
                $text .= "<pre>".$data[$i]["language"]."(".$data[$i]["version"].")".json_encode($data[$i]["aliases"][0] != null ? '['.$data[$i]["aliases"][0].']': '')."</pre>\n";
            }
            $content = array('chat_id' => $chat_id, 'text' => $text,"parse_mode" => "HTML");
            $telegram->sendMessage($content);
        }
        curl_close($ch);
    }



    ?>
