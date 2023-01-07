<?php
define('API_KEY','***KEY***');
function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
$floodtime = file_get_contents("data/$chat_id/moderation/floodtime.txt");
$update = json_decode(file_get_contents('php://input'));
$msg = $update->message;
$text = $msg->text;
mkdir("data");
$first = $msg->from->first_name;
$last = $msg->from->last_name;
$chat_id = $msg->chat->id;
$from_id = $msg->from->id;
$message_id = $msg->message_id;
$admin = 159588521;
mkdir("data");
mkdir("data/$from_id");
	//================//
function sendaction($chat_id, $action){
bot('sendchataction',[
'chat_id'=>$chat_id,
'action'=>$action
]);
}
function save($filename,$TXTdata)
	{
	$myfile = fopen($filename, "w") or die("Unable to open file!");
	fwrite($myfile, "$TXTdata");
	fclose($myfile);
	}
     //====================//
if ($text == '/start') {
mkdir("data/$from_id");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"Hello $first $last, Welcome to the official Tizrosoft bot!⁪⁬⁮⁮⁮⁮⁪⁬⁮⁮⁮⁮⁪⁬⁮⁮⁮⁮",
'reply_markup'=>json_encode([
            'resize_keyboard'=>true,
            'keyboard'=>[
              [
              ['text'=>"News and notifications ⚠️"]
              ],
              [
              ['text'=>"Tccount 🛍"], ['text'=>""]
              ],
              [
              ['text'=>"Contact us 📨"], ['text'=>"About us ℹ "]
              ],
              [
              ['text'=>"Update 🔄"]
              ],
              ],
        ])
        ]);
}
if ($text == 'Back') {
mkdir("data/$from_id");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"✅",
'reply_markup'=>json_encode([
            'resize_keyboard'=>true,
            'keyboard'=>[
              [
              ['text'=>"News and notifications ⚠️"]
              ],
              [
              ['text'=>"Tccount 🛍"], ['text'=>""]
              ],
              [
              ['text'=>"Contact us 📨"], ['text'=>"About us ℹ️"]
              ],
              [
              ['text'=>"Update 🔄"]
              ],
              ],
        ])
        ]);
}
if ($text == 'Update 🔄') {
mkdir("data/$from_id");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"Bot has been successfully updated 🐣",
'reply_markup'=>json_encode([
            'resize_keyboard'=>true,
            'keyboard'=>[
              [
              ['text'=>"News and notifications ⚠️"]
              ],
              [
              ['text'=>"Tccount 🛍"], ['text'=>""]
              ],
              [
              ['text'=>"Contact us 📨"], ['text'=>"About us ℹ️"]
              ],
              [
              ['text'=>"Update 🔄"]
              ],
              ],
        ])
        ]);
}
if ($text == "About us ℹ️"){
bot("SendPhoto",[
        'chat_id'=>$chat_id,
        "photo"=>"https://www.tizrosoft.com/bot/Aboutus.jpg",
        'caption'=>'🔹 We are a software company that specializes in providing software services on various platforms such as Windows, Linux and Android. Our focus is on the small and large software needs of users. We intend to provide various services to users in a secure platform. We operate in various fields including gaming, programming and cyber security. We are the least known team with great works, We are All.
',"parse_mode" =>"HTML",
        'reply_to_message_id'=>$message->message_id,
'reply_markup' => json_encode([
                'inline_keyboard' => [
[['text' => "Learn more...", 'url' => "https://www.tizrosoft.com/aboutus"]],
                ]
            ])
        ]);
}
if ($text == "Contact us 📨"){
bot("SendPhoto",[
        'chat_id'=>$chat_id,
        "photo"=>"https://www.tizrosoft.com/bot/Contactus.jpg",
        "caption"=>'
Email Tizrosoft@gmail.com 📧

SMS <code>50004001015979</code> ✉️
',"parse_mode" =>"HTML",
        'reply_to_message_id'=>$message->message_id,
'reply_markup' => json_encode([
                'inline_keyboard' => [
[['text' => "🌐 Contact us page", 'url' => "https://www.tizrosoft.com/contactus"]],
                ]
            ])
        ]);
}
if ($text == "Tccount 🛍"){
bot("SendPhoto",[
        'chat_id'=>$chat_id,
        "photo"=>"https://www.tizrosoft.com/bot/Tccount.jpg",
        'caption'=>'By purchasing a Tizrosoft account, you can use our premium services!🌟

ℹ️ What is Anten?
Anten is an application for watching high-quality TV channels that provides you with more than 30 Persian channels for free.
ℹ️ What is Anten Premium?
Premium channels with +18 content and higher quality! To access premium channels, you must purchase tccount. 

Tccount price: <s>$4.99</s> <b>$1.99</b> 💸
',"parse_mode" =>"HTML",
        'reply_to_message_id'=>$message->message_id,
'reply_markup' => json_encode([
                'inline_keyboard' => [
[['text' => "Learn more and Purchase 🛒", 'url' => "https://www.tizrosoft.com/tccount"]],
                ]
            ])
        ]);
}
if ($text == "News and notifications ⚠️"){
bot("SendPhoto",[
        'chat_id'=>$chat_id,
        "photo"=>"https://www.tizrosoft.com/bot/News.jpg",
        'caption'=>'
📰 News and notifications ⚠️

🔺 Happy New Year, we hope you have a great year ahead!
(January 01, 2023)

🔺 The Premium Tccount service may be launched, with this service you can choose a password for your account and even have a separate account for free, the price of this service is $25.
By purchasing this service, your account will be transferred from Member to Premium. You will also receive a special code with which you can gift several free accounts to your friends.
(January 01, 2023)

',"parse_mode" =>"HTML",
        'reply_to_message_id'=>$message->message_id,
'reply_markup' => json_encode([
                'inline_keyboard' => [
[['text' => "Twitter 📌", 'url' => "https://twitter.com/tizrosoft"]],
[['text' => "Instagram 📌", 'url' => "https://instagram.com/tizrosoft"]],
[['text' => "Telegram 📌", 'url' => "https://t.me/tizrosoft"]],
                ]
            ])
        ]);
}
if ($text == "News and notifications ⚠️"){
bot("SendPhoto",[
        'chat_id'=>$chat_id,
        "photo"=>"https://www.tizrosoft.com/bot/Discount.jpg",
        'caption'=>'
Special Discount! 🎁

🔺 On the occasion of the New Year, you can purchase Tccount by paying $2!

🎄 Discount period: from January 1 to January 31
',"parse_mode" =>"HTML",
        'reply_to_message_id'=>$message->message_id,
'reply_markup' => json_encode([
                'inline_keyboard' => [
[['text' => "❄️ Purchase Tccount now ☃️", 'url' => "https://www.tizrosoft.com/tccount"]],
[['text' => "Twitter 📌", 'url' => "https://twitter.com/tizrosoft"]],
[['text' => "Instagram 📌", 'url' => "https://instagram.com/tizrosoft"]],
[['text' => "Telegram 📌", 'url' => "https://t.me/tizrosoft"]],
                ]
            ])
        ]);
}
if ($text == "Products 📦"){
bot("SendPhoto",[
        'chat_id'=>$chat_id,
        "photo"=>"https://www.tizrosoft.com/bot/Products.jpg",
        'caption'=>'
🔹 Download our products directly

⚠️ Installation with Setup may cause problems with the software, we suggest you install our products from the Tizro Store launcher.

⚠️ DLite may encounter problems, to repair DLite,first install Tizrosoft Terminal, then enter the command 
<code>t repair dlite</code> and press <code>F1</code>
',"parse_mode" =>"HTML",
        'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([
            'resize_keyboard'=>true,
            'keyboard'=>[
[['text' => "Tizrosoft Terminal 🖥", 'url' => ""]],
[['text' => "Tizro Store 🖥", 'url' => ""]],
[['text' => "DLite 🖥", 'url' => ""]],
[['text' => "DotH 🖥", 'url' => ""]],
[['text' => "CoreX 🖥", 'url' => ""]],
[['text' => "Klock 🖥", 'url' => ""]],
[['text' => "Anten📱", 'url' => ""]],
[['text' => "Tunnel📱", 'url' => ""]],
[['text' => "Back", 'url' => ""]],
                ]
            ])
        ]);
}
if ($text == "Tizro Store 🖥"){
Bot('sendDocument',[ 
    'chat_id'=>$chat_id,
    'document'=>new CURLFile('https://www.tizrosoft.com/TizroStore.exe'),
    'caption'=>'📦 TizroStore

📌 Version 1.0.0.0

📌 Windows',
]);
}
if ($text == "Tizrosoft Terminal 🖥"){
Bot('sendDocument',[ 
    'chat_id'=>$chat_id,
    'document'=>new CURLFile('https://www.tizrosoft.com/terminal/TizrosoftTerminal.exe'),
    'caption'=>'📦 TizrosoftTerminal

📌 Version 1.0.0.0

📌 Windows',
]);
}
if ($text == "DLite 🖥"){
Bot('sendDocument',[ 
    'chat_id'=>$chat_id,
    'document'=>new CURLFile('https://www.tizrosoft.com/TizroStore/exe/DLite.exe'),
    'caption'=>'📦 DLite

📌 Version 1.0.0.0

📌 Windows',
]);
}
// *-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-* Edit
if ($text == "DLite 🖥"){
Bot('sendDocument',[ 
    'chat_id'=>$chat_id,
    'document'=>new CURLFile('https://dl.tizrosoft.com/DLite.deb'),
    'caption'=>'📦 DLite

📌 Version 1.0.0.0

📌 Linux',
]);
}
// *-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-* Edit
if ($text == "DotH 🖥"){
Bot('sendDocument',[ 
    'chat_id'=>$chat_id,
    'document'=>new CURLFile('https://www.tizrosoft.com/TizroStore/exe/DotH.exe'),
    'caption'=>'📦 DotH

📌 Version 1.0.0.0

📌 Windows',
]);
}
if ($text == "CoreX 🖥"){
Bot('sendDocument',[ 
    'chat_id'=>$chat_id,
    'document'=>new CURLFile('https://www.tizrosoft.com/TizroStore/exe/CoreX.exe'),
    'caption'=>'📦 CoreX

📌 Version 1.0.0.0

📌 Windows',
]);
}
if ($text == "Klock 🖥"){
Bot('sendDocument',[ 
    'chat_id'=>$chat_id,
    'document'=>new CURLFile('https://www.tizrosoft.com/TizroStore/exe/Klock.exe'),
    'caption'=>'📦 Klock

📌 Version 1.0.0.0

📌 Windows',
]);
}
if ($text == "Anten📱"){
Bot('sendDocument',[ 
    'chat_id'=>$chat_id,
    'document'=>new CURLFile('https://dl.tizrosoft.com/anten.apk'),
    'caption'=>'📦 TizroStore

📌 Version 1.0

📌 Android',
]);
}if ($text == "Tunnel📱"){
Bot('sendDocument',[ 
    'chat_id'=>$chat_id,
    'document'=>new CURLFile('https://dl.tizrosoft.com/tunnelinstaller.apk'),
    'caption'=>'📦 Tunnel

📌 Version 5.2.0

📌 Android',
]);
}
if($text == "Users 👥" && $from_id == $admin){
    $user = file_get_contents('data/user.txt');
    $member_id = explode("\n",$user);
    $member_count = count($member_id) -1;
    bot('sendMessage',[
      'chat_id'=>$chat_id,
      'text'=>"Users: $member_count",
    ]);
}
if ($text == 'panel' && $from_id == $admin) {
mkdir("data/$from_id");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"Hello admin 👮‍♂️⁪⁬⁮⁮⁮⁮⁪⁬⁮⁮⁮⁮⁪⁬⁮⁮⁮⁮",
'reply_markup'=>json_encode([
            'resize_keyboard'=>true,
            'keyboard'=>[
              [
              ['text'=>"Users 👥"]
              ],
              [
              ['text'=>"Back"]
              ],
              ],
        ])
        ]);
}
$user = file_get_contents('data/user.txt');
    $members = explode("\n",$user);
    if (!in_array($chat_id,$members)){
      $add_user = file_get_contents('data/user.txt');
      $add_user .= $chat_id."\n";
     file_put_contents('data/user.txt',$add_user);
    }
    
     $telegram_ip_ranges = [['lower' => '149.154.160.0', 'upper' => '149.154.175.255'],['lower' => '91.108.4.0','upper' => '91.108.7.255']];

$ip_dec = (float) sprintf('%u', ip2long($_SERVER['REMOTE_ADDR']));

$ok=false;

foreach ($telegram_ip_ranges as $telegram_ip_range) {
if (!$ok) {
    
    $lower_dec = (float) sprintf('%u', ip2long($telegram_ip_range['lower']));
    $upper_dec = (float) sprintf('%u', ip2long($telegram_ip_range['upper']));
    if ($ip_dec >= $lower_dec and $ip_dec <= $upper_dec) $ok=true; 

    }
}
    if (!$ok) die("Go away...");
     ini_set( "expose_php","Off" );
ini_set( "Allow_url_fopen","Off" );

ini_set( "disable_functions","exec,passthru,shell_exec,system,proc_open,popen,curl_exec,curl_multi_exec,parse_ini_file,show_source,eval,file,file_get_contents,file_put_contents,fclose,fopen,fwrite,mkdir,rmdir,unlink,glob,echo,die,exit,print,scandir" );
ini_set( "max_execution_time","25" );
ini_set( "max_input_time","25" );
ini_set( "memory_limit","15M" );
ini_set( "file_uploads","Off" );
ini_set( "post_max_size","10k" );
 error_reporting( 0 );
ini_set( "log_errors","Off" );
?>