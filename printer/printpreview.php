<?php
include 'fpdf/fpdf.php';
include '../include/conDB.php';

define('FPDF_FONTPATH', 'fpdf/font/');
$pdf = new FPDF('P','mm','A4');

$pdf->AddFont('angsana','','angsa.php');
 
// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวหนา  กำหนด ชื่อ เป็น angsana
$pdf->AddFont('angsana','B','angsab.php');
 
// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวหนา  กำหนด ชื่อ เป็น angsana
$pdf->AddFont('angsana','I','angsai.php');
 
// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวหนา  กำหนด ชื่อ เป็น angsana
$pdf->AddFont('angsana','BI','angsaz.php');

$pdf->AddFont('angsana','U','angsaz.php');

$pdf->AddFont('angsana','BU','angsaz.php');

$pdf->AddFont('angsana','IU','angsaz.php');

$pdf->AddFont('angsana','BIU','angsaz.php');


$idleave = $_GET["print"];
$sql = "SELECT * FROM leave_leavepreview WHERE leave_id ='".$idleave."' ";
$result = $conn->query($sql);
$objResult = mysqli_fetch_assoc($result);


$id = $objResult['personnel_id'];
$sql2 = "SELECT * FROM leave_personnel WHERE personnel_id ='".$id."' ";
$result2 = $conn->query($sql2);
$objResult2 = mysqli_fetch_assoc($result2);


$affiliation = $objResult['personnel_Affiliation'];
$sql4 = "SELECT * FROM `personnel_affiliation` WHERE `affiliation`='".$affiliation."'";
$result4 = $conn->query($sql4);
$objResult4 = mysqli_fetch_assoc($result4);


$director = 'ผู้อำนวยการโรงพยาบาล';
$sql5 = "SELECT * FROM `personnel_affiliation` WHERE `affiliation_position`='".$director."'";
$result5 = $conn->query($sql5);
$objResult5 = mysqli_fetch_assoc($result5);


//ตัวแปร
$day = '1';
$month = 'มกราคม';
$year = '2561';
$name = $objResult['personnel_name'];
$position = $objResult['personnel_position'];
$degree = $objResult['personnel_degree'];
$leaveCollect = $objResult['personnel_leavecollect'];
$leaveleft = $objResult['personnel_leaveleft'];
$leaveall = $objResult['personnel_leaveall'];

$thai_day_arr=array("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์");
$thai_month_arr=array(
    "0"=>"",
    "1"=>"มกราคม",
    "2"=>"กุมภาพันธ์",
    "3"=>"มีนาคม",
    "4"=>"เมษายน",
    "5"=>"พฤษภาคม",
    "6"=>"มิถุนายน", 
    "7"=>"กรกฎาคม",
    "8"=>"สิงหาคม",
    "9"=>"กันยายน",
    "10"=>"ตุลาคม",
    "11"=>"พฤศจิกายน",
    "12"=>"ธันวาคม"                 
);
function thai_date($time){
    global $thai_day_arr,$thai_month_arr;
    
    $thai_date_return.= "".date("j",$time);
    $thai_date_return.=" เดือน".$thai_month_arr[date("n",$time)];
    $thai_date_return.= " พ.ศ.".(date("Yํ",$time)+543);
    
    return $thai_date_return;
}

$leavedate = $objResult['leave_date'];
$eng_date1=strtotime($leavedate); 
$leavedatethai = thai_date($eng_date1);

$since = $objResult['personnel_leavesince'];
$eng_date=strtotime($since); 
$sincethai = thai_date($eng_date);
// $since_day = '1';
// $since_month = 'มกราคม';
// $since_year = '2561';
$at = $objResult['personnel_leaveat'];
$eng_date2=strtotime($at); 
$atthai = thai_date($eng_date2);
// $at_day = '2';
// $at_month = 'มกราคม';
// $at_year = '2561';
$datetime1 = new DateTime($since);
$datetime2 = new DateTime($at);
$interval = $datetime1->diff($datetime2);
$leave1 = $interval->format('%a');
$leave = $leave1 + 1;

