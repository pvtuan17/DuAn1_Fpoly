<!-- Shop Start -->
<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Tất cả sản phẩm</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Tất cả sản phẩm</p>
        </div>
    </div>
</div>
<!-- Page Header End -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <?php
        include "view/boxleft.php";
        ?>

        <!-- Shop Product Start -->
        <div class="col-lg-9 col-md-12">
            <div class="row pb-3">
                <div class="col-12 pb-1">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <form action="index.php?act=sanpham" method="POST">
                            <div class="input-group">
                                <input type="text" class="form-control" name="kyw" placeholder="Search by name">
                                <div class="input-group-append">
                                    <span class="input-group-text bg-transparent text-primary">
                                        <i class="fa fa-search"></i>
                                    </span>
                                </div>
                            </div>
                        </form>
                        <div class="dropdown ml-4">
                            <button class="btn border dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Sort by
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                                <a class="dropdown-item" href="#">Latest</a>
                                <a class="dropdown-item" href="#">Popularity</a>
                                <a class="dropdown-item" href="#">Best Rating</a>
                            </div>
                        </div>
                    </div>
                </div>


                <?php
                // $i=0;
                foreach ($dstop10 as $sp) {
                    extract($sp);
                    $linksp = "index.php?act=sanphamct&idsp=" . $id;
                    $hinh = $img_path . $img;
                    // $if()
                    echo '
                <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
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
                      <form action="' . $linksp . '" method="post">
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


                <div class="col-12 pb-1">
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center mb-3">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Shop Product End -->
    </div>
</div>
<!-- Shop End -->