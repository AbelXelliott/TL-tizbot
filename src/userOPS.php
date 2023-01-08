<?php

if ($text === "/start") {
    mkdir("data/$from_id");
    bot("sendMessage",[
        "chat_id" => $chat_id,
        "text" => "Hello $first $last, Welcome to the official Tizrosoft bot!⁪⁬⁮⁮⁮⁮⁪⁬⁮⁮⁮⁮⁪⁬⁮⁮⁮⁮",
        "reply_markup" => json_encode([
            "resize_keyboard" => true,
            "keyboard"=>[
                [
                    [
                        "text"=>"News and notelseifications ⚠️"
                    ]
                ],
                [
                    [
                        "text"=>"Tccount 🛍"
                    ],
                    [
                        "text"=>""
                    ]
                ],
                [
                    [
                        "text"=>"Contact us 📨"
                    ],
                    [
                        "text"=>"About us ℹ "
                    ]
                ],
                [
                    [
                        "text"=>"Update 🔄"
                    ]
                ],
            ],
        ])
    ]);
}

elseif ($text === "Back") {
    mkdir("data/$from_id");
    bot("sendMessage",[
        "chat_id" => $chat_id,
        "text" => "✅",
        "reply_markup" => json_encode([
            "resize_keyboard" => true,
            "keyboard" => [
                [
                    [
                        "text"=>"News and notelseifications ⚠️"
                    ]
                ],
                [
                    [
                        "text"=>"Tccount 🛍"
                    ],
                    [
                        "text"=>""
                    ]
                ],
                [
                    [
                        "text"=>"Contact us 📨"
                    ],
                    [
                        "text"=>"About us ℹ️"
                    ]
                ],
                [
                    [
                        "text"=>"Update 🔄"
                    ]
                ],
            ],
        ])
    ]);
}

elseif ($text === "Update 🔄") {
    mkdir("data/$from_id");
    bot("sendMessage",[
        "chat_id" => $chat_id,
        "text" => "Bot has been successfully updated 🐣",
        "reply_markup" => json_encode([
            "resize_keyboard" => true,
            "keyboard" => [
                [
                    [
                        "text" => "News and notelseifications ⚠️"
                    ]
                ],
                [
                    [
                        "text" => "Tccount 🛍"
                    ],
                    [
                        "text" => ""
                    ]
                ],
                [
                    [
                        "text" => "Contact us 📨"
                    ],
                    [
                        "text" => "About us ℹ️"
                    ]
                ],
                [
                    [
                        "text" => "Update 🔄"
                    ]
                ],
            ],
        ])
    ]);
}

elseif ($text === "About us ℹ️"){
    bot("SendPhoto",[
        "chat_id" => $chat_id,
        "photo" => "https://www.tizrosoft.com/bot/Aboutus.jpg",
        "caption" => "🔹 We are a software company that specializes in providing software services on various platforms such as Windows, Linux and Android. Our focus is on the small and large software needs of users. We intend to provide various services to users in a secure platform. We operate in various fields including gaming, programming and cyber security. We are the least known team with great works, We are All.",
        "parse_mode" =>"HTML",
        "reply_to_message_id" => $message->message_id,
        "reply_markup" => json_encode([
            "inline_keyboard" => [
                [
                    [
                        "text" => "Learn more...",
                        "url" => "https://www.tizrosoft.com/aboutus"
                    ]
                ],
            ]
        ])
    ]);
}

elseif ($text === "Contact us 📨"){
    bot("SendPhoto",[
        "chat_id" => $chat_id,
        "photo" => "https://www.tizrosoft.com/bot/Contactus.jpg",
        "caption" => "\nEmail Tizrosoft@gmail.com 📧\n\nSMS <code>50004001015979</code> ✉️",
        "parse_mode" => "HTML",
        "reply_to_message_id" => $message->message_id,
        "reply_markup" => json_encode([
            "inline_keyboard" => [
                [
                    ["text" => "🌐 Contact us page",
                     "url" => "https://www.tizrosoft.com/contactus"
                    ]
                ],
            ]
        ])
    ]);
}

