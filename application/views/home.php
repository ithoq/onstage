<?php include "partials/head.php"; ?>
</head>
<body>
<div id="section-topbar">
    <div id="topbar-inner">

        <div class="container">
            <div class="sixteen columns">
                <div class="dropdown">
                    <ul id="nav" class="nav">
                        <li class="menu-item"><a href="<?=base_url() ?>">Berlin</a></li>
                        <li class="menu-item"><a href="<?=base_url() ?>hamburg/">Hamburg</a></li>
                        <li class="menu-item"><a href="<?=base_url() ?>munich/">München</a></li>

                    </ul><!-- // uL#nav -->
                </div><!-- // .dropdown -->
            </div>
        </div>
    </div>
</div>
<div id="section-info" style="margin-left:30px;margin-top: 40px;background: white">
<?= $list ?>
</div>
</body>
</html>