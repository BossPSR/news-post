<div class="form-group" style="text-align: left;font-size:16px;">
    <b>วาระการประชุม <span style="color:red;">( เพื่อความถูกต้องของข้อมูล แนะนำให้พิมพ์เท่านั้น !! ) จำกัดจำนวนบรรทัด 10 บรรทัด</span></b>
    <textarea class="form-control" name="" id="" rows="5" style="margin: 10px 0px 10px 0px;"></textarea>
</div>
<div class="form-group" style="text-align: left;font-size:16px;">
    <b>ชื่อบริษัท / ชื่อหน่วยงาน</b>
    <input type="text" class="form-control" placeholder="ชื่อบริษัท / ชื่อหน่วยงาน">
</div>
<div class="form-group" style="text-align: left;font-size:16px;">
    <b>ครั้งที่ประชุม</b>
    <input type="text" class="form-control" value="1 / <?= date('Y') + 543; ?>" placeholder="ครั้งที่ประชุม">
</div>
<div class="form-group" style="text-align: left;font-size:16px;">
    <b>ประกาศถึง</b>
    <input type="text" class="form-control" value="ท่านผู้ถือหุ้นของบริษัท" placeholder="ประกาศถึง">
</div>
<div class="row">
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
        <div class="form-group travel-date-group" style="text-align: left;font-size:16px;">
            <b>วันที่จัดประชุม</b>
            <input type="text" value="" class="form-control tleft default" placeholder="วันที่จัดประชุม">
        </div>
    </div>
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
        <div class="form-group" style="text-align: left;font-size:16px;">
            <b>เวลาจัดประชุม</b>
            <select class="form-control" name="" id="">
                <option selected disabled>--- เลือกเวลาจัดประชุม ---</option>
            </select>
        </div>
    </div>
</div>
<div class="form-group" style="text-align: left;font-size:16px;">
    <b>สถานที่จัดประชุม / ที่อยู่บริษัท (กรณีเลิกบริษัท)</b>
    <textarea class="form-control" name="" id="" rows="5" placeholder="สถานที่จัดประชุม / ที่อยู่บริษัท (กรณีเลิกบริษัท)"></textarea>
</div>
<div class="form-group travel-date-group" style="text-align: left;font-size:16px;">
    <b>วันที่ลงโฆษณา</b>
    <input type="text" value="" class="form-control tleft default" placeholder="วันที่ลงโฆษณา">
</div>
<div class="form-group" style="text-align: left;font-size:16px;">
    <b>ชื่อ-นามสกุลผู้ลงนาม (กรุณาใส่คำนำหน้าชื่อ)</b>
    <input type="text" class="form-control" placeholder="ชื่อ-นามสกุลผู้ลงนาม (กรุณาใส่คำนำหน้าชื่อ)">
</div>
<div class="form-group" style="text-align: left;font-size:16px;">
    <b>ตำแหน่งผู้ลงนาม</b>
    <input type="text" class="form-control" placeholder="กรรมการผู้มีอำนาจลงนาม" value="กรรมการผู้มีอำนาจลงนาม">
</div>