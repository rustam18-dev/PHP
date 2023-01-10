<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/App/template/header.php');
?>
<?php
echo helperDate\getDateAgo(1, 'long');
?>
<br>
<?php

require_once ($_SERVER['DOCUMENT_ROOT'].'/App/template/footer.php')

?>