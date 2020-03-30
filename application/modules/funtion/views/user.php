<div class="wrapper">
            <div class="container-fluid">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group pull-right">
                                
                            </div>
                            <h4 class="page-title">ข้อมูลผู้ใช้งาน</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-30">
                            <div class="card-body">

                                <h4 class="mt-0 header-title">ข้อมูลผู้ใช้งาน</h4>
                            
                                <table id="datatable" class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>ชื่อ-สกุล</th>
                                        <th>อีเมล</th>
                                        <th>เบอร์โทร</th>
                                        <th>วันที่สร้าง</th>
                                        <th>สถานะ</th>
                                        <th>เครื่องมือ</th>
                                    </tr>
                                    </thead>
                                         <?php $i = 1?>

                                    <tbody>
                                    <?php foreach ($user as $user) { ?>
                              
                                    <tr>
                                        <td style="text-align: center"><?php echo $i++ ?></td>
                                        <td><?php echo $user['username']; ?></td>
                                        <td><?php echo $user['email']; ?></td>
                                        <td><?php echo $user['phone']; ?></td>
                                        <td><?php echo $user['created_at']; ?></td>
                                        <td> 
                                        <?php if ($user['is_admin'] == '4') :?>
                                            <div class="dropdown ">
                                            <button type="button" id="dropdownMenuButton" data-toggle="dropdown" class="btn btn-outline-primary waves-effect waves-light"><i class="mdi mdi-account"></i>ผู้ดูแลระบบ <i class="mdi mdi-chevron-down"></i></button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                        <a class="dropdown-item" href="user_status?id=<?php echo $user['id']; ?>&status=3">ผู้ใช้งานประเภทนักศึกษา</a>
                                                                        <a class="dropdown-item" href="user_status?id=<?php echo $user['id']; ?>&status=2">ผู้ใช้งานประเภทอาจารย์</a>
                                                                        <a class="dropdown-item" href="user_status?id=<?php echo $user['id']; ?>&status=1">ผู้ใช้งานประเภททั่วไป</a>
                                                                       
                                                                      
                                                </div>
                                            </div>
                                        <?php elseif ($user['is_admin'] == '3') :?>
                                            <div class="dropdown ">
                                            <button type="button" id="dropdownMenuButton" data-toggle="dropdown" class="btn btn-outline-primary waves-effect waves-light"><i class="mdi mdi-account"></i>ผู้ใช้งานประเภทนักศึกษา <i class="mdi mdi-chevron-down"></i></button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                        <a class="dropdown-item" href="user_status?id=<?php echo $user['id']; ?>&status=4">ผู้ดูแลระบบ</a>
                                                                        <a class="dropdown-item" href="user_status?id=<?php echo $user['id']; ?>&status=2">ผู้ใช้งานประเภทอาจารย์</a>
                                                                        <a class="dropdown-item" href="user_status?id=<?php echo $user['id']; ?>&status=1">ผู้ใช้งานประเภททั่วไป</a>
                                                                      
                                                </div>
                                            </div>
                                        <?php elseif ($user['is_admin'] == '2') :?>
                                            <div class="dropdown ">
                                            <button type="button" id="dropdownMenuButton" data-toggle="dropdown" class="btn btn-outline-primary waves-effect waves-light"><i class="mdi mdi-account"></i>ผู้ใช้งานประเภทอาจารย์<i class="mdi mdi-chevron-down"></i></button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            
                                                                        <a class="dropdown-item" href="user_status?id=<?php echo $user['id']; ?>&status=4">ผู้ดูแลระบบ</a>
                                                                        <a class="dropdown-item" href="user_status?id=<?php echo $user['id']; ?>&status=3">ผู้ใช้งานประเภทนักศึกษา</a>
                                                                        <a class="dropdown-item" href="user_status?id=<?php echo $user['id']; ?>&status=1">ผู้ใช้งานประเภททั่วไป</a>
                                                </div>
                                            </div>
                                        <?php else :?>
                                            <div class="dropdown ">
                                            <button type="button" id="dropdownMenuButton" data-toggle="dropdown" class="btn btn-outline-primary waves-effect waves-light"><i class="mdi mdi-account"></i>ผู้ใช้งานประเภททั่วไป<i class="mdi mdi-chevron-down"></i></button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                         <a class="dropdown-item" href="user_status?id=<?php echo $user['id']; ?>&status=4">ผู้ดูแลระบบ</a>
                                                                        <a class="dropdown-item" href="user_status?id=<?php echo $user['id']; ?>&status=3">ผู้ใช้งานประเภทนักศึกษา</a>
                                                                        <a class="dropdown-item" href="user_status?id=<?php echo $user['id']; ?>&status=2">ผู้ใช้งานประเภทอาจารย์</a>
                                                                      
                                                </div>
                                            </div>
                                            <?php endif ?>
                                       </td>
                                        <td> 
                                         <a href="user_edit?id=<?php echo $user['id']; ?>" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                         <!-- <a href="delete_user?id=<?php echo $user['id']; ?>" class="btn btn-danger" onclick="return confirm('ยืนยันการลบข้อมูล')"><i class="fa fa-trash"></i></a>  -->
                                    </td>
                                    </tr>
                                    <?php }?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
