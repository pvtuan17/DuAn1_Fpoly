
<table class="table">
  <thead>
    <tr>
      <!-- <th scope="col">Ảnh</th> -->
      <th scope="col">Tên</th>
      <th scope="col">Giá</th>
      <th scope="col">Số lượng</th>
      <th scope="col">Trạng thái</th>
      <th scope="col">Tổng</th>
    </tr>
  </thead>
  <tbody>
    <?php 
        foreach($dhct as $dhct) {
            extract($dhct);
            // var_dump($dhct);
            if ($trangthai == 0) {
                $trangthai = '<span style="background-color: #1cc88a;color: white; border-radius: 8px;padding: 0 5px">Giao hàng thành công</span>';
            } else if ($trangthai == 1) {
                $trangthai = '<span style="background-color: #f6c23e;color: white; border-radius: 8px;padding: 0 5px">Đang giao hàng</span>';
            } else if ($trangthai == 2) {
                $trangthai = '<span style="background-color: #4e73df; color: white; border-radius: 8px;padding: 0 5px">Đã xác nhận</span>';
            } else {
                $trangthai = '<span style="background-color: #e74a3b;color: white; border-radius: 8px;padding: 0 5px">Chưa xác nhận</span>';
            }
        ?>
        <tr>
            <!-- <td><img width="70" src="upload/<?= $img ?>" alt=""> -->
            </td>
            <td> <?= $name ?>
            </td>
            <td> ₫<?= number_format($gia_ban, 0, ',', '.') ?>
            </td>
            <td> x<?= $soLuong ?>
            </td>
            <td> <?= $trangthai ?>
            </td>
            <td> ₫<?= number_format($soLuong * $gia_ban +10000, 0, ',', '.') ?>
            </td>
        </tr>
    <?php }?>
  </tbody>
</table>
