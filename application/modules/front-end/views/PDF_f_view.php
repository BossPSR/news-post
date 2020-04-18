<?php
use setasign\Fpdi;
use setasign\fpdf;

error_reporting(E_ALL);
ini_set('display_errors', 1);
set_time_limit(2);
date_default_timezone_set('UTC');
$start = microtime(true);

global $pdf;
$pdf = new Fpdi\Fpdi('P','mm','A4');
//$pdf = new Fpdi\TcpdfFpdi('L', 'mm', 'A3');

if ($pdf instanceof \TCPDF) {
    $pdf->SetProtection(['print'], '', 'owner');
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);

    
}

$pdf->SetAutoPageBreak(false, 0);
$pdf->AddFont('BrowalliaUPC','','BrowaUPC.php');


function customHeader($page_no, $date_str)
{
    global $pdf;
    $prefix = "public/assets/front-end/pdf-files/";

    $pdf->SetFont('BrowalliaUPC','',15);

    $pdf->image($prefix."logo_pdf.png", 5, 7, 40);

    $pdf->setY(14);

    $pdf->setX(80);
    $pdf->cell(50, 6, iconv('UTF-8', 'cp874', "วันที่ ".$date_str), 0, 0, 'C');

    $pdf->setX(155);
    $pdf->cell(50, 6, iconv('UTF-8', 'cp874', "หน้้า ".$page_no), 0, 0, 'R');

    $pdf->SetFillColor(156, 155, 156);
    $pdf->Rect(4, 22.7, 202, 0.45, "F");
}
function customFooter()
{
    global $pdf;

    $footer_text = "โดย บริษัท วัน ศิริ แอคเคาน์ติ้ง แอนด์ แทกซ์ จำกัด / ผู้พิมพ์ ผู้โฆษณา และบรรณาธิการ นายณัฐวัฒน์ โลหะพิทักษ์
สำนักงาน 445 ถนนวิภาวดีรังสิต แขวงจอมพล เขตจตุจักร กรุงเทพมหานครฯ 10900 โทร 098-2811599";
    $pdf->SetFont('BrowalliaUPC','',13);

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
            $pdf->Rect(5, 26.5, 99.5, 124, "");
            $adjust_x = 0;
            $adjust_y = 0;
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
    $pdf->SetFont('BrowalliaUPC','',9);


    $pdf->setY($adjust_y + 32);
    $pdf->setX($adjust_x + 5);
    $pdf->MultiCell(97, 5.4, iconv('UTF-8', 'cp874', $data['company']), 0, 'R');

    $pdf->setY($adjust_y + 45);
    $pdf->setX($adjust_x + 5);
    $pdf->MultiCell(99.5, 5.4, iconv('UTF-8', 'cp874', $data['date']), 0, 'C');

    $pdf->setY($adjust_y + 50);
    $pdf->setX($adjust_x + 8);
    $pdf->MultiCell(99.5, 3.7, iconv('UTF-8', 'cp874', $data['title']), 0, 'L');

    $pdf->setX($adjust_x + 8);
    $pdf->MultiCell(99.5, 3.7, iconv('UTF-8', 'cp874', $data['to']), 0, 'L');

    $pdf->setY($adjust_y + 65);
    $pdf->setX($adjust_x + 8);

    // $nb= wordwrap($data['description'],120);

    $pdf->MultiCell(93.5, 3.7, iconv('UTF-8', 'cp874', '        '.$data['description']), 0, 'L');

    $pdf->setX($adjust_x + 8);
    $pdf->MultiCell(99.5, 2, iconv('UTF-8', 'cp874', ""), 0, 'L');

    $pdf->setX($adjust_x + 15);

    $list = "";
    if($data['list'])
    {
        foreach ($data['list'] as $txt) 
            $list.= $txt."\r\n";
    }

    $pdf->MultiCell(93.5, 3.7, iconv('UTF-8', 'cp874', $list), 0, 'L');

    $pdf->setX($adjust_x + 8);
    $pdf->MultiCell(99.5, 2, iconv('UTF-8', 'cp874', ""), 0, 'L');

    $pdf->setX($adjust_x + 8);
    $pdf->MultiCell(93.5, 3.7, iconv('UTF-8', 'cp874', '        '.$data['end']), 0, 'L');

    $pdf->setX($adjust_x + 8);
    $pdf->MultiCell(99.5, 4, iconv('UTF-8', 'cp874', ""), 0, 'L');

    $pdf->setX($adjust_x + 53);
    $pdf->MultiCell(50, 3.7, iconv('UTF-8', 'cp874', $data['signature_title']), 0, 'C');
    $pdf->setX($adjust_x + 53);
    $pdf->MultiCell(50, 3, iconv('UTF-8', 'cp874', ""), 0, 'L');
    $pdf->setX($adjust_x + 53);
    $pdf->MultiCell(50, 3.7, iconv('UTF-8', 'cp874', "( ".$data['signature_name']." )"), 0, 'C');
    $pdf->setX($adjust_x + 53);
    $pdf->MultiCell(50, 3.7, iconv('UTF-8', 'cp874', $data['signature_position']), 0, 'C');

    
}

