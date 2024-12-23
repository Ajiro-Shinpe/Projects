<?php
print "cookies ";
// syntax to set cookie 
// setcookie("cookie name","cookie value", cookie expiry { time() + 86400 } , cookie domain like / | /poroducts "/");

setcookie("Category","Anime", time() + 86400 , "/");
echo "cookie is set";
?>