<?php
$token = "6780491751:AAHhAdhQfs40TeYdKYKXDS_LrB21vkwlufU";
date_default_timezone_set('Asia/Tashkent');
define('API_KEY',$token);

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
/*
//include ("php/function.php");

define("DB_SERVER", "localhost"); // Tegilmaydi
define("DB_USERNAME", "x_u_7459_taksi"); // Mysql baza nomi
define("DB_PASSWORD", "Taksi01"); // Mysql baza paroli
define("DB_NAME", "x_u_7459_taksi"); // Mysql baza nomi

$db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
mysqli_set_charset($db, "utf8mb4");
if($db){
    echo "Ulandi";
}*/

$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$type = $update->message->chat->type;
$mid = $message->message_id;
$txt = $message->text;
$text = $message->text;
$chat_id = $message->chat->id;
$cid = $message->chat->id;
$uid = $message->from->id;
$callback = $update->callback_query;
$data = $update->callback_query->data;
$callid = $callback->id;
$from_id = $update->callback_query->from->id;
$qid = $update->callback_query->id;
$ccid = $callback->message->chat->id;
$cmid = $callback->message->message_id;
$message_id = $update->callback_query->message->message_id;

function ikey($array){
      $ret = json_encode([   
      "inline_keyboard"=>$array
       ]);
       }

$menu = json_encode([
'resize_keyboard'=>false,
'keyboard'=>[
[['text'=>"/start"]],
[['text'=>"/help"],['text'=>"/p"]],
]
]);

$help = json_encode([
'resize_keyboard'=>false,
'keyboard'=>[
[['text'=>"/start"]],
[['text'=>"/help"]],
[['text'=>"/lang"]],
[['text'=>"/sozla"]],
[['text'=>"/my"]],
[['text'=>"/premium"]],
[['text'=>"/top"]],
[['text'=>"/rand"]],
]
]);

function send($id,$text,$men){
return bot('sendMessage',[
"chat_id"=>$id,
"text"=>$text,
'reply_markup'=>$men,
"parse_mode"=>html,
]);
}

function cp($ci,$m,$id){
return bot('copyMessage',[
	'chat_id'=>$ci,
	'reply_to_message_id'=>$m,
'from_chat_id'=>"-1001702654247",
   'message_id'=>$id,
]);
}

function Leave($id){
return bot('Leavechat',[
"chat_id"=>$id,
]);
}

function sendp($id, $text){
return bot('sendMessage',[
"chat_id"=>$id,
"text"=>$text,
"parse_mode"=>html,
]);
}

if($text=="/t"){
cp($cid,$mid,75);
}

if($text=="/start"){
send($cid, "Salom siz /start bosdiz\n\n/help ---- yordam M",$menu);/*exit();
usleep(500000);
send($cid, "1");
usleep(500000);
send($cid, "2");
usleep(500000);
send($cid, "3");*/
}
/*
$time = date('H:i:s');


if ($time == $time) {
    unlink('file.txt');
}

if($text=="/help"){
send($cid, "<a> /lang ---- til sozlash</a>\n<b>/sozla ---- qidiruv turini sozlash</b>\n/my ---- saqlanganlar\n/premium ---- premium obuna\n/top ---- top 10 talik\n/rand ---- tasodifiy 10 talik",$help);
}

if($text=="/lang"){
send($cid, "tilni tanlang");
}

if($text=="/my"){
send($cid, "mana saqlaganlariz");
}

if($text=="/premium"){
send($cid, "botga 10 ta dustizzi taklif qiling");
}

if($text=="/rand"){
send($cid, "mana sizga tasodifiy 10 talik");
}

if($text=="/top"){
send($cid, "mana eng kop yuklangan top 10 talik");
}

if($text=="/sozla"){
send($cid, "qidiruv turini tanlang");
}
/*
$api_id = 16237749;
$api_hash = 'ef88ec0220752634a0c7ee51a05d91d0';

// Telethon paketidan foydalanamiz
use danogMadelineProtoAPI;
use danogMadelineProtoLogger;

// MadelineProto yaratamiz va girişni saqlay(qoʻyish) volgan file-ni nomini o'zgartiring, misolcha db.sqlite sifatida
$MadelineProto = new API('akkaunt.db');
$MadelineProto->start();

// Kanalga qo'shish uchun kerakli malumotlarni o'zgartiring, misolcha target_channel username sifatida
$target_channel = '@menvss';

$dialogs = $MadelineProto->get_dialogs();
foreach ($dialogs as $peer) {
    if ($peer['_'] == 'peerChannel' && $peer['username'] == $target_channel) {
        $MadelineProto->messages->joinChat(['chat_id' => $peer['id']]);
        break;
    }
}

// akkountni battery_statusasini olish
$batteryStatus = $MadelineProto->get_pwr_data();
echo 'Toʻlanish:%s%, bajarish=' . ($batteryStatus['plugged'] ? 'true' : 'kerakli') . 'Masofa:' . $batteryStatus['power'] . 'km';

require 'vendor/autoload.php';
//use Telegram\Bot\Api;

//API-ID va API-Hashingiz
$apiID = '16237749';
$apiHash = 'ef88ec0220752634a0c7ee51a05d91d0';

// Habar yuborish uchun funksiya
function send_message($message) {
    global $apiID, $apiHash;
    $telegram = new Api($apiID, $apiHash);
    $chatLd = '5325641696';
    
    try {
        $res = $telegram->sendMessage([
            'chat_id' => $chatLd,
            'text' => $message,
        ]);
        var_dump($res);
    } catch (Exception $e) {
send($cid,"Telegram bot unsuccessful request. Error:" . $e->getMessage());
//        echo 'Telegram bot unsuccessful request. Error:' . $e->getMessage();
    }
}*/

//include ("bot.php");

if($text=="/test"){
send_message("Salom!");
}
/*
$habarlar = [
    '6160351590' => 'Assalomu alaykum!',
    '6160351590' => 'Hayrli tong!',
    '6160351590' => 'Sizning buyruqlaringizni kutaman!',
];

foreach ($habarlar as $foydalanuvchi => $habar) {

send($foydalanuvchi, $habar);

    echo $habar . " (" . $foydalanuvchi . ")" . PHP_EOL;
}*/

if($text=="/paka"){
Leave($cid);
}

function setBotSpeed($speed) {
    // Botun işləmə tezliyini düzəltmək üçün uyğun funksiya burada yerləşdiriləcək
    usleep($speed);
}

if($text=="/mm"){
setBotSpeed (120);
send($cid, "Salom alekum",$menu);
}