<?php 
    if(isset($_POST['submit'])){
        $caltype = "สำหรับเกรดเฉลี่ย";
        $sub1 = $_POST['sub1'];
        $sub2 = $_POST['sub2'];
        $sub3 = $_POST['sub3'];
        $sub4 = $_POST['sub4'];
        $sub5 = $_POST['sub5'];
        $sub6 = $_POST['sub6'];
        $sub7 = $_POST['sub7'];
        $url = "http://localhost/project/apiAll.php?caltype=".$caltype."&sub1=".$sub1."&sub2=".$sub2."&sub3=".$sub3."&sub4=".$sub4."&sub5=".$sub5."&sub6=".$sub6."&sub7=".$sub7;
        $cURLConnection = curl_init($url); //CURL session status

        curl_setopt($cURLConnection, CURLOPT_URL, $url); //changes the cURL session behavior with options
        curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

        $GPA = curl_exec($cURLConnection); //executes the started cURL session
        curl_close($cURLConnection); //CURL seassion close
        $CallGPAResponse = json_decode($GPA); //used to decode or convert a JSON object to a PHP object

        echo "<br>";
        echo "ประเภทการคำนวณ$caltype <br> เกรดเฉลี่ยของคุณคือ ".$CallGPAResponse->data."</b>"; //show BMI
        //$BMIResponse['data'] แทน $BMIResponse->data หรือ $BMIResponse['status'] แทน $BMIResponse->status ได้
        echo "<br> <a href='clientCalGpa.php'>Back</a>";
    }
?>