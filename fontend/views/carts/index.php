<?php if (empty($_SESSION['cart'])) : ?>
<div class="container pt-60 pb-70">
  <h3> Giỏ hàng của bạn hiện tại đang trống, lướt lướt lựa hàng ngay thôi !!</h3>
  <h4><a class="btn btn-warning" href="index.php?controller=home">Mua sắm ngay !</a></h4>
</div>
<?php endif ?>
<?php if(!empty($_SESSION['users'])  || !isset($_SESSION['user'])) : ?>
<div class="container pt-60 pb-70">
  <h3>Bạn chưa có tài khoản đăng nhập để tiếp tục mua hàng !</h3>
  <h4><a class="btn btn-warning" href="index.php?controller=login&action=login">Đăng nhập ngay !</a></h4>
</div>
<?php endif; ?>
<?php if (isset($_SESSION['user'])) : ?>
<?php if (!empty($_SESSION['cart'])) :?> 
<div class="Shopping-cart-area pt-60 pb-60">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <form action="" method="POST">
          <div class="table-content table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th class="li-product-remove">Xóa</th>
                  <th class="li-product-thumbnail">Mô tả</th>
                  <th class="cart-product-name" width="100px">Sản phẩm</th>
                  <th class="li-product-price">Giá</th>
                  <th class="li-product-quantity">Số lượng</th>
                  <th class="li-product-subtotal">Tổng</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $total_cart = 0;
                  $total_quantity = 0;
                  foreach ($_SESSION['cart'] as $product_id => $cart) : ?>
                <tr>
                  <td class="li-product-remove"><a onclick="return confirm('Bạn chắc chắn xóa không?')" href="index.php?controller=cart&action=delete&id=<?php echo $product_id; ?>"><i class="fa fa-times"></i></a></td>
                  <td class="li-product-thumbnail"><a href="#"><img width="150" src="../backend/assets/images/products/<?php echo $cart['avatar'] ?>" alt="Li's Product Image"></a></td>
                  <td class="li-product-name"><a href="index.php?controller=product&action=detail&id=<?php echo $product_id; ?>"><?php echo $cart['title'] ?></a></td>
                  <td class="li-product-price"><span class="amount"><?php echo number_format($cart['price'], 0, '', '.') ?>VNĐ</span></td>
                  <td class="quantity">
                    <label></label>
                    <div class="cart-plus-minus">
                      <input name="<?php echo $product_id; ?>" class="cart-plus-minus-box" value="<?php echo $cart['quantity'] ?>" type="text">
                      <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                      <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                    </div>
                  </td>
                  <td class="product-subtotal"><span class="amount">
                    <?php 
                      $total_item = $cart['price'] * $cart['quantity'];
                      $total_cart += $total_item;
                      echo number_format($total_item, 0, '', '.');
                      $quantity_item = $cart['quantity'];
                      $total_quantity +=$quantity_item;
                      ?>                                        
                    VNĐ</span>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="coupon-all">
                <div class="coupon2">
                  <input class="button" name="update_cart" value="Cập nhật giỏ hàng" type="submit">
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-5 ml-auto">
              <div class="cart-page-total">
                <h2>Tổng giá trị đơn hàng</h2>
                <ul>
                  <li>
                    Số lượng sản phẩm
                    <span><?php echo $total_quantity; ?> sản phẩm</span>
                  </li>
                  <li>Tổng tiền đơn hàng <span><?php echo number_format($total_cart, 0, '', '.'); ?> VNĐ</span></li>
                </ul>
                <a href="index.php?controller=payment&action=index">Thanh toán</a>
              </div>
            </div>
          </div>
        </form>
        <?php endif; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
<!--Shopping Cart Area End-->
<!-- Begin Footer Area -->