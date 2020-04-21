<?php
$month = array(
    '01'  => 'มกราคม', '02'  => 'กุมภาพันธ์', '03'  => 'มีนาคม',
    '04'  => 'เมษายน', '05'  => 'พฤษภาคม', '06'  => 'มิถุนายน',
    '07'  => 'กรกฎาคม', '08'  => 'สิงหาคม', '09'  => 'กันยายน',
    '10'  => 'ตุลาคม', '11'  => 'พฤศจิกายน', '12'  => 'ธันวาคม',
);
function thaiDate($date)
{
    // list($date, $time) = explode(' ', $datetime); // แยกวันที่ กับ เวลาออกจากกัน
    // list($H, $i, $s) = explode(':', $time); // แยกเวลา ออกเป็น ชั่วโมง นาที วินาที
    list($Y, $m, $d) = explode('-', $date); // แยกวันเป็น ปี เดือน วัน
    $Y = $Y + 543; // เปลี่ยน ค.ศ. เป็น พ.ศ.
    switch ($m) {
        case "01":
            $m = "ม.ค.";
            break;
        case "02":
            $m = "ก.พ.";
            break;
        case "03":
            $m = "มี.ค.";
            break;
        case "04":
            $m = "เม.ย.";
            break;
        case "05":
            $m = "พ.ค.";
            break;
        case "06":
            $m = "มิ.ย.";
            break;
        case "07":
            $m = "ก.ค.";
            break;
        case "08":
            $m = "ส.ค.";
            break;
        case "09":
            $m = "ก.ย.";
            break;
        case "10":
            $m = "ต.ค.";
            break;
        case "11":
            $m = "พ.ย.";
            break;
        case "12":
            $m = "ธ.ค.";
            break;
    }
    return $d . " " . $m . " " . $Y;
}

use setasign\Fpdi;
use setasign\fpdf;

error_reporting(E_ALL);
ini_set('display_errors', 1);
set_time_limit(2);
date_default_timezone_set('UTC');
$start = microtime(true);

global $pdf;
$pdf = new Fpdi\Fpdi('P', 'mm', 'A4');
//$pdf = new Fpdi\TcpdfFpdi('L', 'mm', 'A3');

if ($pdf instanceof \TCPDF) {
    $pdf->SetProtection(['print'], '', 'owner');
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);
}

$pdf->SetAutoPageBreak(false, 0);
$pdf->AddFont('BrowalliaUPC', '', 'BrowaUPC.php');


function customHeader($page_no, $date_str)
{
    global $pdf;
    //$prefix = "public/assets/front-end/pdf-files/";
    $prefix = "uploads/pdf/";

    $pdf->SetFont('BrowalliaUPC', '', 15);

    $pdf->image($prefix . "logo_pdf.png", 5, 7, 40);

    $pdf->setY(14);

    $pdf->setX(80);
    // $pdf->cell(50, 6, iconv('UTF-8', 'cp874', "วันที่ ".$date_str), 0, 0, 'C');

    $pdf->setX(155);
    $pdf->cell(50, 6, iconv('UTF-8', 'cp874', "หน้้า " . $page_no), 0, 0, 'R');

    $pdf->SetFillColor(156, 155, 156);
    $pdf->Rect(4, 22.7, 202, 0.45, "F");
}
function customFooter()
{
    global $pdf;

    $footer_text = "โดย บริษัท วัน ศิริ แอคเคาน์ติ้ง แอนด์ แทกซ์ จำกัด / ผู้พิมพ์ ผู้โฆษณา และบรรณาธิการ นายณัฐวัฒน์ โลหะพิทักษ์
สำนักงาน 445 ถนนวิภาวดีรังสิต แขวงจอมพล เขตจตุจักร กรุงเทพมหานครฯ 10900 โทร 098-2811599";
    $pdf->SetFont('BrowalliaUPC', '', 13);

    $pdf->SetFillColor(0, 0, 0);
    $pdf->Rect(4, 279, 202, 0.1, "F");

    $pdf->setY(282);
    $pdf->setX(0);
    $pdf->MultiCell(200, 5.4, iconv('UTF-8', 'cp874', $footer_text), 0, 'C');
}


