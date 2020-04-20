<div class="form-group" style="text-align: left;font-size:16px;">
    <b>ชื่อบริษัท / ชื่อหน่วยงาน</b>
    <input type="text"  name="companyฺB" id="companyฺB" class="form-control" placeholder="ชื่อบริษัท / ชื่อหน่วยงาน">
</div>
<div class="form-group" style="text-align: left;font-size:16px;">
    <b>เลขประจำตัวผู้เสียภาษี</b>
    <input type="text" name="TaxpayerB" id="TaxpayerB" class="form-control" placeholder="เลขประจำตัวผู้เสียภาษี">
</div>
<div class="form-group" style="text-align: left;font-size:16px;">
    <b>ครั้งที่ประชุม</b>
    <input type="text" name="meetingB" id="meetingB" class="form-control" value="1 / <?= date('Y') + 543; ?>" placeholder="ครั้งที่ประชุม">
</div>
<div class="form-group travel-date-group" style="text-align: left;font-size:16px;">
    <b>วันที่ประกาศเลิกบริษัท</b>
    <input type="text" name="dissolveB" id="dissolveB" value="<?php echo date('d/m/Y'); ?>" class="form-control tleft default" placeholder="วันที่ประกาศเลิกบริษัท">
</div>
<div class="form-group" style="text-align: left;font-size:16px;">
    <b>สถานที่จัดประชุม / ที่อยู่บริษัท (กรณีเลิกบริษัท)</b>
    <textarea class="form-control" name="addressB" id="addressB" rows="5" placeholder="สถานที่จัดประชุม / ที่อยู่บริษัท (กรณีเลิกบริษัท)"></textarea>
</div>
<div class="form-group travel-date-group" style="text-align: left;font-size:16px;">
    <b>วันที่ลงโฆษณา</b>
    <input type="text" name="postB" id="postB" value="<?php echo date('d/m/Y'); ?>" class="form-control tleft default" placeholder="วันที่ลงโฆษณา">
</div>
<div class="form-group" style="text-align: left;font-size:16px;">
    <b>ชื่อ-นามสกุลผู้ลงนาม (กรุณาใส่คำนำหน้าชื่อ)</b>
    <input type="text" name="signerB" id="signerB" class="form-control" placeholder="ชื่อ-นามสกุลผู้ลงนาม (กรุณาใส่คำนำหน้าชื่อ)">
</div>
<div class="form-group" style="text-align: left;font-size:16px;">
    <b>ตำแหน่งผู้ลงนาม</b>
    <input type="text" name="positionB" id="positionB"  class="form-control" placeholder="กรรมการผู้มีอำนาจลงนาม" value="ผู้ชำระบัญชี">
</div>