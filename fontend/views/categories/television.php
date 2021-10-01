<div class="content-wraper pb-60">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <!-- shop-top-bar start -->
        <div class="shop-top-bar mt-30">
          <div class="shop-bar-inner">
            <div class="product-view-mode">
              <!-- shop-item-filter-list start -->
              <ul class="nav shop-item-filter-list" role="tablist">
                <li class="active" role="presentation"><a aria-selected="true" class="active show" data-toggle="tab" role="tab" aria-controls="grid-view" href="#grid-view"><i class="fa fa-th"></i></a></li>
                <li role="presentation"><a data-toggle="tab" role="tab" aria-controls="list-view" href="#list-view"><i class="fa fa-th-list"></i></a></li>
              </ul>
              <!-- shop-item-filter-list end -->
            </div>
          </div>
        </div>
        <!-- shop-top-bar end -->
        <!-- shop-products-wrapper start -->
        <div class="shop-products-wrapper">
          <div class="tab-content">
            <div id="grid-view" class="tab-pane fade active show" role="tabpanel">
              <div class="product-area shop-product-area">
                <div class="row">
                  <?php foreach ($televisions as $product) : ?>
                  <div class="col-lg-4 col-md-4 col-sm-6 mt-40 pb-50">
                    <!-- single-product-wrap start -->
                    <div class="single-product-wrap">
                      <div class="product-image">
                        <a href="index.php?controller=product&action=detail&id=<?php echo $product['id']; ?>">
                        <img style="max-height: 250px;" src="../backend/assets/images/products/<?php echo $product['avatar']; ?>" alt="Li's Product Image">
                        </a>
                        <span class="sticker">New</span>
                      </div>
                      <div class="product_desc text-center">
                        <div class="product_desc_info">
                          <h4><a class="product_name" href="index.php?controller=product&action=detail&id=<?php echo $product['id']; ?>"><?php echo $product['title'] ?></a></h4>
                          <div class="price-box">
                            <span class="new-price font-weight-bold"><?php echo number_format($product['price'] , 0, '.', '.'); ?> vnđ</span>
                          </div>
                        </div>
                        <div class="add-actions">
                          <ul class="add-actions-link">
                            <li class="add-cart active add-to-cart w-75"  data-id="<?php echo $product['id']; ?>" >Thêm vào giỏ</li>
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
            <div id="list-view" class="tab-pane product-list-view fade" role="tabpanel">
              <div class="row">
                <div class="col">
                  <?php foreach ($televisions as $product) : ?>
                  <div class="row product-layout-list">
                    <div class="col-lg-3 col-md-5 ">
                      <div class="product-image">
                        <a href="index.php?controller=product&action=detail&id=<?php echo $product['id']; ?>">
                        <img src="../backend/assets/images/products/<?php echo $product['avatar'] ?>" alt="Li's Product Image">
                        </a>
                        <span class="sticker">New</span>
                      </div>
                    </div>
                    <div class="col-lg-5 col-md-7">
                      <div class="product_desc">
                        <div class="product_desc_info">
                          <h4><a class="product_name" href="index.php?controller=product&action=detail&id=<?php echo $product['id']; ?>"><?php echo $product['title'] ?></a></h4>
                          <div class="price-box pb-5">
                            <span style="font-size: 20px; color: black;" class="new-price font-weight-bold"><?php echo number_format($product['price'], 0, '', '.'); ?> VNĐ</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="shop-add-action mb-xs-30">
                        <ul class="add-actions-link">
                          <li class="add-cart active add-to-cart text-center"  data-id="<?php echo $product['id']; ?>" >Thêm vào giỏ</li>
                          <li onclick="displayModalProduct(<?php echo $product['id'] ?>)" ><a class="quick-view" data-toggle="modal" data-target="#exampleModalCenter" href="#"><i class="fa fa-eye"></i>Quick view</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Content Wraper Area End Here -->
<!-- Begin Footer Area -->
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
              image1 = data[0].image[0];
              image2 = data[0].image[1];
              image3 = data[0].image[2];
              image4 = data[0].image[3];
              image5 = data[0].image[4];
  
              // console.log(data[0].image[3]);
              // console.log(data[0].product_detail);
  
              $('.modal-product-name').text(product.title);
              $('.product-desc').text(product.summary);
              $('.new-price-2').text(new Intl.NumberFormat().format(product.price));
  
              $('.modal-img').attr('src', '../backend/assets/images/products/' + product.avatar);
              $('.img1').attr('src', '../backend/assets/images/products/img_detail/' + image1.url);
              $('.img2').attr('src', '../backend/assets/images/products/img_detail/' + image2.url);
              $('.img3').attr('src', '../backend/assets/images/products/img_detail/' + image3.url);
              $('.img4').attr('src', '../backend/assets/images/products/img_detail/' + image4.url);
              $('.img5').attr('src', '../backend/assets/images/products/img_detail/' + image5.url);     
          }
      });
  }
</script>