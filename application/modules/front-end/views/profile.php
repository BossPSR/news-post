<!-- Content ============================================= -->
<section id="content">

    <div class="content-wrap clearfix">

        <div class="container">

            <div class="row">
                <div class="col-12 mb-3">
                    <h5><a href="index">หน้าแรก</a> / ข้อมูลส่วนตัว</h5>
                    <div class="feature-box fbox-small fbox-center fbox-plain fbox-large nobottomborder">
                        <div class="card">
                            <div class="card-header text-left" style="color:#000;">ข้อมูลส่วนตัว</div>
                            <div class="card-body ">
                                <div class="row" style="margin-top:50px;">
                                    <div class="col-lg-2 col-xd-2"></div>
                                    <div class="col-lg-8 col-xd-8 col-sm-12">
                                        <div class="card-content text-left">
                                            <form action="profile-update" method="POST">
                                                <div class="col_full">
                                                    <label for="login-form-password" class="t400">E-Mail:</label>
                                                    <input type="text" id="login-email" class="form-control" pattern="((\w+\.)*\w+)@(\w+\.)+(com|kr|net|us|info|biz)" value="<?php echo $user['email']; ?>" readonly />
                                                    <span id="empty-email"></span>
                                                </div>

                                                <div class="data_register_detail border form-group">
                                                    <h4 class="t400 border-bottom">ที่อยู่ในการลงทะเบียน</h4>
                                                    <div class="row form-group">
                                                        <div class="col-6">
                                                            <label for="login-form-password" class="t400">เลขประจำตัวผู้เสียภาษี,สาขา:</label>
                                                            <input type="text" value="<?php echo $user['id_user']; ?>" name="userId" hidden>
                                                            <input type="text" id="login-tax" name="id_tax" class="form-control" value="<?php echo $user['id_taxs']; ?>" />
                                                            <span id="empty-tax"></span>
                                                        </div>
                                                        <div class="col-6">
                                                            <label for="login-form-password" class="t400">บริษัท:</label>
                                                            <input type="text" id="login-company" name="company" class="form-control" value="<?php echo $user['company']; ?>" />
                                                            <span id="empty-company"></span>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col-12">
                                                            <label for="login-form-password" class="t400">ที่อยู่:</label>
                                                            <textarea id="login-address" name="address" class="form-control" cols="30" rows="5"><?php echo $user['address']; ?></textarea>
                                                            <span id="empty-address"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col_full nobottommargin">
                                                        <button class="button button-rounded t400 nomargin" id="login-register" name="login-form-submit" value="login">อัพเดทข้อมูล</button>
                                                    </div>
                                                </div>
                                            </form>
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