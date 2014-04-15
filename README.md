onstage
=======

onstage is a simple event importer and manager built with Codeigniter

Currently it has only 3 controllers:
home
eventos
import -> This one uses Spark library and Simplepie RSS to import last.fm events


On April 2014 Bonfire HMVC was added to have a new administration:
https://github.com/ci-bonfire/Bonfire

If you want to get links to your events local site you can do so posting the event in [onstagekonzerte.de](http://onstagekonzerte.de)
Just send me a twitter message or a github message and I will create you an user for the events administration panel.

This is an open project. Fell free to fork it, copy, modify it, use it for own city or for anything else that you have in mind.


Events mysql table
==================


CREATE TABLE IF NOT EXISTS `bf_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fmid` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `etitle` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `ecity` int(3) NOT NULL,
  `edescription` mediumtext COLLATE utf8_unicode_ci,
  `eimage` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `soundcloud` int(11) DEFAULT NULL,
  `imageback` varchar(48) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estartdate` date NOT NULL,
  `estarthour` time NOT NULL,
  `eenddate` date NOT NULL,
  `eendhour` time NOT NULL,
  `efmurl` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `elocation` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `eticketurl` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `fmid` (`fmid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=216 ;


-- Table `bf_events`


INSERT INTO `bf_events` (`id`, `fmid`, `etitle`, `ecity`, `edescription`, `eimage`, `soundcloud`, `imageback`, `estartdate`, `estarthour`, `eenddate`, `eendhour`, `efmurl`, `elocation`, `eticketurl`, `deleted`) VALUES
(1, '3640584', 'Wide Awake', 1, 'Liebe Urlauber,\r\n\r\nwieder begeben wir uns auf eine Reise ins Ungewisse WIDE AWAKE. Voller Abenteuer, mit Ecken und Kanten. Einöde Ade!\r\nDieses Mal werden wir uns den Gottheiten zuwenden. Wir werden auf ihren Spuren wandeln, zwischen zerklüfteten Felsen, WIldsträuchern und Moosen. Man nennt sie AUDIOJACK. Sie ruhen meist zwischen deep und housy. Eine Begegnung mit ihnen lässt die dumpfe Tristesse verblassen.\r\n\r\nEine Reise im Sinne von WIDE AWAKE birgt oft viele Gefahren. Augenringe, Schlappheit und Übermüdung. Bitte tretet aus diesen Gründen erholt die Reise an. Wir möchten niemanden in den Gebirgen zurücklassen. \r\n\r\nWir freuen uns auf Sie,\r\nIhr Butzke Reisebüro', NULL, NULL, NULL, '2013-07-27', '00:00:00', '2013-07-27', '23:59:59', 'http://www.last.fm/event/3640584', 'Ritter-Butzke', '', 0),
(2, '3655082', 'The Thermals at Bi Nuu', 1, '<h2>The Thermals are a post-pop-punk trio from Portland, Oregon.</h2>\n In ten years, the band has released six records and toured fifteen countries.  The Thermals are Hutch Harris (guitar and vocals), Kathy Foster (bass), and Westin Glass (drums).\n\n<object width="420" height="315"><param name="movie" value="//www.youtube.com/v/hPsdjlPVaJU?version=3&amp;hl=en_GB"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="//www.youtube.com/v/hPsdjlPVaJU?version=3&amp;hl=en_GB" type="application/x-shockwave-flash" width="420" height="315" allowscriptaccess="always" allowfullscreen="true"></embed></object>', '', NULL, 'darkgray', '2013-10-19', '00:00:00', '2013-10-19', '23:59:59', 'http://www.last.fm/event/3655082+The+Thermals+at+Bi+Nuu+on+19+October+2013', ' Bi Nuu', '', 0),
(3, '3650027', 'MORCHEEBA WITH SKYE  on 30 Oct 2013', 1, 'Morcheeba‘s Blood Like Lemonade is notable for a number reasons. For starters, it’s a funky, sexy, vibrant entry in the band’s discography. More importantly, though, the album marks the return of the fucking tremendous Skye Edwards.\n\nThe vocalist makes wastes no time making a big different, lending her distinctive, arresting tone and sensual, compelling enunciation to the album’s diverse selection of music. Hers is a voice that can raise an album from the ashes of normalcy into a beautiful, life-affirming haze of satisfaction.\n\nRead the entire review at: http://blogcritics.org/music-review-morcheeba-blood-like-lemonade/\n\nLocation: Columbia Club', 'http://www.flickr.com/photos/focka/', NULL, 'black', '2013-10-30', '20:00:00', '2013-10-30', '23:59:59', 'http://www.last.fm/event/3650027+MORCHEEBA+WITH+SKYE+', ' Columbia ', '', 0),
(4, '3649776', 'Steve Reid Foundation: FREE SPIRITS', 1, 'Location: Prince Charles\nPrinzenstraße 85f\n10969 Berlin\nGermany\n\n// A Sunday of independent, improvised &amp; spiritual music. \n\n// All Benefits will go to the Steve Reid Foundation to support music education and musicians in needs. \n\n<object width="560" height="315"><param name="movie" value="//www.youtube.com/v/c2AeFOOdML0?version=3&amp;hl=en_GB"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="//www.youtube.com/v/c2AeFOOdML0?version=3&amp;hl=en_GB" type="application/x-shockwave-flash" width="560" height="315" allowscriptaccess="always" allowfullscreen="true"></embed></object>\n****************\nLINE UP \n\nDjs \nGilles Peterson (Brownswood Recordings BBC 6 UK)\nFloating Points (Eglo Records UK)\nFour Tet (UK) \nClass Brieler (Jazzanova DE) \n\nLive \n[/artist]Fuasi Abdul-Khaliq[/artist] w/ The Horace Tapscott Memorial Ensemble\n\nMore to be announced. \n\n****************\n\n// Thanks for the support!\nChez Jacki \nDaniel Best @ Best Works \nRimshot Family', 'https://www.facebook.com/events/605501272814930/', NULL, 'black', '2013-10-13', '15:00:00', '2013-10-13', '23:59:59', 'http://www.last.fm/event/3649776+J.A.W.+x+Steve+Reid+Foundation:+FREE+SPIRITS', 'Prince Charles', '', 0);

