<?php include("Head.php"); ?>
        <section class="main_content dashboard_part">
            <div class="main_content_iner ">
                <div class="container-fluid p-0">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="single_element">
                                <div class="quick_activity">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="quick_activity_wrap">
                                                <div class="single_quick_activity d-flex">
                                                    <div class="icon">
                                                        <img src="../Assets/Template/Admin/img/icon/user.png" alt="">
                                                    </div>
                                                    <div class="count_content">
                                                        <h3><span class="counter">
                                                        <?php
														$sel = "select count(shop_id) as id from tbl_shop";
														$result = $con->query($sel);
														$data = $result->fetch_assoc();
														echo $data["id"];
                                                        ?>
                                                        </span> </h3>
                                                        <p>Shop</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="white_box card_height_100">
                                <div class="box_header border_bottom_1px  ">
                                    <div class="main-title">
                                        <h3 class="mb_25">Shop</h3>
                                    </div>
                                </div>
                                <div class="staf_list_wrapper sraf_active owl-carousel">
                                    <?php
                                        $selQry = "select * from tbl_shop";
                                        $result1 = $con->query($selQry);
										while($data1 = $result1->fetch_assoc())
                                        {
                                    ?>
                                    <div class="single_staf">
                                        <div class="staf_thumb">
                                            <img src="../Assets/Files/Shop/logo/<?php echo $data1["shop_logo"] ?>" alt="">
                                        </div>
                                        <h4><?php echo $data1["shop_name"] ?></h4>
                                        <p><?php echo $data1["shop_contact"] ?></p>
                                    </div>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </section>
      <?php

                                        include("Foot.php");
    ?>