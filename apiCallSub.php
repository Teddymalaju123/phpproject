<?php 
    if(isset($_POST['submit'])){
        $caltype = "สำหรับรายวิชา";
        $subject = $_POST['subject'];
        $url = "http://localhost/project/apiAll.php?caltype=".$caltype."&subject=".$subject;
        $cURLConnection = curl_init($url); //CURL session status

        curl_setopt($cURLConnection, CURLOPT_URL, $url); //changes the cURL session behavior with options
        curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

        $SUB = curl_exec($cURLConnection); //executes the started cURL session
        curl_close($cURLConnection); //CURL seassion close
        $CallSubResponse = json_decode($SUB); //used to decode or convert a JSON object to a PHP object

        echo "<br>";
        echo "ประเภทการคำนวณ$caltype <br> คะแนนวิชา = $subject <br> <b> ผลลัพธ์ของคุณคือ ".$CallSubResponse->data."</b>"; //show BMI
        //$BMIResponse['data'] แทน $BMIResponse->data หรือ $BMIResponse['status'] แทน $BMIResponse->status ได้
        echo "<br> <a href='clientCalSub.php'>Back</a>";
    }
?>