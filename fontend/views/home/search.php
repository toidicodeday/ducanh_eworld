<div class="content-wraper pt-40 pb-60">
  <div class="container">
    <h3>Kết quả tìm kiếm: </h3>
    <div class="row">
      <div class="col-lg-12">
        <div class="shop-products-wrapper">
          <div class="tab-content">
            <div id="grid-view" class="tab-pane fade active show" role="tabpanel">
              <div class="product-area shop-product-area">
                <div class="row">
                  <?php foreach ($products as $product) : ?>
                  <div class="col-lg-4 col-md-4 col-sm-6 mt-40 pb-50">
                    <!-- single-product-wrap start -->
                    <div class="single-product-wrap">
                      <div class="product-image">
                        <a href="index.php?controller=product&action=detail&id=<?php echo $product['id']; ?>">
                        <img style="max-height: 200px;" src="../backend/assets/images/products/<?php echo $product['avatar']; ?>" alt="Li's Product Image">
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