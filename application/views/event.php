<?php include "partials/head.php"; ?>

<meta name="description" content="<?=$metadescription ?>">
<script language="javascript">
    function addtocalendar() {
        redir ='http://www.google.com/calendar/gp';
        redir+='#~calendar:view=e&bm=1&action=TEMPLATE&text=<?=$title?>';

        redir+='&dates=<?=$calstart?>/<?=$calend?>';
        redir+='&location=<?=$location?>&trp=false';
        window.open(redir);
    }
</script>
</head>

<body data-spy="scroll" data-target="#section-topbar">

<!-- Topbar: fixed + datascroll

* the attribute data-scrollspy is for automatically updating nav targets based on scroll position
* scroll the area below the navbar and watch the active class change
================================================== -->
<div id="section-topbar">
    <div id="topbar-inner">

        <div class="container">
            <div class="sixteen columns">
                <div class="dropdown">
                    <ul id="nav" class="nav">
                        <li class="menu-item"><a href="<?=base_url() ?>">Home</a></li>
                        <li class="menu-item"><a href="#section-event">The event</a></li>
                        <li class="menu-item"><a href="#section-fees">Tickets</a></li>
                        <li class="menu-item"><a href="<?=base_url() ?>hamburg/">Hamburg</a></li>
                        <li class="menu-item"><a href="<?=base_url() ?>munich/">München</a></li>

                    </ul><!-- // uL#nav -->
                </div><!-- // .dropdown -->

                <div class="clear"></div>
            </div><!-- // .sixteen -->
        </div><!-- // .container -->

        <div class="clear"></div>
    </div><!-- // #topbar-inner -->
</div><!-- // #section-topbar -->



<!-- Event

* Event title & date, time, and location
================================================== -->
<div id="section-event" <?=$imagestyle ?> itemscope itemtype="http://data-vocabulary.org/Event">
    <div class="container">
        <div class="sixteen columns">
            <h1><a href="<?=base_url() ?><?php if ($city!='berlin') echo $city; ?>" title="Home"><img src="/public/img/<?=$city ?>.png" alt="ON STAGE" /></a></h1>

        </div><!-- // .sixteen -->

        <div class="clear"></div>
    </div><!-- // .container -->

    <div id="section-info">
        <div class="container">
            <div class="four columns">
                <h2>Event Details</h2>

            </div><!-- // .four -->

            <div class="four columns">
                <div id="box-date">
                    <h3>Date</h3>
                    <p><time itemprop="startDate" datetime="<?=$calstart ?>"><?=$startdate?> at <?=$starthour?></time></p>
                </div><!-- // #box-date -->
            </div><!-- // .four -->

            <div class="four columns">
                <div id="box-time">
                    <h3>Time</h3>
                    <p><?=$starthour?> ~ <?=$endhour?></p>
                </div><!-- // #box-time -->
            </div><!-- // .four -->

            <div class="four columns">
                <div id="box-location">
                    <h3>Location</h3>
                    <p><?=$location ?></p>
                </div><!-- // #box-location -->
            </div><!-- // .four -->

            <div class="clear"></div>
        </div><!-- // .container -->
    </div><!-- // #section-info -->
</div><!-- // #section-event -->

<div id="section-about">
    <div class="container">
        <div class="seven columns">
            <h2><?=$title?></h2>
            <p class="desc">
                <?=$description?>

                <?php if ($image!='') { ?>
                <img src="<?=$image ?>">
                <?php } ?>
                <br/><?=$source ?>
            </p>

        </div><!-- // .eight -->
        <div class="clear"></div>
    </div><!-- // .container -->
</div><!-- // #section-about -->


