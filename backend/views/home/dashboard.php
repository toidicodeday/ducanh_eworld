<div class="row" style="display: inline-block;" >
<div class="tile_count">
<div class="col-md-6 col-sm-4  tile_stats_count">
  <span class="count_top text-center"><i class="fa fa-user"></i>Tổng lượng khách hàng đăng kí</span>
  <div class="count"><?php echo $_SESSION['dashboard']['total_user']; ?> tài khoản</div>
</div>
<div class="col-md-6 col-sm-4  tile_stats_count">
  <span class="count_top"><i class="fa fa-clock-o"></i> Doanh thu</span>
  <div class="count"><?php echo number_format($_SESSION['dashboard']['sum_price_total'], 0, '', '.'); ?> VNĐ</div>
</div>
<div class="col-md-6 col-sm-4  tile_stats_count">
  <span class="count_top"><i class="fa fa-user"></i>Số lượng đơn hàng</span>
  <div class="count"><?php echo $_SESSION['dashboard']['total_order']; ?> đơn hàng</div>
</div>
<div class="col-md-6 col-sm-4  tile_stats_count">
  <span class="count_top"><i class="fa fa-user"></i>Giá trị trung bình mỗi đơn hàng</span>
  <div class="count"><?php echo number_format($_SESSION['dashboard']['avg_price'], 0, '', '.'); ?> VNĐ</div>
</div>
</div>
