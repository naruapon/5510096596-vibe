
<?php

setcookie('valid_user',0,time()-600);
setcookie('username',0,time()-600);
setcookie('myfcolor',0,time()-600);
setcookie('usize',0,time()-600);
echo "ออกจากระบบเรียบร้อย";
header("refresh:1;url=/5510096596/show.php");

?>