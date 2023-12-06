<div class="add">
    <div class="row2">
        <div class="row2 font_title">
            <h1>Thêm sản phẩm biến thể</h1>
        </div>
        <div class="row2 form_content ">
            <form action="index.php?act=addpv" method="POST" enctype="multipart/form-data">


                <label> Sản phẩm </label> <br>
                <select name="id_sp" id="">
                    <?php
                    // var_dump($listsanpham);
                    foreach ($listsanpham as $sp) {
                        extract($sp);
                        echo '<option value="' . $id . '">' . $id . '</option>';
                    }
                    ?>
                </select><br>
                <p class="text-dark font-weight-medium mb-0 mr-3">Sizes:</p>
                    <?php
                    
                    $i = 1;
                    foreach ($listsize as $key) :
                    ?>
                        <div class=" custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="size-<?php echo $i ?>" name="id_size" value="<?= $key['id'] ?>">
                            <label class="custom-control-label" for="size-<?php echo $i ?>"><?= $key['size'] ?></label>
                        </div>
                    <?php
                        $i++;
                    endforeach ?><br>
               
                
                <label> Color </label> <br>
                <select name="id_color" id="">
                    <?php
                    // var_dump($listcolor);
                    foreach ($listcolor as $colore) {
                        extract($colore);
                        echo '<option value="' . $id . '">' . $color . '</option>';
                    }
                    ?>
                </select>
                <div class="row2 mb10">
                    <label>Giá sản phẩm </label> <br>
                    <input type="text" name="price" placeholder="nhập vào của sản phẩm">
                </div>
                <div class="row2 mb10">
                    <label>Số lượng sản phẩm </label> <br>
                    <input type="text" name="quantity" placeholder="nhập vào của sản phẩm">
                </div>


                <div class="row mb10 ">
                    <input class="mr20" name="themmoiprov" type="submit" value="THÊM MỚI">
                    <input class="mr20" type="reset" value="NHẬP LẠI">

                    <a href="index.php?act=listsppv"><input class="mr20" type="button" value="DANH SÁCH"></a>
                </div>
                <?php
                if (isset($thanhcong) && ($thanhcong != "")) {
                    echo $thanhcong;
                }

                ?>
            </form>
        </div>
    </div>