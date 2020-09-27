<?php require_once('../../../private/initialize.php'); ?>


<?php $page_title = 'Pages'; ?>
<?php $pages = [
  ['id' => '1', 'position' => '1', 'visible' => '1', 'menu_name' => 'News'],
  ['id' => '2', 'position' => '2', 'visible' => '1', 'menu_name' => 'About'],
  ['id' => '3', 'position' => '3', 'visible' => '1', 'menu_name' => 'Join us'],
]; ?>


<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <div class="subjects listing">

  <h1>Pages </h1>

  <table class="list">
  <tr>
    <th>ID</th>
    <th>Position</th>
    <th>Visible</th>
    <th>Name</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
  </tr>


  </table>

  </div>


</div>


<?php include(SHARED_PATH . '/staff_footer.php'); ?>