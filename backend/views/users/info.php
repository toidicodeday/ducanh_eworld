<div class="col-md-3 col-sm-3  profile_left">
  <div class="profile_img">
    <div id="crop-avatar">
      <!-- Current avatar -->
      <?php 
        if ($_SESSION['admin']['avatar'] == null) {
          echo '<img src="assets/images/default_avatar.png" alt="">';
        } else {
          echo '<img height="200" src="assets/images/users/'.$_SESSION['admin']['avatar'].'" alt="">';
        }
      ?>
    </div>
    <br>
   <form action="" method="POST" enctype="multipart/form-data">
        <div class="image d-flex">
        <input class="btn btn-sm btn-outline-dark" name="avatar" type="file">
        <button name="submit" class="btn btn-sm btn-primary" type="submit">Upload</button>
        </div>
          
      </form>
  </div>
  <h3><?php echo $_SESSION['admin']['username']; ?></h3>

  <ul class="list-unstyled user_data">
    <li><i class="fa fa-map-marker user-profile-icon"></i>
    	<?php echo $_SESSION['admin']['address']; ?>
    </li>
    <li><i class="fa fa-map-marker user-profile-icon"></i>
    	<?php echo $_SESSION['admin']['first_name'] .' '. $_SESSION['admin']['last_name']; ?>
    </li>
    <li class="m-top-xs">
      <i class="fa fa-external-link user-profile-icon"></i>
      <a href="http://www.kimlabs.com/profile/" target="_blank">0<?php echo $_SESSION['admin']['phone']; ?></a>
    </li>
  </ul>
   <a href="index.php?controller=user&action=edit" class="btn btn-primary">Edit Profile</a>
</div>
