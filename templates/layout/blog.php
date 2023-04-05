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

    <title>Hello, world!</title>
  </head>

  <body>

    <?= $this->element('nav') ?>


    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">A simple Blog Layout</h1>
        <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
      </div>
    </div>

   <?= $this->fetch('content'); ?>

   <?= $this->element('footer') ?>

   <!-- loading js with block -->
   <?= $this->fetch('js'); ?>



  </body>
</html>
