<?php require_once 'views/layouts/header.php'; ?>
<?php if (isset($_SESSION['error'])): ?>
<div class="alert alert-danger">
  <?php
    echo $_SESSION['error'];
    unset($_SESSION['error']);
    ?>
</div>
<?php endif; ?>
<?php if (isset($_SESSION['success'])): ?>
<div class="container">
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <?php
      echo $_SESSION['success'];
      unset($_SESSION['success']);
      ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
  </div>
</div>
<?php endif; ?>
<?php if (!empty($this->error)): ?>
<div class="container">
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <?php
      echo $this->error;
      ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
  </div>
</div>
<?php endif; ?>
<?php echo $this->content;?>
<?php require_once 'views/layouts/footer.php'; ?>