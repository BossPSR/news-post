<!-- Content ============================================= -->
<section id="content">

    <div class="content-wrap clearfix">

        <div class="container">

            <div class="row">
                <div class="col-12 mb-3">
                    <h5><a href="index">หน้าแรก</a> / ดาวน์โหลดหนังสือพิมพ์</h5>
                    <div class="feature-box fbox-small fbox-center fbox-plain fbox-large nobottomborder">
                        <div class="card">
                            <div class="card-header text-left" style="color:#000;">ดาวน์โหลดหนังสือพิมพ์</div>
                            <div class="card-body ">
                                <div class="row" style="margin-top:50px;">
                                    <div class="col-lg-2 col-xd-2"></div>
                                    <div class="col-lg-8 col-xd-8 col-sm-12">
                                        <div class="card-content">
                                            <?php $ex = explode("/", $date); ?>
                                            <div class="form-group travel-date-group">
                                                <p style="margin-bottom:10px;text-align:center;font-size:18px;color:#000;font-weight:bold;">ค้นหาหนังสือพิมพ์</p>
                                                <div style="margin-bottom: 15px;font-size:17px;color:#4A4A4A;">หนังสือพิมพ์ ประจำวันที่ <?php echo $ex[1] . ' ' . $ex[0] . ' ' . $ex[2]; ?></div>
                                                <a href="PDF-F?date=<?php echo $ex[2].'-'.$ex[1].'-'.$ex[0]; ?>"><button class="btn btn-info" style="border-color:#dbdbdb;width: 100%"><i class="icon-download-alt"></i> ดาวน์โหลด</button></a>
                                            </div>
                                            <div class="form-group" style="text-align:center;">
                                                <a href="download" class="btn btn-defalut" style="border-color:#dbdbdb;width: 100%"><i class="icon-reply1"></i> ย้อนกลับ</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-xd-2"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>



    </div>

</section><!-- #content end -->