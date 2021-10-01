<?php if (empty($_SESSION['cart'])) : ?>

  <div class="container pt-20 pb-20">
      <h3> Giỏ hàng của bạn hiện tại đang trống, lướt lướt lựa hàng ngay thôi !!</h3>
       <h4><a class="btn btn-warning" href="index.php?controller=home">Mua sắm ngay !</a></h4>
  </div>  
<?php endif ?>
<?php if(!empty($_SESSION['users'])  || !isset($_SESSION['user'])) : ?>
    <div class="container pt-60 pb-70">
      <h3>Bạn chưa có tài khoản đăng nhập để tiếp tục thanh toán !</h3>
       <h4><a class="btn btn-warning" href="index.php?controller=login&action=login">Đăng nhập ngay !</a></h4>
  </div> 
<?php endif; ?>
<?php if (isset($_SESSION['user'])) : ?>
<?php if (!empty($_SESSION['cart'])) :?>
<div class="checkout-area pt-60 pb-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-12">
                <form action="" method="POST">
                    <div class="checkbox-form">
                        <h3>Thông tin khách hàng</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Họ và Tên<span class="required">*</span></label>
                                    <input value="<?php echo $_SESSION['user']['first_name'] . ' ' . $_SESSION['user']['last_name']?>" placeholder="" type="text" name="fullname">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Số điện thoại</label>
                                    <input value="<?php echo $_SESSION['user']['phone']; ?>" placeholder="" type="text" name="mobile">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Địa chỉ<span class="required">*</span></label>
                                    <input value="<?php echo $_SESSION['user']['address']; ?>" placeholder="" type="text" name="address">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Email<span class="required">*</span></label>
                                    <input value="<?php echo $_SESSION['user']['email']; ?>" type="email" name="email">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Ghi chú thêm<span class="required">*</span></label>
                                    <input name="note" class="form-control" placeholder="" type="text">
                                </div>
                            </div>
                        </div>
                            <div class="ship-different-title">
                                <h3>
                                    <label>Chọn phương thức vận chuyển</label>
                                </h3>
                            </div>
                            <div id="" class="row">
                                <div class="col-md-12">
                                    <div class="country-select clearfix">
                                        <select name="method" class="nice-select wide">
                                          <option value="0">Thanh toán trực tuyến</option>
                                          <option value="1">Thanh toán tiền mặt</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group d-flex">
                        <input type="submit" name="submit" value="Thanh toán" class="btn btn-sm btn-warning w-50 mr-10">
                        <a href="index.php?controller=cart&action=index" class="btn btn-dark w-50">Trở về giỏ hàng</a>
                    </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6 col-12">
                <div class="your-order">
                    <h3>Đơn hàng của bạn</h3>
                    <div class="your-order-table table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="font-weight-bold">Sản phẩm</th>
                                    <th class="font-weight-bold">Tổng giá trị đơn hàng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $cart_total = 0;
                                foreach ($_SESSION['cart'] as $cart) : ?>
                                    <tr class="cart_item">
                                    <td class="cart-product-name"><?php echo $cart['title'] ?><strong class="product-quantity"> X <?php echo $cart['quantity'] ?></strong></td>
                                    <td class="cart-product-total"><span class="amount"><?php echo number_format($cart['price'], 0, '', '.') ?> VNĐ</span></td>  
                                </tr>
                                <?php 
                                    $item_price = $cart['price'] * $cart['quantity'];
                                    $cart_total += $item_price;
                                ?>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr class="order-total">
                                    <th>Tổng giá trị đơn hàng</th>
                                    <td><strong><span class="amount"><?php echo number_format($cart_total, 0, '', '.') ?> VNĐ</span></strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<?php endif; ?>
<!--Checkout Area End-->
