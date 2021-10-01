<!-- Begin Slider With Banner Area -->
<div class="slider-with-banner">
  <div class="container">
    <div class="row">
      <!-- Begin Slider Area -->
      <div class="col-lg-12 col-md-12">
        <div class="slider-area">
          <div class="slider-active owl-carousel owl-themes">
            <?php include "views/layouts/slide.php"; ?>
          </div>
        </div>
      </div>
      <!-- Slider Area End Here -->
    </div>
  </div>
</div>
<!-- Slider With Banner Area End Here -->
<!-- Begin Product Area -->
<div class="product-area pt-60 pb-50">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="li-product-tab">
          <ul class="nav li-product-menu">
            <li><a class="active" data-toggle="tab" href="#li-new-product"><span>Mới</span></a></li>
            <li><a data-toggle="tab" href="#li-bestseller-product"><span>Bán chạy</span></a></li>
            <li><a data-toggle="tab" href="#li-featured-product"><span>Nổi bật</span></a></li>
          </ul>
        </div>
        <!-- Begin Li's Tab Menu Content Area -->
      </div>
    </div>
    <div class="tab-content">
      <div id="li-new-product" class="tab-pane active show" role="tabpanel">
        <div class="row">
          <div class="product-active owl-carousel">
            <?php foreach ($new_products as $product) : ?>
            <div class="col-lg-12">
              <!-- single-product-wrap start -->
              <div class="single-product-wrap">
                <div class="product-image">
                  <a href="index.php?controller=product&action=detail&id=<?php echo $product['id']; ?>">
                  <img style="max-height: 120px;" src="../backend/assets/images/products/<?php echo $product['avatar']; ?>" alt="Li's Product Image">
                  </a>
                  <span class="sticker">New</span>
                </div>
                <div class="product_desc text-center">
                  <div class="product_desc_info">
                    <h4><a class="product_name pt-10" href="index.php?controller=product&action=detail&id=<?php echo $product['id']; ?>"><?php echo $product['title'] ?></a></h4>
                    <div class="price-box">
                      <span class="new-price font-weight-bold"><?php echo number_format($product['price'] , 0, '.', '.'); ?> vnđ</span>
                    </div>
                  </div>
                  <div class="add-actions">
                    <ul class="add-actions-link">
                      <li class="add-cart active add-to-cart"  data-id="<?php echo $product['id']; ?>" >Thêm vào giỏ</li>
                      <li onclick="displayModalProduct(<?php echo $product['id'] ?>)" ><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <!-- single-product-wrap end -->
            </div>
            <?php endforeach;  ?>
          </div>
        </div>
      </div>
      <div id="li-bestseller-product" class="tab-pane" role="tabpanel">
        <div class="row">
          <div class="product-active owl-carousel text-center">
            <?php foreach ($bestseller_products as $product) : ?>
            <div class="col-lg-12">
              <!-- single-product-wrap start -->
              <div class="single-product-wrap">
                <div class="product-image">
                  <a href="index.php?controller=product&action=detail&id=<?php echo $product['id']; ?>">
                  <img style="max-height: 120px;" src="../backend/assets/images/products/<?php echo $product['avatar']; ?>" alt="Li's Product Image">
                  </a>
                  <span class="sticker">Best</span>
                </div>
                <div class="product_desc">
                  <div class="product_desc_info">
                    <h4><a class="product_name pt-10" href="index.php?controller=product&action=detail&id=<?php echo $product['id']; ?>"><?php echo $product['title']; ?></a></h4>
                    <div class="price-box">
                      <span class="new-price font-weight-bold"><?php echo number_format($product['price'] , 0, '.', '.'); ?> vnđ</span>
                    </div>
                  </div>
                  <div class="add-actions">
                    <ul class="add-actions-link">
                      <li class="add-cart active add-to-cart"  data-id="<?php echo $product['id']; ?>" >Thêm vào giỏ</li>
                      <li onclick="displayModalProduct(<?php echo $product['id'] ?>)"><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <!-- single-product-wrap end -->
            </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
      <div id="li-featured-product" class="tab-pane" role="tabpanel">
        <div class="row">
          <div class="product-active owl-carousel text-center">
            <?php foreach ($feature_products as $product) : ?>
            <div class="col-lg-12">
              <!-- single-product-wrap start -->
              <div class="single-product-wrap">
                <div class="product-image">
                  <a href="index.php?controller=product&action=detail&id=<?php echo $product['id']; ?>">
                  <img style="max-height: 120px;" src="../backend/assets/images/products/<?php echo $product['avatar']; ?>" alt="Li's Product Image">
                  </a>
                  <span class="sticker">New</span>
                </div>
                <div class="product_desc text-center">
                  <div class="product_desc_info">
                    <h4><a class="product_name pt-10" href="index.php?controller=product&action=detail&id=<?php echo $product['id']; ?>"><?php echo $product['title'] ?></a></h4>
                    <div class="price-box">
                      <span class="new-price font-weight-bold"><?php echo number_format($product['price'] , 0, '.', '.'); ?> vnđ</span>
                    </div>
                  </div>
                  <div class="add-actions">
                    <ul class="add-actions-link">
                      <li class="add-cart active add-to-cart"  data-id="<?php echo $product['id']; ?>" >Thêm vào giỏ</li>
                      <li onclick="displayModalProduct(<?php echo $product['id'] ?>)"><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <!-- single-product-wrap end -->
            </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Product Area End Here -->