$commune = $objResult['personnel_commune'];
$tel = $objResult['personnel_phone'];


$boss1 = $objResult4['name_affiliation'];
$boss2 = $objResult5['name_affiliation'];

$position2 = $objResult4['affiliation_position'];


$personnel_sig = $objResult2['personnel_signature'];
$sig = 'image/sig/'.$personnel_sig.'';


$confirm1 = $objResult['leave_status1'];
$personnel_sigboss1 = $objResult4['affiliation_sig'];
$sigboss1 = 'image/sig/'.$personnel_sigboss1.'';

$confirm2 = $objResult['leave_status2'];
$personnel_sigboss2 = $objResult5['affiliation_sig'];
$sigboss2 = 'image/sig/'.$personnel_sigboss2.'';




$leave_sum = $leaveCollect + $leave;


$pdf->AddPage();


//Line
$pdf->Line(5,190,205,190);


// หัวกระดาา
$pdf->SetFont('angsana','B',20);
$pdf->setXY( 85, 15  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ใบลาพักผ่อน' ) );

//วว/ดด/ปป
$pdf->SetFont('angsana','',16);
$pdf->setXY( 130, 35  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'วันที่' ) );


$pdf->SetFont('angsana','BI',16);
$pdf->setXY( 140, 35  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , $leavedatethai ) );





//เรื่ง ขอลาพักผ่อน
$pdf->SetFont('angsana','',16);
$pdf->setXY( 15, 45  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'เรื่อง   ขอลาพักผ่อน' ) );


//เรียน ผู้อำนวยการ
$pdf->SetFont('angsana','',16);
$pdf->setXY( 15, 55  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'เรียน   ผู้อำนวยการโรงพยาบาลศรีสงคราม' ) );

//
$pdf->SetFont('angsana','',16);
$pdf->setXY( 40, 75  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ข้าพเจ้า' ) );

$pdf->SetFont('angsana','BI',16);
$pdf->setXY( 55, 75  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , $name ) );

$pdf->SetFont('angsana','',16);
$pdf->setXY( 110, 75  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ตำแหน่ง' ) );

$pdf->SetFont('angsana','BI',16);
$pdf->setXY( 130, 75  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , $position ) );


//
$pdf->SetFont('angsana','',16);
$pdf->setXY( 15, 85  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ระดับ' ) );

$pdf->SetFont('angsana','BI',16);
$pdf->setXY( 30, 85  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , $degree ) );

$pdf->SetFont('angsana','',16);
$pdf->setXY( 80, 85  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'สังกัด' ) );

$pdf->SetFont('angsana','BI',16);
$pdf->setXY( 95, 85  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , $affiliation ) );


//
$pdf->SetFont('angsana','',16);
$pdf->setXY( 15, 95  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'มีเวลาพักผ่อนสะสม' ) );

$pdf->SetFont('angsana','BI',16);
$pdf->setXY( 48, 95  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , $leaveCollect ) );

$pdf->SetFont('angsana','',16);
$pdf->setXY( 53, 95  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'วันทำการ' ) );

$pdf->SetFont('angsana','',16);
$pdf->setXY( 75, 95  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'มีสิทธิลาพักผ่อนประจำปีนี้อีก' ) );

$pdf->SetFont('angsana','BI',16);
$pdf->setXY( 125, 95  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , $leaveleft ) );

$pdf->SetFont('angsana','',16);
$pdf->setXY( 130, 95  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'วันทำการ' ) );

$pdf->SetFont('angsana','',16);
$pdf->setXY( 150, 95  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'รวมเป็น' ) );

$pdf->SetFont('angsana','BI',16);
$pdf->setXY( 165, 95  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , $leaveall ) );

$pdf->SetFont('angsana','',16);
$pdf->setXY( 172, 95  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'วันทำการ' ) );