elseif ($text === "Tccount 🛍"){
    bot("SendPhoto",[
        "chat_id" => $chat_id,
        "photo" => "https://www.tizrosoft.com/bot/Tccount.jpg",
        "caption" => "By purchasing a Tizrosoft account, you can use our premium services!🌟\n\nℹ️ What is Anten?\nAnten is an application for watching high-quality TV channels that provides you with more than 30 Persian channels for free.\nℹ️ What is Anten Premium?\nPremium channels with +18 content and higher quality! To access premium channels, you must purchase tccount. \n\nTccount price: <s>$4.99</s> <b>$1.99</b> 💸",
        "parse_mode" => "HTML",
        "reply_to_message_id" => $message->message_id,
        "reply_markup" => json_encode([
            "inline_keyboard" => [
                [
                    [
                        "text" => "Learn more and Purchase 🛒",
                        "url" => "https://www.tizrosoft.com/tccount"
                    ]
                ],
            ]
        ])
    ]);
}

elseif ($text === "News and notelseifications ⚠️"){
    bot("SendPhoto",[
        "chat_id" => $chat_id,
        "photo" => "https://www.tizrosoft.com/bot/News.jpg",
        "caption" => "\n📰 News and notelseifications ⚠️\n\n🔺 Happy New Year, we hope you have a great year ahead!\n(January 01, 2023)\n🔺 The Premium Tccount service may be launched, with this service you can choose a password for your account and even have a separate account for free, the price of this service is $25.\n    By purchasing this service, your account will be transferred from Member to Premium. You will also receive a special code with which you can gelseift several free accounts to your friends.\n(January 01, 2023)\n\n",
        "parse_mode" => "HTML",
        "reply_to_message_id" => $message->message_id,
        "reply_markup" => json_encode([
            "inline_keyboard" => [
                [
                    [
                        "text" => "Twitter 📌",
                        "url" => "https://twitter.com/tizrosoft"
                    ]
                ],
                [
                    [
                        "text" => "Instagram 📌",
                        "url" => "https://instagram.com/tizrosoft"
                    ]
                ],
                [
                    [
                        "text" => "Telegram 📌",
                        "url" => "https://t.me/tizrosoft"
                    ]
                ],
            ]
        ])
    ]);

    bot("SendPhoto",[
        "chat_id" => $chat_id,
        "photo" => "https://www.tizrosoft.com/bot/Discount.jpg",
        "caption" => "\nSpecial Discount! 🎁\n\n🔺 On the occasion of the New Year, you can purchase Tccount by paying $2!\n\n🎄 Discount period: from January 1 to January 31\n",
        "parse_mode" => "HTML",
        "reply_to_message_id" => $message->message_id,
        "reply_markup" => json_encode([
            "inline_keyboard" => [
                [
                    [
                        "text" => "❄️ Purchase Tccount now ☃️",
                        "url" => "https://www.tizrosoft.com/tccount"
                    ]
                ],
                [
                    [
                        "text" => "Twitter 📌",
                        "url" => "https://twitter.com/tizrosoft"
                    ]
                ],
                [
                    [
                        "text" => "Instagram 📌",
                        "url" => "https://instagram.com/tizrosoft"
                    ]
                ],
                [
                    [
                        "text" => "Telegram 📌",
                        "url" => "https://t.me/tizrosoft"
                    ]
                ],
            ]
        ])
    ]);
}

