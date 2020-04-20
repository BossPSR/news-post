<hr>
<div class="form-group travel-date-group" style="text-align: left;font-size:16px;">
    <b>วันที่ลงโฆษณา</b>
    <input type="date" name="dateimg" class="form-control tleft default" min="<?php echo date('Y-m-d')?>"  >
</div>
<div class="row">
    <div class="col-lg-5 col-md-5 col-sm-12">
        <div class="form-group" style="text-align: left;font-size:16px;">
        <input type="file" id="uploadFile" name="fileimage[]" class="inputfileIMG" multiple/>

            <!-- <img style="width:30%; margin-bottom:15px;" id="blah"> -->
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div id="image_preview"></div>
    </div>
</div>