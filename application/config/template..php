<?php
$template['default']['regions'] = array(
  'header',
  'title',
  'content',
  'sidebar',
  'footer',
);

$template['default']['regions']['header'] = array('content' => array('<h1>CI Rocks!</h1>'));
$template['default']['regions']['footer'] = array('content' => array('<p id="copyright">© Our Company Inc.</p>'));
?>

<html>
   <head>
      <title><?= $title ?></title>
      <link rel="stylesheet" type="text/css" href="main.css" />
   </head>
   <body>
      <div id="wrapper">
         <div id="header">
            <?= $header ?>
         </div>
         <div id="main">
            <div id="content">
               <h2><?= $title ?></h2>
               <div class="post">
                  <?= $content ?>
               </div>
            </div>
            <div id="sidebar">
               <?= $sidebar ?>
            </div>
         </div>
         <div id="footer">
            <?= $footer ?>
         </div>
      </div>
   </body>
</html>