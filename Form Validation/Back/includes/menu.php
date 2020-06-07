<style>
  <?php
  include("includes/menu.css");
  ?>
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="menuContainer">
  <ul>
    <li><a href="index.php"><i class="fa fa-fw fa-home"></i> Acceuil</a></li>
    <li></i><a href="connection.php"><i class="fa fa-fw fa-search"></i> Connection</a></li>
    <li><a href="disconnect.php"><i class="fa fa-fw fa-envelope"></i> Deconnection</a></li>
    <li><a href="member_area.php"><i class="fa fa-fw fa-user"></i> Espace membre</a></li>
    <li><a href="editor.php"><i class="fa fa-etsy"></i> Editor</a></li>
    <li><a href="posts.php"><i class="fa fa-product-hunt"></i> Posts</a></li>
    <li class="optionsMenu hide" style="float:right;"><a href="#"><i class="fa fa-cog"></i></a>
      <div class="optionsList hide">
        <div style="padding: 10px; user-select: none;" class="custom-control custom-switch">
          <input type="checkbox" class="custom-control-input" id="cleanShow">
          <label class="custom-control-label" for="cleanShow">Clean Show</label>
        </div>
        <div style="padding: 10px; user-select: none;" class="custom-control custom-switch">
          <input type="checkbox" class="custom-control-input" id="showId">
          <label class="custom-control-label" for="showId">Show Id</label>
        </div>
        <div style="padding: 10px; user-select: none;" class="custom-control custom-switch">
          <input type="checkbox" class="custom-control-input" id="showDate">
          <label class="custom-control-label" for="showDate">Show Date</label>
        </div>
        <div style="padding: 10px; user-select: none;" class="custom-control custom-switch">
          <input type="checkbox" class="custom-control-input" id="showEdit">
          <label class="custom-control-label" for="showEdit">Show Edit</label>
        </div>
      </div>
    </li>
  </ul>

</div>