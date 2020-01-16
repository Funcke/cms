<?php
echo "<div class=\"container-sm mt-3\"><div class=\"alert alert-danger\" role=\"alert\">
        <h4 class=\"alert-heading\">Error ".$params["code"]."</h4>occured with the following message:
        <hr>
        <p class=\"mb-0\">".$params["message"]."</p>
      </div></div>";
?>