<!-- Begin Li's Laptop Product Area -->
<section class="product-area li-laptop-product pt-20  pb-45">
  <div class="container">
    <div class="row">
      <!-- Begin Li's Section Area -->
      <div class="col-lg-12">
        <div class="li-section-title">
          <h2>
            <span>Laptop</span>
          </h2>
        </div>
        <div class="row">
          <div class="product-active owl-carousel text-center">
            <?php foreach ($laptop as $laptop) : ?>
            <div class="col-lg-12">
              <!-- single-product-wrap start -->
              <div class="single-product-wrap">
                <div class="product-image">
                  <a href="index.php?controller=product&action=detail&id=<?php echo $laptop['id']; ?>">
                  <img style="max-height: 120px;" src="../backend/assets/images/products/<?php echo $laptop['avatar']; ?>" alt="Li's Product Image">
                  </a>
                  <span class="sticker">New</span>
                </div>
                <div class="product_desc">
                  <div class="product_desc_info">
                    <h4><a class="product_name" href="index.php?controller=product&action=detail&id=<?php echo $laptop['id']; ?>"><?php echo $laptop['title'] ?></a></h4>
                    <div class="price-box">
                      <span class="new-price font-weight-bold"><?php echo number_format($laptop['price'] , 0, '.', '.'); ?> vnđ</span>
                    </div>
                  </div>
                  <div class="add-actions">
                    <ul class="add-actions-link">
                      <li class="add-cart active add-to-cart"  data-id="<?php echo $product['id']; ?>" >Thêm vào giỏ</li>
                      <li onclick="displayModalProduct(<?php echo $laptop['id'] ?>)" ><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <!-- single-product-wrap end -->
            </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
      <!-- Li's Section Area End Here -->
    </div>
  </div>
</section>
<!-- Li's Laptop Product Area End Here -->
<!-- Begin Li's TV & Audio Product Area -->
<section class="product-area li-laptop-product li-tv-audio-product pt-60 pb-45">
  <div class="container">
    <div class="row">
      <!-- Begin Li's Section Area -->
      <div class="col-lg-12">
        <div class="li-section-title">
          <h2>
            <span>Điện thoại</span>
          </h2>
        </div>
        <div class="row">
          <div class="product-active owl-carousel text-center">
            <?php foreach ($mobile as $mobile) : ?>
            <div class="col-lg-12">
              <!-- single-product-wrap start -->
              <div class="single-product-wrap">
                <div class="product-image">
                  <a href="index.php?controller=product&action=detail&id=<?php echo $mobile['id']; ?>">
                  <img style="max-height: 120px;" src="../backend/assets/images/products/<?php echo $mobile['avatar']; ?>" alt="Li's Product Image">
                  </a>
                  <span class="sticker">New</span>
                </div>
                <div class="product_desc">
                  <div class="product_desc_info">
                    <h4><a class="product_name" href="index.php?controller=product&action=detail&id=<?php echo $mobile['id']; ?>"><?php echo $mobile['title'];  ?></a></h4>
                    <div class="price-box">
                      <span class="new-price font-weight-bold"><?php echo number_format($mobile['price'] , 0, '.', '.'); ?> vnđ</span>
                    </div>
                  </div>
                  <div class="add-actions">
                    <ul class="add-actions-link">
                      <li class="add-cart active add-to-cart"  data-id="<?php echo $product['id']; ?>" >Thêm vào giỏ</li>
                      <li onclick="displayModalProduct(<?php echo $mobile['id'] ?>)"><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <!-- single-product-wrap end -->
            </div>
            <?php endforeach ?>
          </div>
        </div>
      </div>
      <!-- Li's Section Area End Here -->
    </div>
  </div>