function drawPdfAndImage($pos, $pageNo = null, $file)
{
    global $pdf;

    $file_parts = pathinfo($file);

    $pdf->SetLineWidth(0.5);


    switch ($pos) {
        case 1:
            if($file_parts['extension'] == 'pdf')
            {
                $pageId = $pdf->importPageAndRotation($pageNo, '/MediaBox');
                $s = $pdf->useTemplate($pageId, 5.5, -24, 123);
            }
            else if($file_parts['extension'] == 'jpg')
            {
                $x = 5;
                $y = 150;
                $w = 123;
                $h = 200;
                $angle = 90;
                $pdf->Rotate($angle,$x,$y);
                $pdf->Image($file,$x,$y,$w,$h);
                $pdf->Rotate(0);
            }

            $pdf->Rect(5, 26.5, 200, 124, "");
            break;
        case 2:
            if($file_parts['extension'] == 'pdf')
            {
                $pageId = $pdf->importPageAndRotation($pageNo, '/MediaBox');
                $s = $pdf->useTemplate($pageId, 5.5, 100, 123);
            }
            else if($file_parts['extension'] == 'jpg')
            {
                $x = 5;
                $y = 274;
                $w = 123;
                $h = 200;
                $angle = 90;
                $pdf->Rotate($angle,$x,$y);
                $pdf->Image($file,$x,$y,$w,$h);
                $pdf->Rotate(0);
            }

            $pdf->Rect(5, 150.5, 200, 124, "");
            break;
        default:
            break;
    }
}

$prefix = "public/assets/front-end/pdf-files/";

$sample_templete = array(
    'company' => 'บริษัท สมาร์ท เมดิคัล เซอร์วิส จํากัด',
    'date' => '2 เมษายน 2563',
    'title' => 'เรื่อง การประชุมสามัญผู้ถือหุ้น ประจำปี 2563',
    'to' => 'เรียน ผู้ถือหุ้น',
    'description' => 'ในการประชุมคณะกรรมการ ทอท. ครั้งที่ 2/2563 เมื่อวันจันทร์ที่ 3 กุมภาพันธ์ 2563 ณ ห้องประ ชุมคณะกรรมการ ทอท. ชั้น 7 อาคารสํานักงานใหญ่ ทอท. ที่ประชุมมีมติแต่งตั้งคณะกรรมการชุดย่อย ตามข้อบังคับ ทอท. โดยมีผลตั้งแต่วันที่ 3 กุมภาพันธ์ 2563 เป็นต้นไป ดังนี้',
    'list' => array(
        '1. นายวราห์ ทองประสินธุ์ ดํารงตําแหน่งประธานกรรมการตรวจสอบ ',
        '2. นายวราห์ ทองประสินธุ์ ดํารงตําแหน่งประธานกรรมการตรวจสอบ ',
        '3. นายวราห์ ทองประสินธุ์ ดํารงตําแหน่งประธานกรรมการตรวจสอบ ',
        '4. นายวราห์ ทองประสินธุ์ ดํารงตําแหน่งประธานกรรมการตรวจสอบ ',
        '5. นายวราห์ ทองประสินธุ์ ดํารงตําแหน่งประธานกรรมการตรวจสอบ ',
        '6. นายวราห์ ทองประสินธุ์ ดํารงตําแหน่งประธานกรรมการตรวจสอบ ',
        '7. นายวราห์ ทองประสินธุ์ ดํารงตําแหน่งประธานกรรมการตรวจสอบ ',
    ),
    'end' => 'จึงเรียนมาเพื่อโปรดทราบและดาเนินการต่อไปด้วยจะขอบคุณยิ่ง',
    'signature_title' => 'ขอแสดงความนับถือ',
    'signature_name' => 'บังอรสุวรรณี  จรัสแสงแขนภาไขศรี',
    'signature_position' => 'กรรมการผู้มีอำนาจลงนาม',
);

$data_list = array();

for ($i=0; $i < 11; $i++) 
    array_push($data_list, $sample_templete);


$date_str = "1 เมษายน 2563";
$global_page_no = 1;


// // ADD COVER
$pdf->setSourceFile($prefix."cover_pdf.pdf");

$pdf->AddPage();
$pageId = $pdf->importPage(1, '/MediaBox');
$s = $pdf->useTemplate($pageId, 5, 5, 200);
customFooter();
$global_page_no++;

// FILE OR IMAGE PAGE
$files = [
    $prefix.'end.jpg',
    $prefix.'irene.jpg',
    $prefix.'test2.pdf',
    $prefix.'irene.jpg',
    $prefix.'germany.jpg',
];

$pdf->AddPage();
customHeader($global_page_no, $date_str);
customFooter();

$index = 1;
foreach ($data_list as $data) 
{
    drawData4page($index, $data);
    $index++;
    if($index > 4)
    {
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

    if($file_parts['extension'] == 'pdf')
    {
        $pageCount = $pdf->setSourceFile($file);


        for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) 
        {
            if($position == 1)
            {
                $global_page_no++;
                $pdf->AddPage();
                customHeader($global_page_no, $date_str);
                customFooter();
            }
            try 
            {
                drawPdfAndImage($position, $pageNo, $file);

                $position ++;
                if($position > 2)
                    $position = 1;

            } 
            catch (Exception $e) 
            {
            }
            
        }
    }
    else if($file_parts['extension'] == 'jpg')
    {
        if($position == 1)
        {
            $global_page_no++;
            $pdf->AddPage();
            customHeader($global_page_no, $date_str);
            customFooter();
        }
        try 
        {
            drawPdfAndImage($position, null, $file);
            $position ++;

            if($position > 2)
                $position = 1;
         } 
         catch (Exception $e) 
         {
         }
    }

}


$global_page_no++;
// END COVER
$pdf->AddPage();

customHeader($global_page_no, $date_str);
customFooter();

$pdf->image($prefix."end.jpg", 15, 33, 180);


$file = uniqid().'.pdf';
$pdf->Output('I', 'simple.pdf');
//$pdf->Output('output/'.$file, 'I');
?>