elseif ($text === "Products 📦"){
    bot("SendPhoto",[
        "chat_id" => $chat_id,
        "photo" => "https://www.tizrosoft.com/bot/Products.jpg",
        "caption" => "\n🔹 Download our products directly\n\n⚠️ Installation with Setup may cause problems with the software, we suggest you install our products from the Tizro Store launcher.\n\n⚠️ DLite may encounter problems, to repair DLite,first install Tizrosoft Terminal, then enter the command \n<code>t repair dlite</code> and press <code>F1</code>\n",
        "parse_mode" => "HTML",
        "reply_to_message_id" => $message->message_id,
        "reply_markup" => json_encode([
            "resize_keyboard" => true,
            "keyboard" => [
                [
                    [
                        "text" => "Tizrosoft Terminal 🖥",
                        "url" => ""
                    ]
                ],
                [
                    [
                        "text" => "Tizro Store 🖥",
                        "url" => ""
                    ]
                ],
                [
                    [
                        "text" => "DLite 🖥",
                        "url" => ""
                    ]
                ],
                [
                    [
                        "text" => "DotH 🖥",
                        "url" => ""
                    ]
                ],
                [
                    [
                        "text" => "CoreX 🖥",
                        "url" => ""
                    ]
                ],
                [
                    [
                        "text" => "Klock 🖥",
                        "url" => ""
                    ]
                ],
                [
                    [
                        "text" => "Anten📱",
                        "url" => ""
                    ]
                ],
                [
                    [
                        "text" => "Tunnel📱",
                        "url" => ""
                    ]
                ],
                [
                    [
                        "text" => "Back",
                        "url" => ""
                    ]
                ],
            ]
        ])
    ]);
}

elseif ($text === "Tizro Store 🖥"){
    Bot("sendDocument",[ 
        "chat_id" => $chat_id,
        "document" => new CURLFile('https://www.tizrosoft.com/TizroStore.exe'),
        "caption" => "📦 TizroStore\n\n📌 Version 1.0.0.0\n\n📌 Windows",
    ]);
}

elseif ($text === "Tizrosoft Terminal 🖥"){
    Bot("sendDocument",[ 
        "chat_id" => $chat_id,
        "document" => new CURLFile('https://www.tizrosoft.com/terminal/TizrosoftTerminal.exe'),
        "caption" => "📦 TizrosoftTerminal\n\n📌 Version 1.0.0.0\n\n📌 Windows",
    ]);
}

elseif ($text === "DLite 🖥"){
    Bot("sendDocument",[ 
        "chat_id" => $chat_id,
        "document" => new CURLFile('https://www.tizrosoft.com/TizroStore/exe/DLite.exe'),
        "caption" => "📦 DLite\n\n📌 Version 1.0.0.0\n\n📌 Windows",
    ]);

    Bot("sendDocument",[ 
        "chat_id" => $chat_id,
        "document" => new CURLFile('https://dl.tizrosoft.com/DLite.deb'),
        "caption" => "📦 DLite\n\n📌 Version 1.0.0.0\n\n📌 Linux",
    ]);
}

elseif ($text === "DotH 🖥"){
    Bot("sendDocument",[ 
        "chat_id" => $chat_id,
        "document" => new CURLFile('https://www.tizrosoft.com/TizroStore/exe/DotH.exe'),
        "caption" => "📦 DotH\n\n📌 Version 1.0.0.0\n\n📌 Windows",
    ]);
}

elseif ($text === "CoreX 🖥"){
    Bot("sendDocument",[ 
        "chat_id" => $chat_id,
        "document" => new CURLFile('https://www.tizrosoft.com/TizroStore/exe/CoreX.exe'),
        "caption" => "📦 CoreX\n\n📌 Version 1.0.0.0\n\n📌 Windows",
    ]);
}

elseif ($text === "Klock 🖥"){
    Bot("sendDocument",[ 
        "chat_id" => $chat_id,
        "document" => new CURLFile('https://www.tizrosoft.com/TizroStore/exe/Klock.exe'),
        "caption" => "📦 Klock\n\n📌 Version 1.0.0.0\n\n📌 Windows",
    ]);
}

elseif ($text === "Anten📱"){
    Bot("sendDocument",[ 
        "chat_id" => $chat_id,
        "document" => new CURLFile('https://dl.tizrosoft.com/anten.apk'),
        "caption" => "📦 TizroStore\n\n📌 Version 1.0\n\n📌 Android",
    ]);
}

elseif ($text === "Tunnel📱"){
    Bot("sendDocument",[ 
        "chat_id" => $chat_id,
        "document" => new CURLFile('https://dl.tizrosoft.com/tunnelinstaller.apk'),
        "caption" => "📦 Tunnel\n\n📌 Version 5.2.0\n\n📌 Android",
    ]);
}