//
$pdf->SetFont('angsana','',16);
$pdf->setXY( 15, 105  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ขอลาพักผ่อนตั้งแต่วันที่' ) );

$pdf->SetFont('angsana','BI',16);
$pdf->setXY( 53, 105  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , $sincethai ) );

//
//

$pdf->SetFont('angsana','',16);
$pdf->setXY( 101, 105  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ถึงวันที่' ) );

$pdf->SetFont('angsana','BI',16);
$pdf->setXY( 115, 105  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , $atthai ) );

//
//

$pdf->SetFont('angsana','',16);
$pdf->setXY( 170, 105  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'มีกำหนด' ) );

$pdf->SetFont('angsana','BI',16);
$pdf->setXY( 186, 105  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , $leave) );

$pdf->SetFont('angsana','',16);
$pdf->setXY( 190, 105  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'วัน' ) );


//
$pdf->SetFont('angsana','',16);
$pdf->setXY( 15, 115  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'ในระหว่างลาจะติดต่อข้าพเจ้าได้ที่' ) );

$pdf->SetFont('angsana','BI',16);
$pdf->setXY( 70, 115  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , $commune ) );


//
$pdf->SetFont('angsana','',16);
$pdf->setXY( 15, 125  );
$pdf->MultiCell(  0 , 0 , iconv( 'UTF-8','cp874' , 'หมายเลขโทรศัพท์' ) );

$pdf->SetFont('angsana','BI',16);
$pdf->setXY( 50, 125  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , $tel ) );


//
$pdf->SetFont('angsana','BU',16);
$pdf->setXY( 15, 150  );
$pdf->MultiCell(  0 , 0 , iconv( 'UTF-8','cp874' , 'สถิติการลาปีงบประมาณนี้' ) );


//
$pdf->SetFont('angsana','U',16);
$pdf->setXY( 15, 157  );
$pdf->MultiCell(  0 , 0 , iconv( 'UTF-8','cp874' , 'ลามาแล้ว(วันทำการ)' ) );

$pdf->SetFont('angsana','BI',16);
$pdf->setXY( 52, 157  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , $leaveCollect ) );

$pdf->SetFont('angsana','U',16);
$pdf->setXY( 15, 164  );
$pdf->MultiCell(  0 , 0 , iconv( 'UTF-8','cp874' , 'ลาครั้งนี้(วันทำการ)' ) );

$pdf->SetFont('angsana','BI',16);
$pdf->setXY( 52, 164  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , $leave ) );

$pdf->SetFont('angsana','U',16);
$pdf->setXY( 15, 171  );
$pdf->MultiCell(  0 , 0 , iconv( 'UTF-8','cp874' , 'รวมเป็น(วันทำการ)' ) );

$pdf->SetFont('angsana','BI',16);
$pdf->setXY( 52, 171  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , $leave_sum ) );


//
$pdf->SetFont('angsana','',16);
$pdf->setXY( 115, 160  );
$pdf->MultiCell(  0 , 0 , iconv( 'UTF-8','cp874' , '(ลงชื่อ)' ) );

// $pdf->setXY( 130, 155  );
$pdf->Image($sig, 130, 150, 30, 15 );


$pdf->SetFont('angsana','',16);
$pdf->setXY( 115, 170  );
$pdf->MultiCell(  0 , 0 , iconv( 'UTF-8','cp874' , '(' ) );


$pdf->SetFont('angsana','BI',16);
$pdf->setXY( 130, 170  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , $name ) );

$pdf->SetFont('angsana','',16);
$pdf->setXY( 180, 170  );
$pdf->MultiCell(  0 , 0 , iconv( 'UTF-8','cp874' , ')' ) );


//
$pdf->SetFont('angsana','BU',16);
$pdf->setXY( 10, 195  );
$pdf->MultiCell(  0 , 0 , iconv( 'UTF-8','cp874' , 'ความเห็นของผู้บังคับบัญชา' ) );


