<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

use PHPUnit\Framework\MockObject\Builder\Identity;

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?=$this->Html->charset()?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= $this->Html->meta('csrfToken', $this->request->getAttribute('csrfToken')); ?>
     <title>
    <title>
        <?=$cakeDescription?>:
        <?=$this->fetch('title')?>
    </title>
    <?=$this->Html->meta('icon')?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    <?= $this->Html->script("https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js") ?>

    <?=$this->Html->css(['normalize.min', 'milligram.min', 'cake'])?>
    <?=$this->fetch('meta')?>
    <?=$this->fetch('css')?>
    <?=$this->fetch('script')?>

</head>
<body>
    <nav class="top-nav">
        <div class="top-nav-title">
            <a href="<?=$this->Url->build('/')?>"><span>Cake</span>PHP</a>
        </div>
        <div class="top-nav-links">
            <a target="_blank" rel="noopener" href="https://book.cakephp.org/4/">Documentation</a>
            <a target="_blank" rel="noopener" href="https://api.cakephp.org/">API</a>

            <!-- plugin auth -->

        
            <?php if ($this->Identity->get('username')): ?>
                <?=$this->Html->link(('Log Out'), ['controller' => 'users', 'action' => 'logout'])?>
            <?php endif; ?>

            <!-- auth component -->
            <?php if($user) :?>
            <?= $this->Html->link(('Log Out'), ['controller'=>'users','action' => 'logout']) ?>
            <?php endif ; ?>

        </div>
    </nav>
    <main class="main">
        <div class="container">
            <?=$this->Flash->render()?>
            <?=$this->fetch('content')?>
        </div>
    </main>
    <footer>
    </footer>

</body>
</html>
