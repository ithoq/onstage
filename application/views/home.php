<?php
include "partials/head.php";
$navstyle='border-top:1px solid #eebb55';
?>
<title>Konzerte und Events <?=$city ?> </title>
<meta name="google-site-verification" content="EIORFejEODhxxGlm1VdtJN3e-HRvTWbDMreJAjjlzy4" />
</head>
<body>
<div id="section-topbar">
    <div id="topbar-inner">

        <div class="container">
            <div class="sixteen columns">
                <div class="dropdown">
                    <ul id="nav" class="nav">
                        <li class="menu-item" <?=($city=='Berlin')?'style="'.$navstyle.'"':''; ?>><a href="<?=base_url() ?>">ONSTAGEKONZERTE Berlin</a></li>
                        <li class="menu-item" <?=($city=='Hamburg')?'style="'.$navstyle.'"':''; ?>><a href="<?=base_url() ?>hamburg/">Hamburg</a></li>
                        <li class="menu-item" <?=($city=='Münich')?'style="'.$navstyle.'"':''; ?>><a href="<?=base_url() ?>munich/">München</a></li>
                        <li class="menu-item" <?=($city=='Köln')?'style="'.$navstyle.'"':''; ?>><a href="<?=base_url() ?>koln/">Köln</a></li>
                        <li class="menu-item" <?=($city=='Dresden')?'style="'.$navstyle.'"':''; ?>><a href="<?=base_url() ?>dresden/">Dresden</a></li>

                    </ul><!-- // uL#nav -->
                </div><!-- // .dropdown -->
            </div>
        </div>
    </div>
</div>
<div id="section-info" style="margin-left:30px;margin-top: 40px;background: white">
<?= $list ?>


</div>
<div id="section-footer">
    <a href="/home/impressum">Impressum</a>
</div>
</body>
</html>