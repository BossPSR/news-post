<div class="detail_register">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="t400 text-center">ลงทะเบียน</h2>
                <form method="POST" name="frmMain">

                    <div class="col_full">
                        <label for="login-form-password" class="t400">E-Mail:</label>
                        <input type="text" id="login-email" name="email" class="form-control" pattern="((\w+\.)*\w+)@(\w+\.)+(com|kr|net|us|info|biz)" />
                        <span id="empty-email"></span>
                    </div>

                    <div class="col_full">
                        <label for="login-form-password" class="t400">Password:</label>
                        <input type="password" id="login-password" name="password" class="form-control" />
                        <span id="empty-password"></span>
                    </div>

                    <div class="col_full">
                        <label for="login-form-password" class="t400">Confirm Password:</label>
                        <input type="password" id="login-Cpassword" name="Cpassword" class="form-control" />
                        <span id="empty-Cpassword"></span>
                        <span id="empty-chackpassword"></span>
                    </div>

                    <div class="data_register_detail border form-group">
                        <h4 class="t400 border-bottom">ที่อยู่ในการลงทะเบียน</h4>
                        <div class="row form-group">
                            <div class="col-6">
                                <label for="login-form-password" class="t400">เลขประจำตัวผู้เสียภาษี,สาขา:</label>
                                <input type="text" id="login-tax" name="id_tax" class="form-control" />
                                <span id="empty-tax"></span>
                            </div>
                            <div class="col-6">
                                <label for="login-form-password" class="t400">บริษัท:</label>
                                <input type="text" id="login-company" name="company" class="form-control" />
                                <span id="empty-company"></span>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-12">
                                <label for="login-form-password" class="t400">ที่อยู่:</label>
                                <textarea id="login-address" name="address" class="form-control" cols="30" rows="5"></textarea>
                                <span id="empty-address"></span>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="col_full nobottommargin">
                    <button class="button button-rounded t400 nomargin" id="login-register" name="login-form-submit" value="login">สมัครสมาชิก</button>
                </div>


            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('#login-register').click(function() {
        var password = $("#login-password").val();
        var Cpassword = $("#login-Cpassword").val();
        var email = $("#login-email").val();
        var tax = $("#login-tax").val();
        var company = $("#login-company").val();
        var address = $("#login-address").val();


        if (Cpassword.length === 0) {

            $('#empty-Cpassword').html('The confirm password is empty !!').css('color', 'red');
        } else if (Cpassword.length !== 0) {
            $('#empty-Cpassword').html('').css('color', 'red');
        } else if (password != Cpassword) {
            $('#empty-chackpassword').html('Not match !!').css('color', 'red');
        } else {
            $('#empty-chackpassword').html('Match').css('color', 'green');
        }
        if (tax.length === 0) {
            $('#empty-tax').html('The tax is empty !!').css('color', 'red');
        } else if (tax.length !== 0) {
            $('#empty-tax').html('').css('color', 'red');
        }
        if (company.length === 0) {
            $('#empty-company').html('The company is empty !!').css('color', 'red');
        } else if (company.length !== 0) {
            $('#empty-company').html('').css('color', 'red');
        }
        if (address.length === 0) {
            $('#empty-address').html('The address is empty !!').css('color', 'red');
        } else if (address.length !== 0) {
            $('#empty-address').html('').css('color', 'red');
        }
        if (email.length === 0) {
            $('#empty-email').html('The email is empty !!').css('color', 'red');
        } else if (email.length !== 0) {
            $('#empty-email').html('').css('color', 'red');
        }
        if (password.length === 0) {
            $('#empty-password').html('The password is empty !!').css('color', 'red');
        } else if (password.length !== 0) {
            $('#empty-password').html('').css('color', 'red');
        }
        if (password.length !== 0 && Cpassword.length !== 0 && email.length !== 0 && tax.length !== 0 && company.length !== 0 && address.length !== 0 && password == Cpassword) {
            frmMain.action = 'register_success'
            frmMain.submit();

        }

        // if (username.length === 0 && password.length === 0) {
        //     // console.log(password);
        //     $('#empty-email').html('The email is empty !!').css('color', 'red');
        //     $('#empty-password').html('The password is empty !!').css('color', 'red');
        // } else {
        //     frmMain.action = 'LoginMe'
        //     frmMain.submit();
        // }

    });
</script>