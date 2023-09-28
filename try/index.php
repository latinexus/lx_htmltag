<?php

require_once '../vendor/autoload.php'; // Carga el archivo autoload generado por Composer

use Latinexus\Html\HtmlTag;

$b = new HtmlTag();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>HtmlTag</title>
</head>
<body>
<?php
/**
 *      blk -> open tag and close tag
 */
echo $b->blk("Hola Mundo", ["href"=>"https://latinexus.net"], "a");

/**
 *      noBlk -> open tag autoclosed
 */
echo $b->noBlk([], "br");

/**
 *      noBlk inside of blk
 */
$inputField = $b->noBlk(["name"=>"data", "id"=>"firstData","value"=>"Welcome"], "input");
echo $b->blk($inputField, ["style"=>"padding: 10px; border: 1px #F00 solid;"]);

?>
</body>
</html>