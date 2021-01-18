<?php
$rewrite_end = ob_get_contents(); 
ob_end_clean(); 
echo replace_for_mod_rewrite($rewrite_end);
?>