<!-- Content ============================================= -->
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
                                    <li class="nav-item"><a class="nav-link active" href="#TEM" data-toggle="tab">TEMPLATE</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#PDFS" data-toggle="tab">รูปภาพและ PDF</a></li>
                                </ul>
                            </div>
                            <div class="card-body ">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div id="TEM" class="container tab-pane active"><br>
                                        <div class="row">
                                            <div class="col-lg-12 col-xd-12 col-sm-12" style="overflow: auto;white-space: nowrap;">
                                                <div class="card-content">
                                                    <?php if (!empty($show_template)) { ?>
                                                        <table class="table table-striped table-bordered" style="width:100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>#เลขที่สั่งซื้อ</th>
                                                                    <th>วันที่ทำรายการ</th>
                                                                    <th>เครดิต</th>
                                                                    <th>ยอดรวม</th>
                                                                    <th>สถานะ</th>
                                                                    <th>ใบเสร็จรับเงิน</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($show_template as $show_template) { ?>
                                                                    <tr>
                                                                        <td><?= $show_template['id_order']; ?></td>
                                                                        <td><?= $show_template['created_at']; ?></td>
                                                                        <td>1 เครดิต</td>
                                                                        <td>45 บาท</td>
                                                                        <td>ชำระเงินเรียบร้อย</td>
                                                                        <td>
                                                                            <a href="#" class="button button-mini button-circle button-green"><i class="icon-download"></i>พิมพ์ใบเสร็จรับเงิน</a>
                                                                        </td>
                                                                    </tr>
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
                                    <div id="PDFS" class="container tab-pane"><br>
                                        <div class="row">
                                            <div class="col-lg-12 col-xd-12 col-sm-12" style="overflow: auto;white-space: nowrap;">
                                                <div class="card-content">
                                                    <?php if (!empty($show_ppdf)) { ?>
                                                        <table class="table table-striped table-bordered" style="width:100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>#เลขที่สั่งซื้อ</th>
                                                                    <th>หัวข้อ</th>
                                                                    <th>เครดิต</th>
                                                                    <th>ยอดรวม</th>
                                                                    <th>วันที่ทำรายการ</th>
                                                                    <th>วันที่ลงโฆษณา</th>
                                                                    <th>ฟังก์ชั่น</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $i = 1; ?>
                                                                <?php foreach ($show_ppdf as $show_ppdf) { ?>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td><?= $show_ppdf['topic']; ?></td>
                                                                        <td><?= number_format($show_ppdf['credit']); ?></td>
                                                                        <td><?= number_format($show_ppdf['credit'] * 45); ?></td>
                                                                        <td><?= $show_ppdf['created_at']; ?></td>
                                                                        <td><?= $show_ppdf['date']; ?></td>
                                                                        <td>
                                                                            <a href="#" class="button button-mini button-circle button-green"><i class="icon-download"></i>พิมพ์ใบเสร็จรับเงิน</a>
                                                                        </td>
                                                                    </tr>
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