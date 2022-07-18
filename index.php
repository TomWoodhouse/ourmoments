<html>
    <?php

        phpinfo();

        session_start();
        ini_set('session.gc_maxlifetime', 3600);
        // each client should remember their session id for EXACTLY 1 hour
        session_set_cookie_params(3600);

        $CanAccess = false;
        if($_SESSION['CanAccess'] == "Yes")
        {
            $CanAccess = true;
        }

        // Header
        include(dirname(__FILE__).'/Shared/header.php');
    ?>

    <body>
        <div class="container mt-4">
            <div class="row">
                <div class="col-12 text-center">
                    <h1> Welcome to Our Moments! </h1>
                </div>
            </div>
            <?php
                if($CanAccess)
                {
                    include(dirname(__FILE__).'/Shared/yespassword.php');
                }
                else
                {
                    include(dirname(__FILE__).'/Shared/nopassword.html');
                }
            ?>
        </div>
    </body>

    <?php
    // Footer
    include(dirname(__FILE__).'/Shared/footer.html');
    ?>
</html>