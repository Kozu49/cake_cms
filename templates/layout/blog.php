<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <!-- loading js -->
    <?= $this->Html->script("https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js",['block'=>'js']) ?>

      <style> 
      .active a{
        color: #000;
      }

      </style>

    <title>Hello, world!</title>
  </head>

  <body>

    <?= $this->element('nav') ?>


    <div class="jumbotron jumbotron-fluid">
      <div class="container p-3 mb-2 bg-dark text-white">
        <h1 class="display-4">A simple Blog Layout</h1>
        <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
      </div>
    </div>

  <?php
  $this->Breadcrumbs->setTemplates([
    'wrapper' => '<nav aria-label="breadcrumb"><ol class="breadcrumb p-3 mb-2 bg-info text-white" {{attrs}}>{{content}}</ol></nav>',
    'item' => '<li {{attrs}}>{{icon}}<a href="{{url}}"{{innerAttrs}}>{{title}}</a></li>{{separator}}'

]);
      echo $this->Breadcrumbs->render();
  ?>
<!-- <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Library</a></li>
    <li class="breadcrumb-item active" aria-current="page">Data</li>
  </ol>
</nav> -->

   <?= $this->fetch('content'); ?>

   <?= $this->element('footer') ?>

   <!-- loading js with block -->
   <?= $this->fetch('js'); ?>



  </body>
</html>
