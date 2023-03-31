<?php
$controller_name=$this->request->getParam('controller');
$action_name=$this->request->getParam('action');
// echo $controller_name;
// echo $con_name;
// exit();

?>

<nav class="navbar navbar-expand-lg navbar-light ">
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto">

          <li class=<?= $action_name=='home' ? 'bg-warning' : '' ?>>
            <a class="nav-link" href=<?= $this->Url->build(['controller' => 'blogs', 'action' => 'home']) ?>>Home</a>
          </li>

            <li class=<?= $action_name=='about' ? 'bg-warning' : '' ?>>
            <a class="nav-link" href=<?= $this->Url->build(['controller' => 'blogs', 'action' => 'about']) ?>>About</a>
          </li>
            <li class=<?= $action_name=='contact' ? 'bg-warning' : '' ?>>
            <a class="nav-link" href=<?= $this->Url->build(['controller' => 'blogs', 'action' => 'contact']) ?>>Contact</a>
          </li>
        </ul>
      </div>
    </nav>