</section>
<!-- Li's TV & Audio Product Area End Here -->
<!-- Begin Li's Static Home Area -->
<!-- Begin Li's Trending Product Area -->
<section class="product-area li-trending-product pt-60 pb-45">
  <div class="container">
    <div class="row">
      <!-- Begin Li's Tab Menu Area -->
      <div class="col-lg-12">
        <div class="li-product-tab li-trending-product-tab">
          <h2>
            <span>Ti Vi</span>
          </h2>
        </div>
        <!-- Begin Li's Tab Menu Content Area -->
        <div class="tab-content li-tab-content li-trending-product-content">
          <div id="home1" class="tab-pane show fade in active">
            <div class="row">
              <div class="product-active owl-carousel text-center">
                <?php foreach ($tele as $tele) : ?>
                <div class="col-lg-12">
                  <!-- single-product-wrap start -->
                  <div class="single-product-wrap">
                    <div class="product-image">
                      <a href="index.php?controller=product&action=detail&id=<?php echo $tele['id']; ?>">
                      <img style="max-height: 150px;" src="../backend/assets/images/products/<?php echo $tele['avatar']; ?>" alt="Li's Product Image">
                      </a>
                      <span class="sticker">New</span>
                    </div>
                    <div class="product_desc">
                      <div class="product_desc_info">
                        <h4><a class="product_name" href="index.php?controller=product&action=detail&id=<?php echo $tele['id']; ?>"><?php echo $tele['title']; ?></a></h4>
                        <div class="price-box">
                          <span class="new-price font-weight-bold"><?php echo number_format($tele['price'] , 0, '.', '.'); ?> vnđ</span>
                        </div>
                      </div>
                      <div class="add-actions">
                        <ul class="add-actions-link">
                          <li class="add-cart active add-to-cart"  data-id="<?php echo $product['id']; ?>" >Thêm vào giỏ</li>
                          <li onclick="displayModalProduct(<?php echo $tele['id'] ?>)"><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <!-- single-product-wrap end -->
                </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
        <!-- Tab Menu Content Area End Here -->
      </div>
      <!-- Tab Menu Area End Here -->
    </div>
  </div>
</section>
<!-- Li's Trending Product Area End Here -->
<!-- Begin Li's Trendding Products Area -->
<section class="product-area li-laptop-product li-trendding-products best-sellers pt-60 pb-100">
  <div class="container">
    <div class="row">
      <!-- Begin Li's Section Area -->
      <div class="col-lg-12">
        <div class="li-section-title">
          <h2>
            <span>Phụ Kiện</span>
          </h2>
        </div>
        <div class="row">
          <div class="product-active owl-carousel text-center">
            <?php foreach ($accessory as $accessory) : ?>
            <div class="col-lg-12">
              <!-- single-product-wrap start -->
              <div class="single-product-wrap">
                <div class="product-image">
                  <a href="index.php?controller=product&action=detail&id=<?php echo $accessory['id']; ?>">
                  <img style="max-height: 150px;" src="../backend/assets/images/products/<?php echo $accessory['avatar']; ?>" alt="Li's Product Image">
                  </a>
                  <span class="sticker">New</span>
                </div>
                <div class="product_desc">
                  <div class="product_desc_info">
                    <h4><a class="product_name" href="index.php?controller=product&action=detail&id=<?php echo $accessory['id']; ?>"><?php echo $accessory['title']; ?></a></h4>
                    <div class="price-box">
                      <span class="new-price font-weight-bold"><?php echo number_format($accessory['price'] , 0, '.', '.'); ?> vnđ</span>
                    </div>
                  </div>
                  <div class="add-actions">
                    <ul class="add-actions-link">
                      <li class="add-cart active add-to-cart"  data-id="<?php echo $product['id']; ?>" >Thêm vào giỏ</li>
                      <li onclick="displayModalProduct(<?php echo $accessory['id']?>)"><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <!-- single-product-wrap end -->
            </div>
            <?php endforeach ?>
          </div>
        </div>
      </div>
      <!-- Li's Section Area End Here -->
    </div>
  </div>
</section>
<!-- Li's Trendding Products Area End Here -->
<script>
  function displayModalProduct(id) {
      $.ajax({
          method: 'POST',
          url: 'http://localhost:8080/project-ITPlus/fontend/index.php?controller=home&action=showProductDetail',
          data: {
              id: id
          },
          success: function (data) {
              // console.log(data);
              data = JSON.parse( data );
              product = data[0].product_detail;
              image = data[0].image;
  
              for (const entry of image) {
                url = entry['url'];
                $('.img').attr('src', '../backend/assets/images/products/img_detail/' + url);
              }
              
              
  
              $('.modal-product-name').text(product.title);
              $('.product-desc').text(product.summary);
              $('.new-price-2').text(new Intl.NumberFormat().format(product.price));
  
              $('.modal-img').attr('src', '../backend/assets/images/products/' + product.avatar);
                       
                  
          }
      });
  }
</script>