function drawData4page($pos, $data)
{
    global $pdf;
    $pdf->SetLineWidth(0.2);

    switch ($pos) {
        case 1:
            $pdf->Rect(10, 40, 190, 220, "");
            $adjust_x = 10;
            $adjust_y = 10;
            break;
        case 2:
            $pdf->Rect(106, 26.5, 99.5, 124, "");
            $adjust_x = 101;
            $adjust_y = 0;
            break;
        case 3:
            $pdf->Rect(5, 152, 99.5, 124, "");
            $adjust_x = 0;
            $adjust_y = 125;
            break;
        case 4:
            $pdf->Rect(106, 152, 99.5, 124, "");
            $adjust_x = 101;
            $adjust_y = 125;
            break;

        default:
            break;
    }

    $pdf->SetLineWidth(0.01);
    $pdf->SetFont('BrowalliaUPC', '', 14);


    $pdf->setY($adjust_y + 32);
    // $pdf->setX($adjust_x + 100);
    $pdf->MultiCell(0, 8.4, iconv('UTF-8', 'cp874', $data['company']), 0, 'R');

    // $pdf->setY($adjust_y + 35);
    // $pdf->setX($adjust_x + 118.5);
    // $pdf->MultiCell(99.5, 25.4, iconv('UTF-8', 'cp874', thaiDate($data['date'])), 0, 'C');

    $pdf->setY($adjust_y + 40);
    $pdf->setX($adjust_x + 8);
    $pdf->MultiCell(99.5, 25.7, iconv('UTF-8', 'cp874', $data['title']), 0, 'L');

    $pdf->setY($adjust_y + 50);
    $pdf->setX($adjust_x + 8);
    $pdf->MultiCell(99.5, 25.7, iconv('UTF-8', 'cp874', $data['to']), 0, 'L');

    $pdf->setY($adjust_y + 80);
    $pdf->setX($adjust_x + 8);
    $pdf->MultiCell(175, 10, iconv('UTF-8', 'cp874', '        ' . $data['description']), 0, 'L');

    $pdf->setX($adjust_x + 8);
    $pdf->MultiCell(0, 0, iconv('UTF-8', 'cp874', ""), 0, 'L');

    $pdf->setX($adjust_x + 8);

    $list = "";
    if ($data['list']) {
        foreach ($data['list'] as $txt)
            $list .= $txt . "\r\n";
    }

    $pdf->MultiCell(194, 10, iconv('UTF-8', 'cp874', $list), 0, 'L');
    // MultiCell(float w, float h, string txt [, mixed border [, string align [, boolean fill]]])

    // $pdf->setX($adjust_x + 8);
    // $pdf->MultiCell(0, 4, iconv('UTF-8', 'cp874', ""), 0, 'L');

    $pdf->setX($adjust_x + 8);
    $pdf->MultiCell(167, 10, iconv('UTF-8', 'cp874', '        ' . $data['end']), 0, 'L');

    $pdf->setX($adjust_x + 8);
    $pdf->MultiCell(99.5, 20, iconv('UTF-8', 'cp874', ""), 0, 'L');

    $pdf->setX($adjust_x + 70);
    $pdf->MultiCell(50, 7.7, iconv('UTF-8', 'cp874', $data['signature_title']), 0, 'C');
    $pdf->setX($adjust_x + 70);
    $pdf->MultiCell(50, 3, iconv('UTF-8', 'cp874', ""), 0, 'L');
    $pdf->setX($adjust_x + 70);
    $pdf->MultiCell(50, 7.7, iconv('UTF-8', 'cp874', "( " . $data['signature_name'] . " )"), 0, 'C');
    $pdf->setX($adjust_x + 70);
    $pdf->MultiCell(50, 10.7, iconv('UTF-8', 'cp874', $data['signature_position']), 0, 'C');
}

function map($x, $in_min, $in_max, $out_min, $out_max)
{
    return ($x - $in_min) * ($out_max - $out_min) / ($in_max - $in_min) + $out_min;
}

function drawPdfAndImage($pos, $pageNo = null, $file)
{
    global $pdf;

    $file_parts = pathinfo($file);

    $pdf->SetLineWidth(0.5);


    switch ($pos) {
        case 1:
            if ($file_parts['extension'] == 'pdf') {
                $pageId = $pdf->importPageAndRotation($pageNo, '/MediaBox');
                $s = $pdf->useImportedPageCustom($pageId, 5.5, 417, 123);
                // echo json_encode($s);
                // exit();
            } else if ($file_parts['extension'] == 'jpg' || $file_parts['extension'] == 'png' || $file_parts['extension'] == 'jpeg') {
                $size = getimagesize($file);

                $percent_width = 123 / $size[0];
                $new_height = $percent_width * $size[1];

                $x = 5;
                $y = 150;
                $w = 123;
                $h = 200;
                $angle = 90;
                $pdf->Rotate($angle, $x, $y);
                $pdf->Image($file, $x, $y, $w, $new_height);
                $pdf->Rotate(0);
            }

            $pdf->Rect(5, 26.5, 200, 124, "");
            break;
        case 2:
            if ($file_parts['extension'] == 'pdf') {
                $pageId = $pdf->importPageAndRotation($pageNo, '/MediaBox');
                $s = $pdf->useImportedPageCustom($pageId, 5.5, 65, 123);
            } else if ($file_parts['extension'] == 'jpg' || $file_parts['extension'] == 'png' || $file_parts['extension'] == 'jpeg') {
                $x = 5;
                $y = 274;
                $w = 123;
                $h = 200;
                $angle = 90;
                $pdf->Rotate($angle, $x, $y);
                $pdf->Image($file, $x, $y, $w, $h);
                $pdf->Rotate(0);
            }

            $pdf->Rect(5, 150.5, 200, 124, "");
            break;
        default:
            break;
    }
}

