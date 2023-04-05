<?php
$controller_name = $this->request->getParam('controller');
$action_name = $this->request->getParam('action');
// echo $controller_name;
// echo $con_name;
// exit();

?>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#">Logo</a>

  <!-- Links -->
  <ul class="navbar-nav">

      <?php foreach ($menus as $key => $menu): ?>
      <?php if (empty($menu->submenus)): ?>
          <li class="nav-item">
          <a class="nav-link" href="#"><?=$menu->name?></a>
        </li>

        <?php else: ?>

        <!-- Dropdown -->
        <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
  <?=$menu->name?>
  </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
      <?php foreach ($menu->submenus as $key => $submenu): ?>
        <li><a class="dropdown-item" href="#"><?= $submenu->name?></a></li>
        <?php endforeach;?>
      </ul>
  </div>
  <?php endif;?>
      <?php endforeach;?>


  </ul>
</nav>

<nav class="navbar navbar-expand-lg navbar-light ">
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto">

          <li class=<?=$action_name == 'home' ? 'bg-warning' : ''?>>
            <a class="nav-link" href=<?=$this->Url->build(['controller' => 'blogs', 'action' => 'home'])?>>Home</a>
          </li>

            <li class=<?=$action_name == 'about' ? 'bg-warning' : ''?>>
            <a class="nav-link" href=<?=$this->Url->build(['controller' => 'blogs', 'action' => 'about'])?>>About</a>
          </li>
            <li class=<?=$action_name == 'contact' ? 'bg-warning' : ''?>>
            <a class="nav-link" href=<?=$this->Url->build(['controller' => 'blogs', 'action' => 'contact'])?>>Contact</a>
          </li>
        </ul>
      </div>
    </nav>