<div id="section-fees">
    <div class="container">
        <div class="sixteen columns">
            <h2>Tickets</h2>
            <p class="desc">Reserve your spot</p>
        </div><!-- // .sixteen -->

        <div class="clear"></div>

        <div class="eight columns">
            <div class="item">
                <?php if ($eticketurl!='') { ?>
                <a href="<?=$eticketurl ?>" rel="nofollow" class="button">Buy your Ticket</a>
                <?php } elseif ($city=='berlin') { ?>
                    <a href="http://www.koka36.de/"><img src="/public/img/koka.jpg"></a>
                <?php } ?>
                </div><!-- // .item -->
        </div><!-- // .eight -->

        <div class="eight columns">
            <div class="item">
                <span class="price"></span>
                <span class="date">Interested in this event ?<br /><span class="font-color-white">Add it to your schedule</span></span>
                <p>
                    <?=$title?>  <br /><br />
                    <a href="#" title="Purchase Tickets" class="button" onclick="addtocalendar()">Add to Calendar</a>
                </p>
                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <!-- onstage content -->
                <ins class="adsbygoogle"
                     style="display:inline-block;width:300px;height:250px"
                     data-ad-client="ca-pub-5919782356383484"
                     data-ad-slot="5946654852"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div><!-- // .item -->
        </div><!-- // .eight -->

        <div class="clear"></div>
    </div><!-- // .container -->
</div><!-- // #section-fees -->



<!-- Map
================================================== -->
<div id="section-map">

    <div class="container">
        <div class="sixteen columns">
            <div id="box-map">
                <h2>Map</h2>
            </div><!-- // .box-map -->
        </div><!-- // .sixteen -->

        <div class="clear"></div>
    </div><!-- // .container -->

    <div id="map-wrap">
        <iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=de&amp;q=<?=$location ?>&amp;aq=0&amp;oq=<?=$location ?>&amp;ie=UTF8&amp;hq=<?=$location ?>&amp;hnear=&amp;radius=15000&amp;t=m&amp;z=18&amp;output=embed"></iframe>
    </div><!-- // #map-wrap -->
</div><!-- // #section-map -->






<!-- Sponsors
================================================== -->
<div id="section-sponsors">
    <div class="container">
        <div class="four columns">
            <h2>Sponsors</h2>
        </div><!-- // .four -->

        <div class="three columns">
            <a href="http://www.zanox-affiliate.de/ppc/?26974097C1272140115T"><img src="http://www.zanox-affiliate.de/ppv/?26974097C1272140115" align="bottom" width="150" height="65" border="0" hspace="1" alt="EintrittsKarten"></a>
        </div><!-- // .three -->

        <div class="three columns">
            <a href="http://ad.zanox.com/ppc/?27018999C2142838469T"><img src="http://ad.zanox.com/ppv/?27018999C2142838469" align="bottom" width="234" height="60" border="0" hspace="1" alt="Tickets mit Garantie!"></a>
        </div><!-- // .three -->

        <div class="three columns">
        </div><!-- // .three -->

        <div class="three columns">
        </div><!-- // .three -->

        <div class="clear"></div>
    </div><!-- // .container -->
</div><!-- // #section-sponsors -->



<!-- Footer
================================================== -->
<div id="section-footer">
    <div class="container">
        <div class="eight columns">
            <p id="copytext">Copyright &copy; <a href="http://www.fasani.de" title="">ON STAGE</a> KONZERTE</p>
        </div><!-- // .eight -->

        <div class="eight columns">
            <ul id="social">
                <li><a href="http://www.twitter.com/martinfasani" title=""><img src="/public/img/icons/icon_twitter.png" alt="Twitter" /></a></li>
        <!--        <li><a href="http://www.facebook.com" title=""><img src="/publi/img/icons/icon_facebook.png" alt="Facebook" /></a></li>

                <li><a href="http://www.youtube.com" title=""><img src="../img/icons/icon_youtube.png" alt="Youtube" /></a></li>
         -->   </ul><!-- // ul#social -->
        </div><!-- // .eight -->

        <div class="clear"></div>
    </div><!-- // .container -->
</div><!-- // #section-footer -->




<!-- End Document
================================================== -->
</body>
</html>
