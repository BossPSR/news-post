<div class="form-group" style="text-align: left;font-size:16px;">
    <b>ชื่อบริษัท / ชื่อหน่วยงาน</b>
    <input type="text" name="companyC" class="form-control" placeholder="ชื่อบริษัท / ชื่อหน่วยงาน">
</div>
<div class="form-group" style="text-align: left;font-size:16px;">
    <b>ครั้งที่ประชุม</b>
    <input type="text" name="meetingB" class="form-control" value="1 / <?= date('Y') + 543; ?>" placeholder="ครั้งที่ประชุม">
</div>
<div class="form-group" style="text-align: left;font-size:16px;">
    <b>ประกาศถึง</b>
    <input type="text" name="announcement" class="form-control" value="ท่านผู้ถือหุ้น" placeholder="ประกาศถึง">
</div>
<div class="row">
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
        <div class="form-group travel-date-group" style="text-align: left;font-size:16px;">
            <b>วันที่จัดประชุม</b>
            <input type="text" name="meetingDate" class="form-control tleft default" placeholder="วันที่จัดประชุม">
        </div>
    </div>
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
        <div class="form-group" style="text-align: left;font-size:16px;">
            <b>เวลาจัดประชุม</b>
            <select class="form-control" name="meetingTime" id="">
                <option selected disabled>--- เลือกเวลาจัดประชุม ---</option>
            </select>
        </div>
    </div>
</div>
<div class="form-group" style="text-align: left;font-size:16px;">
    <b>สถานที่จัดประชุม / ที่อยู่บริษัท (กรณีเลิกบริษัท)</b>
    <textarea class="form-control" name="addressC" rows="5" placeholder="สถานที่จัดประชุม / ที่อยู่บริษัท (กรณีเลิกบริษัท)"></textarea>
</div>
<div class="row">
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
        <div class="form-group" style="text-align: left;font-size:16px;">
            <b>อนุมัติปันผลในอัตราหุ้นละ (ตัวเลข)</b>
            <input type="number" name="approveC" class="form-control  " id="NUMBER" placeholder="อนุมัติปันผลในอัตราหุ้นละ (ตัวเลข)">
        </div>
    </div>
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
        <div class="form-group" style="text-align: left;font-size:16px;">
            <b>อนุมัติปันผลในอัตราหุ้นละ (ตัวอักษร)</b>
            <input type="text" name="shareC" class="form-control  " id="TEXTNUMBER" placeholder="อนุมัติปันผลในอัตราหุ้นละ (ตัวเลข)" readonly>
        </div>
    </div>
</div>
<div class="form-group" style="text-align: left;font-size:16px;">
    <b>หุ้นทั้งหมด</b>
    <input type="text" name="allshares" class="form-control  " placeholder="หุ้นทั้งหมด">
</div>
<div class="row">
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
        <div class="form-group " style="text-align: left;font-size:16px;">
            <b>เงินปันผลทั้งหมดคิดเป็นเงิน (ตัวเลข)</b>
            <input type="number" name="moneyC" class="form-control" id="NUMBER2" placeholder="เงินปันผลทั้งหมดคิดเป็นเงิน (ตัวเลข)">
        </div>
    </div>
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
        <div class="form-group" style="text-align: left;font-size:16px;">
            <b>อนุมัติปันผลในอัตราหุ้นละ (ตัวอักษร)</b>
            <input type="text" name="stockC" class="form-control" id="TEXTNUMBER2" placeholder="อนุมัติปันผลในอัตราหุ้นละ (ตัวเลข)" readonly>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
        <div class="form-group " style="text-align: left;font-size:16px;">
            <b>ทุนสำรอง (ตัวเลข)</b>
            <input type="number" name="reserveC" class="form-control" id="NUMBER3" placeholder="ทุนสำรอง (ตัวเลข)">
        </div>
    </div>
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
        <div class="form-group " style="text-align: left;font-size:16px;">
            <b>ทุนสำรอง (ตัวอักษร)</b>
            <input type="text" name="characterC" class="form-control" id="TEXTNUMBER3" placeholder="ทุนสำรอง (ตัวอักษร)" readonly>
        </div>
    </div>
</div>
<div class="form-group travel-date-group" style="text-align: left;font-size:16px;">
    <b>จ่ายเงินปันผลภายในวันที่</b>
    <input type="text" name="paymentC" class="form-control tleft default" placeholder="จ่ายเงินปันผลภายในวันที่">
</div>
<div class="form-group travel-date-group" style="text-align: left;font-size:16px;">
    <b>วันที่ลงโฆษณา</b>
    <input type="text" name="dateC" class="form-control tleft default" placeholder="วันที่ลงโฆษณา">
</div>
<div class="form-group" style="text-align: left;font-size:16px;">
    <b>ชื่อ-นามสกุลผู้ลงนาม (กรุณาใส่คำนำหน้าชื่อ)</b>
    <input type="text" name="signerC" class="form-control" placeholder="ชื่อ-นามสกุลผู้ลงนาม (กรุณาใส่คำนำหน้าชื่อ)">
</div>
<div class="form-group" style="text-align: left;font-size:16px;">
    <b>ตำแหน่งผู้ลงนาม</b>
    <input type="text" name="positionC" class="form-control" placeholder="กรรมการผู้มีอำนาจลงนาม" value="กรรมการผู้มีอำนาจลงนาม">
</div>