<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
  <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
    <h1 class="font-weight-semi-bold text-uppercase mb-3"><?php echo $tendm ?></h1>
    <div class="d-inline-flex">
      <p class="m-0"><a href="">Home</a></p>
      <p class="m-0 px-2">-</p>
      <p class="m-0"><?php echo $tendm ?></p>
    </div>
  </div>
</div>




<!-- Products Start -->
<div class="container-fluid pt-5">


  <div class="row px-xl-5 pb-3">
    <?php
    // $i=0;
    foreach ($dssp as $sp) {
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
  </div>
</div>
<!-- Products End -->