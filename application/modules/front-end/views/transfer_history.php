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
?>
<!-- Content ============================================= -->

<?php $session = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array(); ?>

<section id="content">

    <div class="content-wrap clearfix">

        <div class="container">

            <div class="row">
                <div class="col-12 mb-3">
                    <h5><a href="index">หน้าแรก</a> / ประวัติรายการสั่งซื้อ</h5>
                    <div class="feature-box fbox-small fbox-center fbox-plain fbox-large nobottomborder">
                        <div class="card">
                            <div class="card-header text-left" style="color:#000;">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#TEM" data-toggle="tab">ประวัติการซื้อเครดิต</a></li>
                                </ul>
                            </div>
                            <div class="card-body ">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div id="TEM" class="container tab-pane active"><br>
                                        <div class="row">
                                            <div class="col-lg-12 col-xd-12 col-sm-12" style="overflow: auto;white-space: nowrap;">
                                                <div class="card-content">
                                                    <?php if (!empty($money)) { ?>
                                                        <table class="table table-striped table-bordered" style="width:100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>เลขที่สั่งซื้อ</th>
                                                                    <th>วันที่ทำรายการ</th>
                                                                    <th>เครดิต</th>
                                                                    <th>ยอดรวม</th>
                                                                    <th>สถานะ</th>
                                                                    <th>เครื่องมือ</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($money as $money) { ?>
                                                                    <tr>
                                                                        <td><?php echo $money['order_id']; ?></td>
                                                                        <td><?php echo thaiDate($money['created_at']); ?></td>
                                                                        <td><?php echo $money['credit'] ?> เครดิต</td>
                                                                        <td><?php echo $money['total'] ?> บาท</td>
                                                                        <td>
                                                                            <?php if ($money['status'] == 0) :  ?>
                                                                                <span class="badge badge-warning">รอการดำเนินงาน</span>
                                                                            <?php elseif ($money['status'] == 1) : ?>
                                                                                <span class="badge badge-success">เสร็จสิ้น</span>
                                                                            <?php else : ?>
                                                                                <span class="badge badge-danger">ล้มเหลว</span>
                                                                            <?php endif; ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php if ($money['status'] == 0) :  ?>
                                                                                <button type="button" class="button button-mini button-circle button-aqua" data-toggle="modal" data-target="#exampleModalhistory"><i class="icon-download"></i>แจ้งชำระเงิน</button>
                                                        
                                                                            <?php else : ?>
                                                                                -
                                                                            <?php endif; ?>
                                                                        </td>
                                                                    </tr>

                                                                    <!-- Modal -->
                                                                    <div class="modal fade" id="exampleModalhistory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="exampleModalLabel">แจ้งชำระเงิน</h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <form action="transfer_insert" method="POST" enctype="multipart/form-data">
                                                                                    <div class="modal-body">
                                                                                        <div class="form-group">
                                                                                            <h2 style="margin-bottom: 0px">แบบฟอร์มแจ้งชำระเงิน</h2>
                                                                                            <p style="text-align: left">
                                                                                                คุณสามารถแจ้งชำระเงินได้ผ่านทางแบบฟอร์มด้านล่างนี้ โดยกรอกข้อมูลการชำระเงิน <br>ของคุณให้ถูกต้อง 
                                                                                                เจ้าหน้าที่จะใช้เวลาตรวจสอบข้อมูลการชำระเงินและอนุมัติรายการ<br>สั่งซื้อให้คุณภายใน 24 ชม.
                                                                                            </p>
                                                                                        </div>
                                                                                        <hr>
                                                                                        <input type="hidden" name="user_id" value="<?php echo $session['id_user']; ?>" class="form-control" >

                                                                                        <div class="form-group text-left">
                                                                                            <label for="">แนปสลิป <span style="read_exif_data">*</span> </label>
                                                                                            <input type="file" name="file_name" class="form-control" style="height: auto;" id="" required>
                                                                                        </div>
                                                                                        <div class="form-group text-left">
                                                                                            <label for="">อีเมลที่ใช้ลงทะเบียน <span style="read_exif_data">*</span></label>
                                                                                            <input type="email" name="email" value="<?php echo $this->session->userdata('email'); ?>" class="form-control" id="" readonly>
                                                                                        </div>
                                                                                        <div class="form-group text-left">
                                                                                            <label for="">เลขที่รายการสั่งซื้อ <span style="read_exif_data">*</span></label>
                                                                                            <input type="text" name="order" value="<?php echo $money['order_id']; ?>" class="form-control" id="" readonly required>
                                                                                        </div>
                                                                                        <div class="form-group text-left">
                                                                                            <label for="">วิธีชำระเงิน <span style="read_exif_data">*</span></label>
                                                                                            <select name="bank" class="form-control" required>
                                                                                                <option value="" selected disabled>-- เลือกวิธีการชำระเงิน --</option>
                                                                                                <option value="ธนาคารไทยพาณิชย์">ธนาคารไทยพาณิชย์ (SCB)</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="form-group row  text-left">
                                                                                            <div class="col-6">
                                                                                                <label for="">วันที่ <span style="read_exif_data">*</span></label>
                                                                                                <input type="date" name="date" class="form-control" id="" required>
                                                                                            </div>
                                                                                            <div class="col-6">
                                                                                                <label for="">เวลา <span style="read_exif_data">*</span></label>
                                                                                                <input type="time" name="time" class="form-control" id="" required>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group text-left">
                                                                                            <label for="">จำนวนเงิน <span style="read_exif_data">*</span></label>
                                                                                            <input type="number" name="money" class="form-control" id="" required>
                                                                                        </div>
                                                                                        <div class="form-group row text-left">
                                                                                            <label for="" class="col-12">รายละเอียดเพิ่มเติม <span style="read_exif_data">*</span></label> <br>
                                                                                            <div class="col-12">
                                                                                                <textarea name="textarea" rows="7" style="width:100%;"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                                                                                        <button type="submit" id="" class="btn btn-primary">ส่งข้อมูล</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    <?php } else { ?>
                                                        <p style="color:red;margin-bottom:20px;"><b>ไม่มีข้อมูล</b></p>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>



    </div>

</section><!-- #content end -->