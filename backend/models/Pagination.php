<?php 
class Pagination {
  public $params = [
    'total' => 0,
    'limit' => 0,
    'controller' => '',
    'action' => '',
    'full_mode' => FALSE
  ];

  public function __construct($params) {
    $this->params = $params;
  }
  public function getTotalPage() {
    $total = $this->params['total'] / $this->params['limit'];
    $total = ceil($total);
    return $total;
  }

  public function getCurrentPage() {
    $page = 1;
    if (isset($_GET['page']) && is_numeric($_GET['page'])) {
      $page = $_GET['page'];
      $total_page = $this->getTotalPage();
      if ($page >= $total_page) {
        $page = $total_page;
      }
    }
    return $page;
  }

  public function getPrevPage() {
    $prev_link = '';
    $page_current = $this->getCurrentPage();

    if ($page_current > 1) {
      $controller = $this->params['controller'];
      $action = $this->params['action'];
      $url_prev = "index.php?controller=$controller&action=$action&page=".($page_current - 1);
      $prev_link .= "<li>";
      $prev_link .= "<a class='page-link' href='$url_prev'>Prev</a>";
      $prev_link .= "</li>";
    }
    return $prev_link;
  }

  public function getNextPage() {
    $next_link = '';
    $page_current = $this->getCurrentPage();
    $total_page = $this->getTotalPage();
    if ($page_current < $total_page) {
      $controller = $this->params['controller'];
      $action = $this->params['action'];
      $url_next = "index.php?controller=$controller&action=$action&page=".($page_current + 1);
      $next_link .= "<li>";
      $next_link .= "<a class='page-link' href='$url_next'>Next</a>";
      $next_link .= "</li>";
    }
    return $next_link;
  }

  public function getPagination() {
    $data = '';
    $total_page = $this->getTotalPage();
    if ($total_page == 1) {
      return $data;
    }

    $data .= "<ul class='pagination mb-5'>";
    $prev_page = $this->getPrevPage();
    $data .= $prev_page;

    $full_mode = $this->params['full_mode'];
    if ($full_mode) {
      for ($page = 1; $page <= $total_page; $page++) {
        $page_current = $this->getCurrentPage();
        if ($page_current == $page) {
          $data .= "<li class='page-item active'>";
          $data .= "<a class='page-link' href='#'>$page</a>";
          $data .= "</li>";
        } else {
          $controller = $this->params['controller'];
          $action = $this->params['action'];
          $url_page = "index.php?controller=$controller&action=$action&page=$page";
          $data .= "<li class='page-item'>";
          $data .= "<a class='page-link' href='$url_page'>$page</a>";
          $data .= "</li>";
        }
      }
    } else {
      $controller = $this->params['controller'];
      $action = $this->params['action'];
      $total = $this->params['total'];
      for ($page = 1; $page <= $total; $page++) {
        $page_current = $this->getCurrentPage();
        if ($page == $page_current) {
          $data .= "<li class='page-item active'>";
          $data .= "<a class='page-link' href='#'>$page </a>";
          $data .= "</li>";
        }

         elseif ($page == 1 || $page == $total_page || $page == $page_current - 1 || $page == $page_current +1) {
          $url_page = "index.php?controller=$controller&action=$action&page=$page";
          $data .= "<li class='page-item'>";
          $data .= "<a class='page-link' href='$url_page'>$page</a>";
          $data .= "</li>";
        }
        elseif ($page == 2 || $page == 3 || $page == $total_page - 1 || $page == $total_page - 2) {
          $data .= "<li class='page-item'>";
          $data .= "<a class='page-link' href='#'>...</a>";
          $data .= "</li>";
        }
      }
    }
    $next_page = $this->getNextPage();
    $data .= $next_page;
    $data .= "</ul>";
    return $data;
  }
}

?> 