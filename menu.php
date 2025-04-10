<nav id='menu'>
  <input type='checkbox' id='responsive-menu'><label></label>
  <ul>
    <li><a href='index1.php'><?=$strHome?></a></li>
    <?php if(isLevel(100)){ ?>
    <li><a><?=$strAdmin?></a>
      <ul class='sub-menus'>
        <li><a href='Profile.php'><?=$strUserAdmin?></a></li>
        <li><a href='bladmin.php'><?=$strBlogAdmin?></a></li>
      </ul>
    </li>
    <?php } ?>
    <?php if(isLevel(10)){ ?>
    <li><a href='Profile.php'><?=$strProfile?></a></li>
    <?php } ?>
    <li><a href='about.php'><?=$strAbout?></a></li>
  </ul>
</nav>