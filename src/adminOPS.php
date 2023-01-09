<?php
if($text === "Users 👥"){
    $users_count = count($db->getUsers());
    bot("sendMessage",[
      "chat_id" => $chat_id,
      "text" => "Users: $member_count",
    ]);
}

elseif ($text === "panel") {
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