<div class="form-group" style="text-align: left;font-size:16px;">
    <b>วาระการประชุม <span style="color:red;">( เพื่อความถูกต้องของข้อมูล แนะนำให้พิมพ์เท่านั้น !! ) จำกัดจำนวนบรรทัด 10 บรรทัด</span></b>
    <textarea class="form-control" name="agendaA" id="" rows="5" style="margin: 10px 0px 10px 0px;"></textarea>
</div>
<div class="form-group" style="text-align: left;font-size:16px;">
    <b>ชื่อบริษัท / ชื่อหน่วยงาน</b>
    <input type="text" name="companyA" class="form-control" placeholder="ชื่อบริษัท / ชื่อหน่วยงาน">
</div>
<div class="form-group" style="text-align: left;font-size:16px;">
    <b>ครั้งที่ประชุม</b>
    <input type="text" name="meetingA" class="form-control" value="1 / <?= date('Y') + 543; ?>" placeholder="ครั้งที่ประชุม">
</div>
<div class="form-group" style="text-align: left;font-size:16px;">
    <b>ประกาศถึง</b>
    <input type="text" name="announceA" class="form-control" value="ท่านผู้ถือหุ้นของบริษัท" placeholder="ประกาศถึง">
</div>
<div class="row">
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
        <div class="form-group travel-date-group" style="text-align: left;font-size:16px;">
            <b>วันที่จัดประชุม</b>
            <input type="text" name="announcedateA" value="<?php echo date('m/d/Y'); ?>" class="form-control tleft default" placeholder="วันที่จัดประชุม">
        </div>
    </div>
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
        <div class="form-group" style="text-align: left;font-size:16px;">
            <b>เวลาจัดประชุม</b>
            <select class="form-control" name="timeA" id="">
                <option selected disabled>--- เลือกเวลาจัดประชุม ---</option>
                <option>--- เลือกเวลาจัดประชุม ---</option>
                <option value="0:00">0:00</option>
                <option value="0:30">0:30</option>
                <option value="1:00">1:00</option>
                <option value="1:30">1:30</option>
                <option value="2:00">2:00</option>
                <option value="2:30">2:30</option>
                <option value="3:00">3:00</option>
                <option value="3:30">3:30</option>
                <option value="4:00">4:00</option>
                <option value="4:30">4:30</option>
                <option value="5:00">5:00</option>
                <option value="5:30">5:30</option>
                <option value="6:00">6:00</option>
                <option value="6:30">6:30</option>
                <option value="7:00">7:00</option>
                <option value="7:30">7:30</option>
                <option value="8:00">8:00</option>
                <option value="8:30">8:30</option>
                <option value="9:00">9:00</option>
                <option value="9:30">9:30</option>
                <option value="10:00">10:00</option>
                <option value="10:30">10:30</option>
                <option value="11:00">11:00</option>
                <option value="11:30">11:30</option>
                <option value="12:00">12:00</option>
                <option value="12:30">12:30</option>
                <option value="13:00">13:00</option>
                <option value="13:30">13:30</option>
                <option value="14:00">14:00</option>
                <option value="14:30">14:30</option>
                <option value="15:00">15:00</option>
                <option value="15:30">15:30</option>
                <option value="16:00">16:00</option>
                <option value="16:30">16:30</option>
                <option value="17:00">17:00</option>
                <option value="17:30">17:30</option>
                <option value="18:00">18:00</option>
                <option value="18:30">18:30</option>
                <option value="19:00">19:00</option>
                <option value="19:30">19:30</option>
                <option value="20:00">20:00</option>
                <option value="20:30">20:30</option>
                <option value="21:00">21:00</option>
                <option value="21:30">21:30</option>
                <option value="22:00">22:00</option>
                <option value="22:30">22:30</option>
                <option value="23:00">23:00</option>
                <option value="23:30">23:30</option>
            </select>
        </div>
    </div>
</div>
<div class="form-group" style="text-align: left;font-size:16px;">
    <b>สถานที่จัดประชุม / ที่อยู่บริษัท (กรณีเลิกบริษัท)</b>
    <textarea class="form-control" name="placeA" id="" rows="5" placeholder="สถานที่จัดประชุม / ที่อยู่บริษัท (กรณีเลิกบริษัท)"></textarea>
</div>
<div class="form-group travel-date-group" style="text-align: left;font-size:16px;">
    <b>วันที่ลงโฆษณา</b>
    <input type="text" name="advertisementA" value="<?php echo date('m/d/Y'); ?>" class="form-control tleft default" placeholder="วันที่ลงโฆษณา">
</div>
<div class="form-group" style="text-align: left;font-size:16px;">
    <b>ชื่อ-นามสกุลผู้ลงนาม (กรุณาใส่คำนำหน้าชื่อ)</b>
    <input type="text" name="signA" class="form-control" placeholder="ชื่อ-นามสกุลผู้ลงนาม (กรุณาใส่คำนำหน้าชื่อ)">
</div>
<div class="form-group" style="text-align: left;font-size:16px;">
    <b>ตำแหน่งผู้ลงนาม</b>
    <input type="text" name="positionA" class="form-control" placeholder="กรรมการผู้มีอำนาจลงนาม" value="กรรมการผู้มีอำนาจลงนาม">
</div>