//$prefix = "public/assets/front-end/pdf-files/";
$prefix = "uploads/pdf/";
$cutDate = explode('-', $date);
$advertiseDetail = $this->db->get_where('tbl_advertise', ['advertise_id' => $advertise_id])->row_array();

$data_list = array();
$sample_templete = array();
$sample_templete = [
    'company' => $advertiseDetail['company_name'],
    'date' => $advertiseDetail['post_date'],

    'title' => 'เรื่อง ขอเชิญประชุมผู้ถือหุ้น ครั้งที่ ' . $advertiseDetail['meeting'],
    'to' => 'เรียน ' . $advertiseDetail['announcement_to'],
    'description' => 'ด้วยคณะกรรมการของบริษัทมีมติให้เรียกประชุมผู้ถือหุ้นครั้งที่ ' . $advertiseDetail['meeting'] . ' ในวันที่ ' . thaiDate($advertiseDetail['meeting_date']) . ' เวลา ' . $advertiseDetail['meeting_time'] . ' ณ ' . $advertiseDetail['meeting_place'] . ' เพื่อพิจารณาเรื่องต่างๆ ตามระเบียบวาระดังต่อไปนี้',
    'list' => [
        $advertiseDetail['agenda']
    ],
    'end' => 'ดังนั้น จึงขอเรียนเชิญ ไปประชุมตามวัน เวลา และสถานที่ดังกล่าวข้างต้นโดยพร้อมเพรียงกันด้วย จักขอบพระคุณยิ่ง',
    'signature_title' => 'ขอแสดงความนับถือ',
    'signature_name' => $advertiseDetail['name_surname'],
    'signature_position' => $advertiseDetail['position'],
];

array_push($data_list, $sample_templete);





//for ($i=0; $i < 11; $i++) 



$date_str = $date;
$global_page_no = 1;


// // ADD COVER
$pdf->setSourceFile($prefix . "cover_pdf.pdf");

$pdf->AddPage();
$pageId = $pdf->importPage(1, '/MediaBox');
$s = $pdf->useTemplate($pageId, 10, -10, 190, 280);
customFooter();
$global_page_no++;

// FILE OR IMAGE PAGE
$files = [];
// $files = [
//     $prefix.'small.pdf',
//     $prefix.'end.jpg',
//     $prefix.'irene.jpg',
//     $prefix.'test_rotate.pdf',
//     $prefix.'test2.pdf',
//     $prefix.'1.pdf',
//     $prefix.'irene.jpg',
//     $prefix.'germany.jpg',
//     $prefix.'62E-com.pdf',
//     $prefix.'2.pdf',
//     $prefix.'3.pdf',
//     $prefix.'5.pdf',
//     $prefix.'1_1.pdf',
//     $prefix.'ฉบับสัญญาการจ้างผู้พัฒนาซอฟแวร์เว็บไซต์สั่งอาหารออนไลน์2_12_2562.pdf',
// ];

// $pdfList = $this->db->get_where('tbl_pdf',['date'=>$date])->result_array();

// foreach ($pdfList as $pdfDetail) {
//     $files[] = $prefix.$pdfDetail['file_name'];

// }



$pdf->AddPage();
customHeader($global_page_no, $date_str);
customFooter();

$index = 1;
foreach ($data_list as $data) {
    drawData4page($index, $data, $sample_templete);
    $index++;
    if ($index > 4) {
        $index = 1;
        $global_page_no++;
        $pdf->AddPage();
        customHeader($global_page_no, $date_str);
        customFooter();
    }
}


$position = 1;

foreach ($files as $file) {

    $file_parts = pathinfo($file);

    if ($file_parts['extension'] == 'pdf') {
        $pageCount = $pdf->setSourceFile($file);

        for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
            if ($position == 1) {
                $global_page_no++;
                $pdf->AddPage();
                customHeader($global_page_no, $date_str);
                customFooter();
            }
            try {
                drawPdfAndImage($position, $pageNo, $file);

                $position++;
                if ($position > 2)
                    $position = 1;
            } catch (Exception $e) {
                echo json_encode($e);
            }
        }
    } else if ($file_parts['extension'] == 'jpg' || $file_parts['extension'] == 'png' || $file_parts['extension'] == 'jpeg') {
        if ($position == 1) {
            $global_page_no++;
            $pdf->AddPage();
            customHeader($global_page_no, $date_str);
            customFooter();
        }
        try {
            drawPdfAndImage($position, null, $file);
            $position++;

            if ($position > 2)
                $position = 1;
        } catch (Exception $e) {
        }
    }
}

// exit();


$global_page_no++;
// END COVER
$pdf->AddPage();

customHeader($global_page_no, $date_str);
customFooter();

$pdf->image($prefix . "end.jpg", 15, 33, 180);


$file = uniqid() . '.pdf';
$pdf->Output('I', 'simple.pdf');
//$pdf->Output('output/'.$file, 'I');