//
$pdf->SetFont('angsana','B',16);
$pdf->setXY( 15, 220  );
$pdf->MultiCell(  0 , 0 , iconv( 'UTF-8','cp874' , 'คำสั่ง' ) );

$pdf->SetFont('angsana','BI',16);
$pdf->setXY( 40, 220  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , $confirm1 ) );


//
$pdf->SetFont('angsana','',16);
$pdf->setXY( 15, 240  );
$pdf->MultiCell(  0 , 0 , iconv( 'UTF-8','cp874' , '(ลงชื่อ)' ) );

if($confirm1 == 'รออนุญาติ'){

}
else{
    $pdf->Image($sigboss1, 30, 230, 30, 15 );
}


$pdf->SetFont('angsana','',16);
$pdf->setXY( 65, 240  );
$pdf->MultiCell(  0 , 0 , iconv( 'UTF-8','cp874' , 'ผู้ตรวจสอบ' ) );


//
$pdf->SetFont('angsana','',16);
$pdf->setXY( 15, 250  );
$pdf->MultiCell(  0 , 0 , iconv( 'UTF-8','cp874' , '(' ) );


$pdf->SetFont('angsana','BI',16);
$pdf->setXY( 30, 250  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , $boss1 ) );

$pdf->SetFont('angsana','',16);
$pdf->setXY( 75, 250  );
$pdf->MultiCell(  0 , 0 , iconv( 'UTF-8','cp874' , ')' ) );


//
$pdf->SetFont('angsana','',16);
$pdf->setXY( 15, 260  );
$pdf->MultiCell(  0 , 0 , iconv( 'UTF-8','cp874' , 'ตำแหน่ง' ) );


$pdf->SetFont('angsana','BI',16);
$pdf->setXY( 30, 260  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , $position2 ) );


//วว/ดด/ปป
$pdf->SetFont('angsana','',16);
$pdf->setXY( 15, 270  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'วันที่' ) );


$pdf->SetFont('angsana','BI',16);
$pdf->setXY( 25, 270  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , $leavedatethai ) );



//
//
//
$pdf->SetFont('angsana','B',16);
$pdf->setXY( 115, 220  );
$pdf->MultiCell(  0 , 0 , iconv( 'UTF-8','cp874' , 'คำสั่ง' ) );

$pdf->SetFont('angsana','BI',16);
$pdf->setXY( 140, 220  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , $confirm2 ) );


$pdf->SetFont('angsana','',16);
$pdf->setXY( 115, 240  );
$pdf->MultiCell(  0 , 0 , iconv( 'UTF-8','cp874' , '(ลงชื่อ)' ) );

if($confirm1 == 'รออนุญาติ'){

}
else{
    $pdf->Image($sigboss2, 130, 230, 30, 15 );
}


//
$pdf->SetFont('angsana','',16);
$pdf->setXY( 115, 250  );
$pdf->MultiCell(  0 , 0 , iconv( 'UTF-8','cp874' , '(' ) );


$pdf->SetFont('angsana','BI',16);
$pdf->setXY( 130, 250  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , $boss2 ) );

$pdf->SetFont('angsana','',16);
$pdf->setXY( 175, 250  );
$pdf->MultiCell(  0 , 0 , iconv( 'UTF-8','cp874' , ')' ) );


//
$pdf->SetFont('angsana','',16);
$pdf->setXY( 120, 260  );
$pdf->MultiCell(  0 , 0 , iconv( 'UTF-8','cp874' , 'ผู้อำนวยการโรงพยาบาลศรีสงคราม' ) );



//วว/ดด/ปป
$pdf->SetFont('angsana','',16);
$pdf->setXY( 115, 270  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'วันที่' ) );


$pdf->SetFont('angsana','BI',16);
$pdf->setXY( 125, 270  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , $leavedatethai ) );




$pdf->Output();
?>
