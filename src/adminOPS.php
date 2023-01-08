<?php
if($text === "Users 👥"){
    $user = file_get_contents('data/user.txt');
    $member_id = explode("\n",$user);
    $member_count = count($member_id) -1;
    bot("sendMessage",[
      "chat_id" => $chat_id,
      "text" => "Users: $member_count",
    ]);
}

elseif ($text === "panel") {
    mkdir("data/$from_id");
    bot("sendMessage",[
        "chat_id" => $chat_id,
        "text" => "Hello admin 👮‍♂️⁪⁬⁮⁮⁮⁮⁪⁬⁮⁮⁮⁮⁪⁬⁮⁮⁮⁮",
        "reply_markup" => json_encode([
            "resize_keyboard" => true,
            "keyboard" => [
                [
                    [
                        "text" => "Users 👥"
                    ]
                ],
                [
                    [
                        "text" => "Back"
                    ]
                ],
            ],
        ])
    ]);
}