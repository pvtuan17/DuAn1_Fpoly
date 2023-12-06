    <?php
    include "view/banner.php"
    ?>
    <!-- Categories Start -->
    <div class="container pt-5">
        <div class="border p-2">
            <!-- <a href="index.php?act=lichsu">lịch sủ đơn hàng</a> -->
            <h2 class="cate-title">Tất cả danh mục</h2>
        </div>
        <div class="cate-list border">
            <?php
            foreach ($dsdm as $dm) {
                extract($dm);
                $linkdm = "index.php?act=sanpham&iddm=" . $id;
                $hinh = $img_path . $img;
                echo '
            <a href="' . $linkdm . '" class="items border border-black p-2">
                <div class="img-cate">
                    <img src="' . $hinh . '" alt="" />
                </div>
                <p>' . $name . '</p>
            </a>
            ';
            } ?>
        </div>

    </div>
    <!-- <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5">
                <span class="px-2">Danh mục hot</span>
            </h2>
        </div>
        <div class="row px-xl-5 pb-3">
            <?php
            foreach ($dmtop3 as $dm) {
                extract($dm);
                $linkdm = "index.php?act=sanpham&iddm=" . $id;
                $hinh = $img_path . $img;
                echo '
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column align-items-center border mb-4" style="padding: 30px">
                    <a href="' . $linkdm . '" class="cat-img position-relative overflow-hidden mb-3">
                        <img class="" src="' . $hinh . '" alt="" />
                        
                    </a>
                    <h5 class="font-weight-semi-bold m-0">' . $name . '</h5>
                </div>
            </div>';
            } ?>

        </div>
    </div> -->
    <!-- Categories End -->

    <!-- Offer Start -->
    <div class="container-fluid offer pt-5">
        <div class="row px-xl-5">
            <div class="col-md-6 pb-4">
                <div class="position-relative bg-secondary text-center text-md-right text-white mb-2 py-5 px-5">
                    <img src="img/offer-1.png" alt="" />
                    <div class="position-relative" style="z-index: 1">
                        <h5 class="text-uppercase text-primary mb-3">
                            Giảm giá 30% cho người mới
                        </h5>
                        <h1 class="mb-4 font-weight-semi-bold">Quần áo Thu Đông</h1>
                        <a href="" class="btn btn-outline-primary py-md-2 px-md-3">Shop Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 pb-4">
                <div class="position-relative bg-secondary text-center text-md-left text-white mb-2 py-5 px-5">
                    <img src="img/offer-2.png" alt="" />
                    <div class="position-relative" style="z-index: 1">
                        <h5 class="text-uppercase text-primary mb-3">
                            Giảm giá 30% cho người mới
                        </h5>
                        <h1 class="mb-4 font-weight-semi-bold">Quần áo hè</h1>
                        <a href="" class="btn btn-outline-primary py-md-2 px-md-3">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Offer End -->

    <!-- Products Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5">
                <span class="px-2">Sản phẩm mới nhất</span>
            </h2>
        </div>

        <div class="row px-xl-5 pb-3">
            <!-- mẫu  -->
            <?php
            // $i=0;

            foreach ($spnew as $sp) {
                extract($sp);
                $linksp = "index.php?act=sanphamct&idsp=" . $id;
                $hinh = $img_path . $img;

                echo '
                <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card border-1 mb-4 box__child-items">
                    <img src="' . $hinh . '" alt="product" />
                    <div class="product-name">
                        <h6 class="m-3">' . $name . '</h6>
                    </div>
                    <div class="price">
                        <p>' . number_format($price, 0, ', ', ', ') . ' vnđ</p>
                        <del>42,000 vnđ</del>
                    </div>
                    <div class="hover">
                        <div class="add">
                            <div class="add__top">
                                <a href="' . $linksp . '" class="add__top-icon">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <a href="" class="add__top-icon">
                                    <i class="fa-sharp fa-solid fa-cart-shopping"></i>
                                </a>
                                <a href="" class="add__top-icon">
                                    <i class="fas fa-heart"></i>
                                </a>
                            </div>
                            <div class="add__bottom">
                                <form action="?act=add_to_cart&idsp=' . $id . '" method="post">
                                    <button class="add__bottom-icon btn" type="submit" name="btn" value="btn">
                                        <div><i class="fa-solid fa-bag-shopping"></i></div>
                                        <p>Add to cart</p>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            ';
            } ?>
        </div>
    </div>


    <!-- Products End -->
    <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Sản phẩm tốt</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">Miễn phí vận chuyển</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">
                        Đổi trả trong vòng 1 tháng
                    </h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Hỗ trợ 24/7</h5>
                </div>
            </div>
        </div>
    </div>

    <!-- Products Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5">
                <span class="px-2">Sản phẩm yêu thích nhất</span>
            </h2>
        </div>

        <div class="row px-xl-5 pb-3">
            <!-- mẫu  -->
            <?php
            // $i=0;
            foreach ($dstop10 as $sp) {
                extract($sp);
                $linksp = "index.php?act=sanphamct&idsp=" . $id;
                $hinh = $img_path . $img;
                // $if()
                echo '
                <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card border-1 mb-4 box__child-items">
                  <img src="' . $hinh . '" alt="product" />
                  <div class="product-name">
                    <h6 class="m-3">' . $name . '</h6>
                  </div>
                  <div class="price">
                    <p>' . number_format($price, 0, ',', ',') . ' vnđ</p>
                    <del>42,000 vnđ</del>
                  </div>
                  <div class="hover">
                    <div class="add">
                      <div class="add__top">
                        <a href="' . $linksp . '" class="add__top-icon">
                          <i class="fa-solid fa-eye"></i>
                        </a>
                        <a href="" class="add__top-icon">
                          <i class="fa-sharp fa-solid fa-cart-shopping"></i>
                        </a>
                        <a href="" class="add__top-icon">
                          <i class="fas fa-heart"></i>
                        </a>
                      </div>
                      <div class="add__bottom">
                      <form action="?act=add_to_cart&idsp=' . $id . '" method="post">
                      <button class="add__bottom-icon btn" type="submit" name="btn" value="btn">
                          <div><i class="fa-solid fa-bag-shopping"></i></div>
                          <p>Add to cart</p>
                      </button>
                  </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            ';
            } ?>
        </div>
    </div>

    <!-- Products End -->

    <!-- Vendor Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel vendor-carousel">
                    <div class="vendor-item border p-4 image-mau">
                        <img src="img/mẫu ảnh 1.jpg" alt="" />
                    </div>
                    <div class="vendor-item border p-4 image-mau">
                        <img src="img/mẫu ảnh 2.webp" alt="" />
                    </div>
                    <div class="vendor-item border p-4 image-mau">
                        <img src="img/mẫu ảnh 3.jpg" alt="" />
                    </div>
                    <div class="vendor-item border p-4 image-mau">
                        <img src="img/mẫu ảnh 4.jpg" alt="" />
                    </div>
                    <div class="vendor-item border p-4 image-mau">
                        <img src="img/mẫu ảnh 5.jfif" alt="" />
                    </div>
                    <div class="vendor-item border p-4 image-mau">
                        <img src="img/mẫu ảnh 6.jpg" alt="" />
                    </div>
                    <div class="vendor-item border p-4 image-mau">
                        <img src="img/mẫu ảnh 7.jpg" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor End -->