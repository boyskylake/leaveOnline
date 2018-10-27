<?php
 require_once '../Config.php'; 

	$accessToken ="mnGg9gl94iZOJgnQhlxbje2QgNiqQWmQ8wQnknE+D5RGgkz+0mGZ6OQxJbwLKOgV8NtacYLOWaDmp4YXUZDhh/z4f1q1dJfBHwJt0XCTrUFBQEbPM/AFJki0BtS0slQCYD9NjpLdJmRxn47QKEPvVAdB04t89/1O/w1cDnyilFU=";//copy ข้อความ Channel access token ตอนที่ตั้งค่า
    $content = file_get_contents('php://input');
    file_put_contents("test.txt",$content);
   $arrayJson = json_decode($content, true);
   $arrayHeader = array();
   $arrayHeader[] = "Content-Type: application/json";
   $arrayHeader[] = "Authorization: Bearer {$accessToken}";
   //รับข้อความจากผู้ใช้
   $message = $arrayJson['events'][0]['message']['text'];
   //รับ id ของผู้ใช้
   $id = $arrayJson['events'][0]['source']['userId'];


   if($message == "id"){
      $messagetext = "id ของคุณณคือ ".$id;
       reply($messagetext);
      die();
   }
   else
   {
      $sqllp = "SELECT * FROM `leave_leavepreview`";
      $quelp = mysqli_query($conn,$sqllp);

      while ($res = mysqli_fetch_array($quelp)) {
        $id = $res['leave_id'];
        $check = "yes=".$id;
        if ($message == $check) {
                $sqlup = "UPDATE `leave_leavepreview` SET `leave_status1`='อนุญาติ' WHERE `leave_id`='$id'";
                mysqli_query($conn,$sqlup);
              }
        $checkno = "no=".$id;
        if ($message == $checkno) {
                $sqlup = "UPDATE `leave_leavepreview` SET `leave_status1`='ไม่อนุญาติ' WHERE `leave_id`='$id'";
                mysqli_query($conn,$sqlup);
              }      
      }
   }



    function reply($message_to_reply){
        //    ตอบกลับเป็น type messages
        global $arrayHeader;
        global $id;
        
        $arrayPostData['to'] = $id;
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "$message_to_reply";
        pushMsg($arrayHeader,$arrayPostData);
    }

   function pushMsg($arrayHeader,$arrayPostData){ 
      $strUrl = "https://api.line.me/v2/bot/message/push";
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,$strUrl);
      curl_setopt($ch, CURLOPT_HEADER, false);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrayPostData));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      $result = curl_exec($ch);
      curl_close($ch);
   }
   exit;


 ?>