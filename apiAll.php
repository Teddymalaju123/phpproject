<?php 

    if(!empty($_GET['caltype'])){
        if($_GET['caltype'] == "สำหรับรายวิชา"){
            $subject = $_GET['subject'];
            $SUB = calSub($subject);
            if(empty($SUB)){
                response(404, "Cannot cal SUB", NULL);
            }else{
                response(200, "Can be calculate SUB", $SUB);
            }
        }
        
        if($_GET['caltype'] == "สำหรับเกรดเฉลี่ย"){
            $sub1 = $_GET['sub1'];
            $sub2 = $_GET['sub2'];
            $sub3 = $_GET['sub3'];
            $sub4 = $_GET['sub4'];
            $sub5 = $_GET['sub5'];
            $sub6 = $_GET['sub6'];
            $sub7 = $_GET['sub7'];
            $resultGpa = calGpa($sub1,$sub2,$sub3,$sub4,$sub5,$sub6,$sub7);
            if(empty($resultGpa)){
                response(404, "Cannot cal GPA", NULL);
            }else{
                response(200, "Can be calculate GPA", $resultGpa);
            }
        }

        if($_GET['caltype'] == "สำหรับเกรดเฉลี่ยรวม"){
            $sub1 = $_GET['sub1'];
            $sub2 = $_GET['sub2'];
            $sub3 = $_GET['sub3'];
            $sub4 = $_GET['sub4'];
            $sub5 = $_GET['sub5'];
            $sub6 = $_GET['sub6'];
            $sub7 = $_GET['sub7'];
            $sub8 = $_GET['sub8'];
            $resultGpax = calGPax($sub1,$sub2,$sub3,$sub4,$sub5,$sub6,$sub7,$sub8);
            if(empty($resultGpax)){
                response(404, "Cannot cal GPA", NULL);
            }else{
                response(200, "Can be calculate GPA", $resultGpax);
            }
        }
    }else{
        response(400, "Invalid Request", NULL);
    }
        
    function calSub($subject){
        if($subject >= 80){
            return $CalSub = "A";
        } elseif($subject >= 75){
            return $CalSub = "B+";
        } elseif($subject >= 70){
            return $CalSub = "B";
        } elseif($subject >= 65){
            return $CalSub = "C+";
        } elseif($subject >= 60){
            return $CalSub = "C";
        } elseif($subject >= 55){
            return $CalSub = "D+";
        } elseif($subject >= 50){
            return $CalSub = "D";
        } else{
            return $CalSub = "F";
        }
        return $CalSub = "ข้อมูลคะแนนไม่ถูกต้อง";
    }

    function calSubtograde($subject){
        if($subject >= 80){
            return $CalSub = 4;
        } elseif($subject >= 75){
            return $CalSub = 3.5;
        } elseif($subject >= 70){
            return $CalSub = 3;
        } elseif($subject >= 65){
            return $CalSub = 2.5;
        } elseif($subject >= 60){
            return $CalSub = 2;
        } elseif($subject >= 55){
            return $CalSub = 1.5;
        } elseif($subject >= 50){
            return $CalSub = 1;
        } else{
            return $CalSub = 0;
        }
        return $CalSub = "ข้อมูลคะแนนไม่ถูกต้อง";
    }

    

    function calGpa($sub1,$sub2,$sub3,$sub4,$sub5,$sub6,$sub7){
        $subgrade1 = calSubtograde($sub1);
        $subgrade2 = calSubtograde($sub2);
        $subgrade3 = calSubtograde($sub3);
        $subgrade4 = calSubtograde($sub4);
        $subgrade5 = calSubtograde($sub5);
        $subgrade6 = calSubtograde($sub6);
        $subgrade7 = calSubtograde($sub7);
        // $number = (($sub1 * 3) +($sub2 * 3) + ($sub3 * 3) + ($sub4 * 3) + ($sub5 * 3) + ($sub6 * 3) + ($sub7 * 3))/21;
        $number = (($subgrade1 * 3) +($subgrade2 * 3) + ($subgrade3 * 3) + ($subgrade4 * 3) + ($subgrade5 * 3) + ($subgrade6 * 3) + ($subgrade7 * 3))/21;
        return number_format((float)$number, 2, '.', '');
    }

    function calGPax($sub1,$sub2,$sub3,$sub4,$sub5,$sub6,$sub7,$sub8){
        $number = ($sub1 + $sub2 + $sub3 + $sub4 + $sub5 + $sub6 + $sub7 + $sub8)/8;
        return number_format((float)$number, 2, '.', '');
    }

    function response($status, $status_message, $data){
        header("HTTP/1.1", $status);
        $response['status'] = $status;
        $response['status_message'] = $status_message;
        $response['data'] = $data;
        $json_response = json_encode($response);
        echo $json_response;
    }
?>