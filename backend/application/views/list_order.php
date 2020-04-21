<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <?php include('option/header.php'); ?>
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu 2-columns  navbar-floating footer-static" data-open="hover" data-menu="horizontal-menu" data-col="2-columns">

    <?php include('option/begin_menu.php'); ?>
    <?php include('option/menu.php'); ?>

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">ออเดอร์ ลงตาม template</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="Dashboard">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active">ออเดอร์ ลงตาม template
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrum-right">
                        <!-- <div class="dropdown">
                            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-settings"></i></button>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Chat</a><a class="dropdown-item" href="#">Email</a><a class="dropdown-item" href="#">Calendar</a></div>
                        </div> -->

                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Column selectors with Export Options and print table -->
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">ออเดอร์ ลงตาม template</h4>
                                    <div>
                                        <button type="button" class="btn btn-primary mr-1 mb-1" data-toggle="modal" data-target="#exampleModal">+ เพิ่ม ออเดอร์ ลงตาม template</button></a>

                                    </div>
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <p class="card-text"></p>
                                        <div class="table-responsive">
                                            <table class="table zero-configuration">
                                                <thead>
                                                    <tr>

                                                        <th>#</th>
                                                        <th>ชื่อผู้ลง</th>
                                                        <th>วันที่ลงหนังสือพิมพ์</th>
                                                        <th>วันที่สร้าง</th>

                                                        <th>เครื่องมือ</th>
                                                    </tr>
                                                </thead>
                                                <?php $i = 1; ?>
                                                <tbody>
                                                    <?php foreach ($advertise as $key => $advertise) : ?>
                                                        <tr>
                                                            <td><?php echo $i++ ?></td>
                                                            <td>
                                                                <?php if ($advertise['id_user'] == 'Admin') : ?>
                                                                    <?php echo $advertise['id_user']; ?>
                                                                <?php else : ?>
                                                                    <?php $the = $this->db->get_where('tbl_user', ['id_user' => $advertise['id_user']])->row_array(); ?>
                                                                    <?php echo $the['company']; ?>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td><?php echo $advertise['post_date']; ?></td>
                                                            <td><?php echo $advertise['created_at']; ?></td>

                                                            <td>
                                                                <button class="btn btn-info" data-toggle="modal" data-target="#exampleModalde<?php echo $advertise['advertise_id']; ?>">รายละเอียด</button>
                                                                <div class="modal fade" id="exampleModalde<?php echo $advertise['advertise_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <form action="pdf_edit_com" method="post" class="form-horizontal" enctype="multipart/form-data">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="exampleModalLabel">ลงตาม template</h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>


                                                                                <div class="modal-body">
                                                                                      <input type="text" name="" value="<?php echo $advertise['advertise_id']; ?>" hidden>
                                                                                      <?php if($advertise['agenda']!=""):?>
                                                                                    <div class="form-group" style="text-align: left;font-size:16px;">
                                                                                        <b>วาระการประชุม <span style="color:red;">( เพื่อความถูกต้องของข้อมูล แนะนำให้พิมพ์เท่านั้น !! ) จำกัดจำนวนบรรทัด 10 บรรทัด</span></b>
                                                                                        <textarea class="form-control" name="agendaA" id="agendaA" rows="9" placeholder="สถานที่จัดประชุม / ที่อยู่บริษัท (กรณีเลิกบริษัท)">
                                                                                        <?php echo $advertise['agenda']; ?>
                                                                                        </textarea>

                                                                                    </div>
                                                                                      <?php endif;?>
                                                                                      <?php if($advertise['company_name']!=""):?>    
                                                                                    <div class="form-group" style="text-align: left;font-size:16px;">
                                                                                        <b>ชื่อบริษัท / ชื่อหน่วยงาน</b>
                                                                                        <input type="text" name="companyA" id="companyA"  value="<?php echo $advertise['company_name']; ?>" class="form-control" placeholder="ชื่อบริษัท / ชื่อหน่วยงาน">
                                                                                    </div>
                                                                                    <?php endif;?>
                                                                                    <?php if($advertise['tax']!=""):?>    
                                                                                    <div class="form-group" style="text-align: left;font-size:16px;">
                                                                                        <b>เลขประจำตัวผู้เสียภาษี</b>
                                                                                        <input type="text" name="TaxpayerB" id="TaxpayerB" class="form-control" value="<?php echo $advertise['tax']; ?>"  placeholder="เลขประจำตัวผู้เสียภาษี">
                                                                                    </div>
                                                                                    <?php endif;?>
                                                                                    <?php if($advertise['meeting']!=""):?> 
                                                                                    <div class="form-group" style="text-align: left;font-size:16px;">
                                                                                        <b>ครั้งที่ประชุม</b>
                                                                                        <input type="text" name="meetingA" id="meetingA" class="form-control" value="<?php echo $advertise['meeting']; ?>" placeholder="ครั้งที่ประชุม">
                                                                                    </div>
                                                                                    <?php endif;?>
                                                                                    <?php if($advertise['announcement_to']!=""):?> 
                                                                                    <div class="form-group" style="text-align: left;font-size:16px;">
                                                                                        <b>ประกาศถึง</b>
                                                                                        <input type="text" name="announceA" id="announceA" class="form-control"  value="<?php echo $advertise['announcement_to']; ?>" placeholder="ประกาศถึง">
                                                                                    </div>
                                                                                    <?php endif;?>
                                                                                    <?php if($advertise['out_date']!=""):?> 
                                                                                    <div class="form-group travel-date-group" style="text-align: left;font-size:16px;">
                                                                                        <b>วันที่ประกาศเลิกบริษัท</b>
                                                                                        <input type="text" name="dissolveB" id="dissolveB" value="<?php echo $advertise['out_date']; ?>" class="form-control tleft default" placeholder="วันที่ประกาศเลิกบริษัท">
                                                                                    </div>
                                                                                    <?php endif;?>
                                                                                    <?php if($advertise['meeting_date']!=""):?> 
                                                                                    <div class="row">
                                                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                                                                            <div class="form-group travel-date-group" style="text-align: left;font-size:16px;">
                                                                                                <b>วันที่จัดประชุม</b>
                                                                                                <input type="date" name="announcedateA" id="announcedateA" value="<?php echo $advertise['meeting_date']; ?>" min="<?php echo date('Y-m-d'); ?>" class="form-control tleft default" placeholder="วันที่จัดประชุม">
                                                                                            </div>
                                                                                        </div>
                                                                                        <?php endif;?>
                                                                                        <?php if($advertise['meeting_time']!=""):?> 
                                                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                                                                            <div class="form-group" style="text-align: left;font-size:16px;">
                                                                                                <b>เวลาจัดประชุม</b>
                                                                                                <select class="form-control" name="timeA" id="timeA">
                                                                                                    <option selected disabled>--- เลือกเวลาจัดประชุม ---</option>
                                                                                                 
                                                                                                    <option value="0:00" <?php if ($advertise['meeting_time'] == "0:00") {echo "selected='selected'";} ?>>0:00</option>
                                                                                                    <option value="0:30" <?php if ($advertise['meeting_time'] == "0:30") {echo "selected='selected'";} ?>>0:30</option>
                                                                                                    <option value="1:00" <?php if ($advertise['meeting_time'] == "1:00") {echo "selected='selected'";} ?>>1:00</option>
                                                                                                    <option value="1:30" <?php if ($advertise['meeting_time'] == "1:30") {echo "selected='selected'";} ?>>1:30</option>
                                                                                                    <option value="2:00" <?php if ($advertise['meeting_time'] == "2:00") {echo "selected='selected'";} ?>>2:00</option>
                                                                                                    <option value="2:30" <?php if ($advertise['meeting_time'] == "2:30") {echo "selected='selected'";} ?>>2:30</option>
                                                                                                    <option value="3:00" <?php if ($advertise['meeting_time'] == "3:00") {echo "selected='selected'";} ?>>3:00</option>
                                                                                                    <option value="3:30" <?php if ($advertise['meeting_time'] == "3:30") {echo "selected='selected'";} ?>>3:30</option>
                                                                                                    <option value="4:00" <?php if ($advertise['meeting_time'] == "4:00") {echo "selected='selected'";} ?>>4:00</option>
                                                                                                    <option value="4:30" <?php if ($advertise['meeting_time'] == "4:30") {echo "selected='selected'";} ?>>4:30</option>
                                                                                                    <option value="5:00" <?php if ($advertise['meeting_time'] == "5:00") {echo "selected='selected'";} ?>>5:00</option>
                                                                                                    <option value="5:30" <?php if ($advertise['meeting_time'] == "5:30") {echo "selected='selected'";} ?>>5:30</option>
                                                                                                    <option value="6:00" <?php if ($advertise['meeting_time'] == "6:00") {echo "selected='selected'";} ?>>6:00</option>
                                                                                                    <option value="6:30" <?php if ($advertise['meeting_time'] == "6:30") {echo "selected='selected'";} ?>>6:30</option>
                                                                                                    <option value="7:00" <?php if ($advertise['meeting_time'] == "7:00") {echo "selected='selected'";} ?>>7:00</option>
                                                                                                    <option value="7:30" <?php if ($advertise['meeting_time'] == "7:30") {echo "selected='selected'";} ?>>7:30</option>
                                                                                                    <option value="8:00" <?php if ($advertise['meeting_time'] == "8:00") {echo "selected='selected'";} ?>>8:00</option>
                                                                                                    <option value="8:30" <?php if ($advertise['meeting_time'] == "8:30") {echo "selected='selected'";} ?>>8:30</option>
                                                                                                    <option value="9:00" <?php if ($advertise['meeting_time'] == "9:00") {echo "selected='selected'";} ?>>9:00</option>
                                                                                                    <option value="9:30" <?php if ($advertise['meeting_time'] == "9:30") {echo "selected='selected'";} ?>>9:30</option>
                                                                                                    <option value="10:00" <?php if ($advertise['meeting_time'] == "10:00") {echo "selected='selected'";} ?>>10:00</option>
                                                                                                    <option value="10:30" <?php if ($advertise['meeting_time'] == "10:30") {echo "selected='selected'";} ?>>10:30</option>
                                                                                                    <option value="11:00" <?php if ($advertise['meeting_time'] == "11:00") {echo "selected='selected'";} ?>>11:00</option>
                                                                                                    <option value="11:30" <?php if ($advertise['meeting_time'] == "11:30") {echo "selected='selected'";} ?>>11:30</option>
                                                                                                    <option value="12:00" <?php if ($advertise['meeting_time'] == "12:00") {echo "selected='selected'";} ?>>12:00</option>
                                                                                                    <option value="12:30"<?php if ($advertise['meeting_time'] == "12:30") {echo "selected='selected'";} ?>>12:30</option>
                                                                                                    <option value="13:00"<?php if ($advertise['meeting_time'] == "13:00") {echo "selected='selected'";} ?>>13:00</option>
                                                                                                    <option value="13:30"<?php if ($advertise['meeting_time'] == "13:30") {echo "selected='selected'";} ?>>13:30</option>
                                                                                                    <option value="14:00"<?php if ($advertise['meeting_time'] == "14:00") {echo "selected='selected'";} ?>>14:00</option>
                                                                                                    <option value="14:30"<?php if ($advertise['meeting_time'] == "14:30") {echo "selected='selected'";} ?>>14:30</option>
                                                                                                    <option value="15:00"<?php if ($advertise['meeting_time'] == "15:00") {echo "selected='selected'";} ?>>15:00</option>
                                                                                                    <option value="15:30"<?php if ($advertise['meeting_time'] == "15:30") {echo "selected='selected'";} ?>>15:30</option>
                                                                                                    <option value="16:00"<?php if ($advertise['meeting_time'] == "16:00") {echo "selected='selected'";} ?>>16:00</option>
                                                                                                    <option value="16:30"<?php if ($advertise['meeting_time'] == "16:30") {echo "selected='selected'";} ?>>16:30</option>
                                                                                                    <option value="17:00"<?php if ($advertise['meeting_time'] == "17:00") {echo "selected='selected'";} ?>>17:00</option>
                                                                                                    <option value="17:30"<?php if ($advertise['meeting_time'] == "17:30") {echo "selected='selected'";} ?>>17:30</option>
                                                                                                    <option value="18:00"<?php if ($advertise['meeting_time'] == "18:00") {echo "selected='selected'";} ?>>18:00</option>
                                                                                                    <option value="18:30"<?php if ($advertise['meeting_time'] == "18:30") {echo "selected='selected'";} ?>>18:30</option>
                                                                                                    <option value="19:00"<?php if ($advertise['meeting_time'] == "19:00") {echo "selected='selected'";} ?>>19:00</option>
                                                                                                    <option value="19:30"<?php if ($advertise['meeting_time'] == "19:30") {echo "selected='selected'";} ?>>19:30</option>
                                                                                                    <option value="20:00"<?php if ($advertise['meeting_time'] == "20:00") {echo "selected='selected'";} ?>>20:00</option>
                                                                                                    <option value="20:30"<?php if ($advertise['meeting_time'] == "20:30") {echo "selected='selected'";} ?>>20:30</option>
                                                                                                    <option value="21:00"<?php if ($advertise['meeting_time'] == "21:00") {echo "selected='selected'";} ?>>21:00</option>
                                                                                                    <option value="21:30"<?php if ($advertise['meeting_time'] == "21:30") {echo "selected='selected'";} ?>>21:30</option>
                                                                                                    <option value="22:00"<?php if ($advertise['meeting_time'] == "22:00") {echo "selected='selected'";} ?>>22:00</option>
                                                                                                    <option value="22:30"<?php if ($advertise['meeting_time'] == "22:30") {echo "selected='selected'";} ?>>22:30</option>
                                                                                                    <option value="23:00"<?php if ($advertise['meeting_time'] == "23:00") {echo "selected='selected'";} ?>>23:00</option>
                                                                                                    <option value="23:30"<?php if ($advertise['meeting_time'] == "23:30") {echo "selected='selected'";} ?>>23:30</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <?php endif;?>
                                                                                    <?php if($advertise['meeting_time']!=""):?>  
                                                                                    <div class="form-group" style="text-align: left;font-size:16px;">
                                                                                        <b>สถานที่จัดประชุม / ที่อยู่บริษัท (กรณีเลิกบริษัท)</b>
                                                                                        <textarea class="form-control" name="placeA" id="placeA" rows="5" value=""  placeholder="สถานที่จัดประชุม / ที่อยู่บริษัท (กรณีเลิกบริษัท)"><?php echo $advertise['meeting_place']; ?></textarea>
                                                                                    </div>
                                                                                    <?php endif;?>
                                                                                    <?php if($advertise['stock_appove']!="" ):?>  
                                                                                    <div class="row">
                                                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                                                                            <div class="form-group" style="text-align: left;font-size:16px;">
                                                                                                <b>อนุมัติปันผลในอัตราหุ้นละ (ตัวเลข)</b>
                                                                                                <input type="number" name="approveC" class="form-control numberso" value="<?php echo $advertise['stock_appove']; ?>" id="NUMBER" placeholder="อนุมัติปันผลในอัตราหุ้นละ (ตัวเลข)">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                                                                            <div class="form-group" style="text-align: left;font-size:16px;">
                                                                                                <b>อนุมัติปันผลในอัตราหุ้นละ (ตัวอักษร)</b>
                                                                                                <input type="text" name="shareC" class="form-control TEXTNUMBERs " id="TEXTNUMBER" placeholder="อนุมัติปันผลในอัตราหุ้นละ (ตัวเลข)">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <?php endif;?>
                                                                                    <?php if($advertise['all_shares']!="" ):?>  
                                                                                    <div class="form-group" style="text-align: left;font-size:16px;">
                                                                                        <b>หุ้นทั้งหมด</b>
                                                                                        <input type="text" name="allshares" id="allshares" class="form-control"   value="<?php echo $advertise['all_shares']; ?>" placeholder="หุ้นทั้งหมด">
                                                                                    </div>
                                                                                    <?php endif;?>
                                                                                    <?php if($advertise['dividend']!="" ):?>  
                                                                                    <div class="row">
                                                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                                                                            <div class="form-group " style="text-align: left;font-size:16px;">
                                                                                                <b>เงินปันผลทั้งหมดคิดเป็นเงิน (ตัวเลข)</b>
                                                                                                <input type="number" name="moneyC" id="moneyC" class="form-control" value="<?php echo $advertise['dividend']; ?>" id="NUMBER2" placeholder="เงินปันผลทั้งหมดคิดเป็นเงิน (ตัวเลข)">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                                                                            <div class="form-group" style="text-align: left;font-size:16px;">
                                                                                                <b>อนุมัติปันผลในอัตราหุ้นละ (ตัวอักษร)</b>
                                                                                                <input type="text" name="stockC" id="stockC" class="form-control" id="TEXTNUMBER2" placeholder="อนุมัติปันผลในอัตราหุ้นละ (ตัวเลข)">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <?php endif;?>
                                                                                    <?php if($advertise['reserve']!="" ):?>  
                                                                                    <div class="row">
                                                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                                                                            <div class="form-group " style="text-align: left;font-size:16px;">
                                                                                                <b>ทุนสำรอง (ตัวเลข)</b>
                                                                                                <input type="number" name="reserveC" id="reserveC" class="form-control"   value="<?php echo $advertise['reserve']; ?>" id="NUMBER3" placeholder="ทุนสำรอง (ตัวเลข)">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                                                                            <div class="form-group " style="text-align: left;font-size:16px;">
                                                                                                <b>ทุนสำรอง (ตัวอักษร)</b>
                                                                                                <input type="text" name="characterC" id="characterC" class="form-control" id="TEXTNUMBER3" placeholder="ทุนสำรอง (ตัวอักษร)">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <?php endif;?>
                                                                                    <?php if($advertise['dividend_payment']!="" ):?>  
                                                                                    <div class="form-group travel-date-group" style="text-align: left;font-size:16px;">
                                                                                        <b>จ่ายเงินปันผลภายในวันที่</b>
                                                                                        <input type="text" name="paymentC" id="paymentC" value="<?php echo $advertise['dividend_payment']; ?>" class="form-control tleft default" placeholder="จ่ายเงินปันผลภายในวันที่">
                                                                                    </div>
                                                                                    <?php endif;?>
                                                                                    <?php if($advertise['post_date']!="" ):?>  
                                                                                    <div class="form-group travel-date-group" style="text-align: left;font-size:16px;">
                                                                                        <b>วันที่ลงโฆษณา</b>
                                                                                        <input type="date" name="advertisementA" id="advertisementA" value="<?php echo $advertise['post_date']; ?>" min="<?php echo date('Y-m-d'); ?>" class="form-control tleft default" placeholder="วันที่ลงโฆษณา">
                                                                                    </div>
                                                                                    <?php endif;?>
                                                                                    <?php if($advertise['name_surname']!="" ):?>  
                                                                                    <div class="form-group" style="text-align: left;font-size:16px;">
                                                                                        <b>ชื่อ-นามสกุลผู้ลงนาม (กรุณาใส่คำนำหน้าชื่อ)</b>
                                                                                        <input type="text" name="signA" id="signA" class="form-control" value="<?php echo $advertise['name_surname']; ?>"  placeholder="ชื่อ-นามสกุลผู้ลงนาม (กรุณาใส่คำนำหน้าชื่อ)">
                                                                                    </div>
                                                                                    <?php endif;?>
                                                                                    <?php if($advertise['position']!="" ):?>
                                                                                    <div class="form-group" style="text-align: left;font-size:16px;">
                                                                                        <b>ตำแหน่งผู้ลงนาม</b>
                                                                                        <input type="text" name="positionA" id="positionA" class="form-control" value="<?php echo $advertise['position']; ?>"  placeholder="กรรมการผู้มีอำนาจลงนาม" value="กรรมการผู้มีอำนาจลงนาม">
                                                                                    </div>
                                                                                    <?php endif;?>
                                                                                </div>
                                                                                <!-- <div class="modal-footer">
                                                                                    <div class="add-data-footer d-flex justify-content-around ">
                                                                                        <div class="add-data-btn mr-1">
                                                                                            <button type="close" class="btn btn-primary">ปิด</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div> -->
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>


                                                                <button data-toggle="modal" data-target="#exampleModala<?php echo $advertise['advertise_id']; ?>" type="button" class="btn btn-warning">แก้ไข</button>

                                                                <button onclick="confirmalertdelete_template('<?php echo $advertise['advertise_id']; ?>')" class="btn btn-danger " type="button" aria-haspopup="true" aria-expanded="false">
                                                                    ลบ
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Column selectors with Export Options and print table -->


                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form action="insert_ads" method="post" class="form-horizontal" enctype="multipart/form-data">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModal">ลงด้วย template</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <div class="col-xl-12 col-md-6 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="helpInputTop">เลือกหัวข้อ/เรื่อง</label>
                                            <select class="form-control topicK" name="topic" style="margin: 10px 0px 10px 0px;" id="op_title">
                                                <option value="" selected disabled>** สามัญ **</option>
                                                <option value="เชิญประชุมปิดงบประมาณ">เชิญประชุมปิดงบประมาณ</option>
                                                <option value="กำหนดรายละเอียดการประชุมเอง">กำหนดรายละเอียดการประชุมเอง</option>
                                                <option selected disabled>** วิสามัญ **</option>
                                                <option value="เชิญประชุมย้ายที่อยู่">เชิญประชุมย้ายที่อยู่</option>
                                                <option value="เชิญประชุมลดทุน">เชิญประชุมลดทุน</option>
                                                <option value="เชิญประชุมเปลี่ยนกรรมการ">เชิญประชุมเปลี่ยนกรรมการ</option>
                                                <option value="เชิญประชุมเปลี่ยนชื่อบริษัท">เชิญประชุมเปลี่ยนชื่อบริษัท</option>
                                                <option value="เชิญประชุมเพิ่มทุน">เชิญประชุมเพิ่มทุน</option>
                                                <option value="เชิญประชุมเพิ่มวัตถุประสงค์">เชิญประชุมเพิ่มวัตถุประสงค์</option>
                                                <option value="เชิญประชุมเลิกบริษัท">เชิญประชุมเลิกบริษัท</option>
                                                <option value="เชิญประชุมเสร็จชำระบัญชี">เชิญประชุมเสร็จชำระบัญชี</option>
                                                <option value="เชิญประชุมแก้ไขเพิ่มเติมตราบริษัท">เชิญประชุมแก้ไขเพิ่มเติมตราบริษัท</option>
                                                <option value="เชิญประชุมอนุมัติเงินปันผล">เชิญประชุมอนุมัติเงินปันผล</option>
                                                <option value="เชิญประชุมแก้ไขข้อบังคับ">เชิญประชุมแก้ไขข้อบังคับ</option>
                                                <option value="เชิญประชุมควบรวมบริษัท">เชิญประชุมควบรวมบริษัท</option>
                                                <option value="ประกาศเลิกบริษัท">ประกาศเลิกบริษัท</option>
                                                <option value="ประกาศจ่ายเงินปันผล">ประกาศจ่ายเงินปันผล</option>
                                                <option value="กำหนดรายละเอียดการประชุมเอง">กำหนดรายละเอียดการประชุมเอง</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-md-6 col-12 mb-1">
                                        <div class="form-group " id="texA" style="display: none">
                                            <?php include('option/texA.php'); ?>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-md-6 col-12 mb-1">
                                        <div class="form-group" id="texB" style="display: none">
                                            <?php include('option/texB.php'); ?>
                                        </div>

                                    </div>
                                    <div class="col-xl-12 col-md-6 col-12 mb-1">
                                        <div class="form-group" id="texC" style="display: none">
                                            <?php include('option/texC.php'); ?>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <div class="add-data-footer d-flex justify-content-around">
                                            <div class="add-data-btn mr-1">
                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalCenter">ดูตัวอย่างโฆษณา</button>
                                                <button type="submit" class="btn btn-primary">ลงโฆษณา</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 700px;" role="document">
            <div class="modal-content">
                <div class="modal-header" style="    background: #f7f7f7;">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="padding: 30px;">

                    <div id="txtA">
                        <p class="text-right" id="detail0"></p>
                        <p id="detail1" style="text-align: center"></p>
                        <p id="detail2" style="margin-bottom: 0px;"></p>
                        <p id="detail3"></p>
                        <!-- <p id=""></p> -->
                        <p style="margin-bottom: 0px;">
                            <span id="detail4"></span>
                            <span id="detail5"></span>
                            <span id="detail6"></span>
                            <span id="detail7"></span>
                        </p>
                        <div id="detail8"></div>

                        <div id="detail9" style="padding-top: 10px">
                            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ดังนั้น จึงขอเรียนเชิญ <span id="detail10"></span> ไปประชุมตามวัน เวลา และสถานที่ดังกล่าวข้างต้นโดยพร้อมเพรียงกันด้วย จักขอบพระคุณยิ่ง</p>
                        </div>
                        <div class="text-center" style="float: right;width: 50%;">
                            <p id="detail11" style="margin-bottom: 0px;">ขอแสดงความนับถือ</p>
                            <p id="detail12" style="margin-bottom: 0px;"></p>
                            <p id="detail13" style="margin-bottom: 0px;"></p>
                        </div>
                    </div>
                    <div id="txtB">
                        <p class="text-center" id="detailB1" style="font-weight: 900;">ประกาศเลิกบริษัท</p>
                        <p class="text-center" id="detailB2" style="margin-bottom: 0px;"></p>
                        <p class="text-center" id="detailB3"></p>
                        <p style="margin-bottom: 0px;">
                            <span id="detailB4"></span>
                            <span id="detailB5"></span>
                            <span id="detailB6"></span>
                        </p>
                        <p id="detailB7"></p>

                        <div class="text-center" style="float: right;width: 50%;">
                            <p id="detailB8"></p>
                            <p id="detailB9" style="margin-bottom: 0px;"></p>
                            <p id="detailB10" style="margin-bottom: 0px;"></p>
                        </div>
                    </div>
                    <div id="txtC">
                        <p class="text-right" id="detailฺC1" style="margin-bottom: 15px;"></p>
                        <p class="text-center" id="detailฺC2" style="margin-bottom: 0px;"></p>
                        <p id="detailฺC3" style="margin-bottom: 0px;">เรื่อง จ่ายเงินปันผลระหว่างกาล</p>
                        <p style="margin-bottom: 15px;">
                            <span id="detailฺC4"></span>
                            <span id='detailฺC5'></span>
                        </p>
                        <p style="margin-bottom: 15px;">
                            <span id="detailฺC6"></span>
                            <span id="detailฺC7"></span>
                            <span id="detailฺC8"></span>
                            <span id="detailฺC9"></span>
                            <span id="detailฺC10"></span>
                            <span id="detailฺC11"></span>
                            <span id="detailฺC12"></span>
                            <span id="detailฺC13"></span>
                            <span id="detailฺC13"></span>
                            <span id="detailฺC15"></span>
                            <span id="detailฺC16"></span>
                            <span id="detailฺC17"></span>
                        </p>
                        <p id="detailฺC18"></p>
                        <div class="text-center" style="float: right;width: 50%;">
                            <p style="margin-bottom: 15px;">จึงเรียนมาเพื่อทราบ</p>
                            <p id="detailฺC19" style="margin-bottom: 15px;"></p>
                            <p id="detailฺC20" style="margin-bottom: 0px;"></p>
                            <p id="detailฺC21"></p>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิดหน้าต่าง</button>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->



    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>



    <?php include('option/footer.php'); ?>
    <?php include('option/script.php'); ?>
    <script type="text/javascript">
        $('#op_title').change(function() {
            if (this.value == "ประกาศเลิกบริษัท") {
                $('#texA').css('display', 'none');
                $('#texB').css('display', 'block');
                $('#texC').css('display', 'none');
            } else if (this.value == "ประกาศจ่ายเงินปันผล") {
                $('#texA').css('display', 'none');
                $('#texB').css('display', 'none');
                $('#texC').css('display', 'block');
            } else {
                $('#texA').css('display', 'block');
                $('#texB').css('display', 'none');
                $('#texC').css('display', 'none');
            }
        });

        // $('.ee').css('display', 'none');
        // $('.gg').css('display', 'flex');
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#op_title').change(function() {
                let val_opTitle = $(this).val();

                $('#txtA').css('display', 'none');
                $('#txtB').css('display', 'none');
                $('#txtC').css('display', 'none');

                if (this.value == "ประกาศเลิกบริษัท") {

                    $('#txtB').css('display', 'block');

                    $("#companyฺB").keyup(function() {
                        var value = $(this).val();

                        $("#detailB2").text(value);
                    }).keyup();

                    $("#TaxpayerB").keyup(function() {
                        var value = $(this).val();

                        $("#detailB3").text('ทะเบียนเลขที่ ' + value);
                    }).keyup();

                    $("#meetingB").keyup(function() {
                        var value = $(this).val();

                        $("#detailB4").html('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ขอประกาศให้ทราบโดยทั่วกันว่าที่ประชุมวิสามัญผู้ถือหุ้น ครั้งที่ ' + value);
                    }).keyup();

                    $("#companyฺB").keyup(function() {
                        var value = $(this).val();

                        $("#detailB5").text(' ของ ' + value);
                    }).keyup();

                    $("#dissolveB").keyup(function() {
                        var value = $(this).val();

                        $("#detailB6").text(' ได้มีมติให้เลิกบริษัทฯ นี้ ตั้งแต่ วันที่ ' + value + ' เป็นต้นไป ');
                    }).keyup();

                    $("#addressB").keyup(function() {
                        var value = $(this).val();

                        $("#detailB7").html('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; จึงประกาศให้บรรดาลูกหนี้และเจ้าหนี้ทั้งหลายของบริษัทฯ นี้ ได้โปรดติดต่อชำระหนี้หรือยื่นคำทวงหนี้ต่อข้าพเจ้า ณ สำนักงานของผู้ชำระบัญชีเลขที่ ' + value + ' ภายในกำหนด 7 วัน นับแต่วันประกาศเป็นต้นไป');
                    }).keyup();

                    $("#postB").keyup(function() {
                        var value = $(this).val();

                        $("#detailB8").html(' ประกาศ ณ วันที่ ' + value);
                    }).keyup();

                    $("#signerB").keyup(function() {
                        var value = $(this).val();

                        $("#detailB9").text('(' + value + ')');
                    }).keyup();

                    $("#positionB").keyup(function() {
                        var value = $(this).val();

                        $("#detailB10").text(value);
                    }).keyup();

                } else if (this.value == "ประกาศจ่ายเงินปันผล") {

                    $('#txtC').css('display', 'block');

                    $("#companyC").keyup(function() {
                        var value = $(this).val();

                        $("#detailฺC1").text(value);
                    }).keyup();

                    $("#dateC").change(function() {
                        var value = $(this).val();

                        $("#detailฺC2").text('วันที่ ' + value);
                    }).keyup();

                    $("#announcementC").keyup(function() {
                        var value = $(this).val();

                        $("#detailฺC4").text('เรียน ' + value);
                    }).keyup();

                    $("#companyC").keyup(function() {
                        var value = $(this).val();

                        $("#detailฺC5").text(' ' + value);
                    }).keyup();

                    $("#meetingC").keyup(function() {
                        var value = $(this).val();

                        $("#detailฺC6").html('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ด้วยมติที่ประชุมคณะกรรมการของบริษัท ครั้งที่ ' + value);
                    }).keyup();

                    $("#meetingDateC").change(function() {
                        var value = $(this).val();

                        $("#detailฺC7").text(' เมื่อ วันที่ ' + value);
                    }).keyup();

                    $("#meetingTimeC").change(function() {
                        var value = $(this).val();

                        $("#detailฺC8").text(' เวลา ' + value);
                    }).keyup();

                    $("#addressC").keyup(function() {
                        var value = $(this).val();

                        $("#detailฺC9").text(' ณ ' + value);
                    }).keyup();

                    $(".numberso").keyup(function() {
                        var value = $(this).val();

                        $("#detailฺC10").html(' ได้อนุมัติให้จ่ายเงินปันผลระหว่างกาลให้กับผู้ถือหุ้นในอัตราหุ้นละ ' + value);
                    }).keyup();

                    $(".TEXTNUMBERs").keyup(function() {
                        var value = $(this).val();

                        $("#detailฺC11").text('(' + value + ') บาท');
                    }).keyup();

                    $("#meetingDateC").change(function() {
                        var value = $(this).val();

                        $("#detailฺC12").text(' ปรากฏตามรายชื่อผู้ถือหุ้น ณ วันที่ ' + value);
                    }).keyup();


                    $("#allshares").keyup(function() {
                        var value = $(this).val();

                        $("#detailฺC13").text(' ปรากฏตามรายชื่อผู้ถือหุ้น ณ วันที่ ' + value + ' หุ้น ');
                    }).keyup();

                    $("#moneyC").keyup(function() {
                        var value = $(this).val();

                        $("#detailฺC14").text(' คิดเป็นเงิน ' + value);
                    }).keyup();

                    $("#stockC").keyup(function() {
                        var value = $(this).val();

                        $("#detailฺC15").text('(' + value + ') บาท');
                    }).keyup();

                    $("#reserveC").keyup(function() {
                        var value = $(this).val();

                        $("#detailฺC16").text(' และจัดสรรเป็นเงินกองทุนสำรอง ' + value);
                    }).keyup();

                    $("#characterC").keyup(function() {
                        var value = $(this).val();

                        $("#detailฺC17").text(' (' + value + ') บาท');
                    }).keyup();

                    $("#paymentC").change(function() {
                        var value = $(this).val();

                        $("#detailฺC18").html(' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;โดยบริษัทฯ กำหนดจะจ่ายเงินปันผลให้กับผู้ถือหุ้นภายในวันที่ วันที่ ' + value);
                    }).keyup();

                    $("#dateC").change(function() {
                        var value = $(this).val();

                        $("#detailฺC19").text(' ประกาศ ณ วันที่ ' + value);
                    }).keyup();

                    $("#signerC").change(function() {
                        var value = $(this).val();

                        $("#detailฺC20").text('(' + value + ')');
                    }).keyup();

                    $("#positionC").keyup(function() {
                        var value = $(this).val();

                        $("#detailฺC21").text(value);
                    }).keyup();
                } else {

                    $('#txtA').css('display', 'block');

                    $('#agendaA').val("");

                    let value_agenda = "";
                    if (val_opTitle == "เชิญประชุมปิดงบประมาณ") {
                        value_agenda = "1. รับรองรายงานการประชุมครั้งที่ผ่านมา";
                        value_agenda += "\n";
                        value_agenda += "2. รายงานผลการดำเนินงานของบริษัทและรับรองงบการเงินประจำปี";
                        value_agenda += "\n";
                        value_agenda += "3. พิจารณาแต่งตั้งผู้สอบบัญชีและกำหนดค่าตอบแทนประจำปี";
                        value_agenda += "\n";
                        value_agenda += "4. พิจารณาแต่งตั้งคณะกรรมการแทนกรรมการที่จะครบกำหนดออกตามวาระ";
                        value_agenda += "\n";
                        value_agenda += "5. พิจารณาเงินปันผล การจัดสรรทุนสำรองตามกฎหมายและบำเหน็จกรรมการ";
                        value_agenda += "\n";
                        value_agenda += "6. พิจารณาเรื่องอื่นๆ (ถ้ามี)";

                    } else if (val_opTitle == "กำหนดรายละเอียดการประชุมเอง") {
                        value_agenda = "กำหนดรายละเอียดการประชุมเอง";

                    } else if (val_opTitle == "เชิญประชุมย้ายที่อยู่") {
                        value_agenda = "1. พิจารณาแก้ไขที่ตั้งสำนักงานของบริษัท";
                        value_agenda += "\n";
                        value_agenda += "2. พิจารณาแก้ไขเพิ่มเติมหนังสือบริคณห์สนธิ ข้อ 2. ดังนี้";
                        value_agenda += "\n";
                        value_agenda += "ข้อ 2. สำนักงานของบริษัทตั้งอยู่ ณ จังหวัด .....";
                        value_agenda += "\n";
                        value_agenda += "3. พิจารณาเรื่องอื่นๆ (ถ้ามี)";

                    } else if (val_opTitle == "เชิญประชุมลดทุน") {
                        value_agenda = "1. พิจารณาอนุมัติการลดทุนจดทะเบียนของบริษัท จำนวน ..... บาท";
                        value_agenda += "\n";
                        value_agenda += "2. พิจารณาแก้ไขเพิ่มเติมหนังสือบริคณห์สนธิ ข้อ 5. (ทุน) ดังนี้";
                        value_agenda += "\n";
                        value_agenda += "ข้อ 5. ทุนของบริษัทกำหนดไว้เป็นจำนวน ..... บาท (.....) แบ่งออกเป็น ..... หุ้น (.....) มูลค่าหุ้นละ ..... บาท (.....)";
                        value_agenda += "\n";
                        value_agenda += "3. พิจารณาเรื่องอื่นๆ (ถ้ามี)";

                    } else if (val_opTitle == "เชิญประชุมเปลี่ยนกรรมการ") {
                        value_agenda = "1. พิจารณาแต่งตั้งกรรมการและอำนาจกรรมการ";
                        value_agenda += "\n";
                        value_agenda += "2. พิจารณาเปลี่ยนแปลงกรรมการเข้าและออก";
                        value_agenda += "\n";
                        value_agenda += "3. พิจารณาการเปลี่ยนแปลงบัญชีรายชื่อผู้ถือหุ้น";
                        value_agenda += "\n";
                        value_agenda += "4. พิจารณาเรื่องอื่นๆ (ถ้ามี)";

                    } else if (val_opTitle == "เชิญประชุมเปลี่ยนชื่อบริษัท") {
                        value_agenda = "1. พิจารณาแก้ไขเปลี่ยนแปลงชื่อของบริษัท";
                        value_agenda += "\n";
                        value_agenda += "2. พิจารณาแก้ไขเพิ่มเติมหนังสือบริคณห์สนธิ ข้อ 1. ดังนี้";
                        value_agenda += "\n";
                        value_agenda += "ข้อ 1. ชื่อบริษัท ..... จำกัด";
                        value_agenda += "\n";
                        value_agenda += "3. พิจารณาเรื่องอื่นๆ (ถ้ามี)";

                    } else if (val_opTitle == "เชิญประชุมเพิ่มทุน") {
                        value_agenda = "1. พิจารณาอนุมัติการเพิ่มทุนจดทะเบียนของบริษัท จำนวน ..... บาท";
                        value_agenda += "\n";
                        value_agenda += "2. พิจารณาแก้ไขเพิ่มเติมหนังสือบริคณห์สนธิ ข้อ 5. (ทุน) ดังนี้";
                        value_agenda += "\n";
                        value_agenda += "ข้อ 5. ทุนของบริษัทกำหนดไว้เป็นจำนวน ..... บาท (.....) แบ่งออกเป็น ..... หุ้น (.....) มูลค่าหุ้นละ ..... บาท (.....)";
                        value_agenda += "\n";
                        value_agenda += "3. พิจารณาเรื่องอื่นๆ (ถ้ามี)";

                    } else if (val_opTitle == "เชิญประชุมเพิ่มวัตถุประสงค์") {
                        value_agenda = "1. พิจารณาแก้ไขเพิ่มเติมวัตถุประสงค์ของบริษัท";
                        value_agenda += "\n";
                        value_agenda += "2. พิจารณาแก้ไขเพิ่มเติมหนังสือบริคณห์สนธิ ข้อ 3. ดังนี้";
                        value_agenda += "\n";
                        value_agenda += "ข้อ 3. วัตถุประสงค์ทั้งหลายของบริษัทมี 29 ข้อ ดังปรากฎในแบบ ว. ที่แนบ";
                        value_agenda += "\n";
                        value_agenda += "3. พิจารณาเรื่องอื่นๆ (ถ้ามี)";

                    } else if (val_opTitle == "เชิญประชุมเลิกบริษัท") {
                        value_agenda = "1. พิจารณาลงมติพิเศษเรื่องการเลิกบริษัท";
                        value_agenda += "\n";
                        value_agenda += "2. พิจารณาแต่งตั้งผู้ชำระบัญชี";
                        value_agenda += "\n";
                        value_agenda += "3. พิจารณาแต่งตั้งผู้สอบบัญชี (ถ้ามี)";
                        value_agenda += "\n";
                        value_agenda += "4. พิจารณาเรื่องอื่นๆ (ถ้ามี)";

                    } else if (val_opTitle == "เชิญประชุมเสร็จชำระบัญชี") {
                        value_agenda = "1. รับรองรายงานการประชุมวิสามัญผู้ถือหุ้นครั้งที่ .....";
                        value_agenda += "\n";
                        value_agenda += "2. พิจารณารายงานการชำระบัญชี";
                        value_agenda += "\n";
                        value_agenda += "3. พิจารณาเรื่องอื่นๆ (ถ้ามี)";

                    } else if (val_opTitle == "เชิญประชุมแก้ไขเพิ่มเติมตราบริษัท") {
                        value_agenda = "1. พิจารณาแก้ไขเพิ่มเติมตราของบริษัท";
                        value_agenda += "\n";
                        value_agenda += "2. พิจารณาเรื่องอื่นๆ (ถ้ามี)";

                    } else if (val_opTitle == "เชิญประชุมอนุมัติเงินปันผล") {
                        value_agenda = "1. รับรองรายงานการประชุมครั้งที่ผ่านมา";
                        value_agenda += "\n";
                        value_agenda += "2. พิจารณาการอนุมัติการจ่ายเงินปันผลของบริษัท";
                        value_agenda += "\n";
                        value_agenda += "3. พิจารณาเรื่องอื่นๆ (ถ้ามี)";

                    } else if (val_opTitle == "เชิญประชุมแก้ไขข้อบังคับ") {
                        value_agenda = "1. พิจารณาแก้ไขเพิ่มเติมข้อบังคับ";
                        value_agenda += "\n";
                        value_agenda += "2. พิจารณาเรื่องอื่นๆ (ถ้ามี)";

                    } else if (val_opTitle == "เชิญประชุมควบรวมบริษัท") {
                        value_agenda = "1. พิจารณาการควบบริษัทจำกัด";
                        value_agenda += "\n";
                        value_agenda += "2. พิจารณาเรื่องอื่นๆ (ถ้ามี)";

                    } else if (val_opTitle == "กำหนดรายละเอียดการประชุมเอง") {
                        value_agenda = "กำหนดรายละเอียดการประชุมเอง";

                    }

                    $('#agendaA').val(value_agenda);

                    $("#advertisementA").change(function() {
                        var value = $(this).val();

                        $("#detail1").text('วันที่ ' + value);
                    }).keyup();

                    $("#companyA").keyup(function() {
                        var value1 = $(this).val();

                        $("#detail0").text(value1);
                    }).keyup();

                    $("#meetingA").keyup(function() {
                        var value2 = $(this).val();

                        $("#detail2").text('เรื่อง ขอเชิญประชุมวิสามัญผู้ถือหุ้น ครั้งที่ ' + value2);
                    }).keyup();

                    $("#announceA").keyup(function() {
                        var value3 = $(this).val();

                        $("#detail3").text('เรียน ' + value3);
                    }).keyup();

                    $("#meetingA").keyup(function() {
                        var value4 = $(this).val();

                        $("#detail4").html('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ด้วยคณะกรรมการของบริษัทมีมติให้เรียกประชุมวิสามัญผู้ถือหุ้น ครั้งที่ ' + value4);
                    }).keyup();

                    $("#announcedateA").change(function() {
                        var value5 = $(this).val();

                        $("#detail5").text(' ใน วันที่ ' + value5);
                    }).keyup();

                    $("#timeA").change(function() {
                        var value6 = $(this).val();

                        $("#detail6").text(' เวลา ' + value6 + ' น.');
                    }).keyup();

                    $("#placeA").keyup(function() {
                        var value7 = $(this).val();

                        $("#detail7").text(' ณ ' + value7 + ' เพื่อพิจารณาเรื่องต่างๆ ตามระเบียบวาระดังต่อไปนี้');
                    }).keyup();



                    $("#agendaA").keyup(function() {

                        $.ajax({
                            url: "textarea",
                            data: {
                                data: $(this).val()
                            },
                            success: function(getData) {
                                var value4 = getData;
                                console.log(value4)
                                $("#detail8").html(value4);
                            }
                        });
                    }).keyup();

                    $("#signA").keyup(function() {
                        var value8 = $(this).val();

                        $("#detail12").text(value8);
                    }).keyup();

                    $("#positionA").keyup(function() {
                        var value8 = $(this).val();

                        $("#detail13").text(value8);
                    }).keyup();
                }
            });
        });
    </script>

</body>
<!-- END: Body-->

</html>