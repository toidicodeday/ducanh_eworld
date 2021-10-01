<?php
if (empty($_SESSION['admin'])) header("location: index.php?controller=user&action=login");
?>
<?php include_once "header.php"; ?>
<?php echo $this->content; ?>
<?php include_once "footer.php"; ?>