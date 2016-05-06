<?php
/* Realiza a inclusão da Classe */
require '_app\Helpers\Crawler.class.php';

/* Função que realiza os testes com os agentes abaixo identificados */
function is_bot() {
	
	/* Array alimentado com os principais Bots/Crawlers, porém o ultimo item é o seu navegador */
    $Browsers = ['Baiduspider+(+http://www.baidu.com/search/spider.htm)',
        'Mozilla/5.0+(compatible; UptimeRobot/2.0; http://www.uptimerobot.com/)',
        'Mozilla/5.0 (Windows NT 6.1; rv:6.0) Gecko/20110814 Firefox/6.0 Google (+https://developers.google.com/+/web/snippet/)',
        'Mozilla/5.0 (compatible; Baiduspider/2.0; +http://www.baidu.com/search/spider.html)',
        'Moreoverbot/5.1 (+http://w.moreover.com; webmaster@moreover.com) Mozilla/5.0',
        'UnwindFetchor/1.0 (+http://www.gnip.com/)',
        'PostRank/2.0 (postrank.com)',
        'R6_FeedFetcher(www.radian6.com/crawler)',
        'R6_CommentReader(www.radian6.com/crawler)',
        'radian6_default_(www.radian6.com/crawler)',
        'Mozilla/5.0 (compatible; Ezooms/1.0; ezooms.bot@gmail.com)',
        'ia_archiver (+http://www.alexa.com/site/help/webmasters; crawler@alexa.com)',
        'Mozilla/5.0 (compatible; Yahoo! Slurp; http://help.yahoo.com/help/us/ysearch/slurp)',
        'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)',
        'Mozilla/5.0 (en-us) AppleWebKit/525.13 (KHTML, like Gecko; Google Web Preview) Version/3.1 Safari/525.13',
        'Mozilla/5.0 (compatible; YandexBot/3.0; +http://yandex.com/bots)',
        'Mozilla/5.0 (compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm)',
        'Twitterbot/0.1',
        'LinkedInBot/1.0 (compatible; Mozilla/5.0; Jakarta Commons-HttpClient/3.1 +http://www.linkedin.com)',
        'bitlybot',
        'MetaURI API/2.0 +metauri.com',
        'Mozilla/5.0 (compatible; Birubot/1.0) Gecko/2009032608 Firefox/3.0.8',
        'Mozilla/5.0 (compatible; PrintfulBot/1.0; +http://printful.com/bot.html)',
        'Mozilla/5.0 (compatible; PaperLiBot/2.1)',
        'Summify (Summify/1.0.1; +http://summify.com)',
        'Mozilla/5.0 (compatible; TweetedTimes Bot/1.0; +http://tweetedtimes.com)',
        'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)',
        'AppEngine-Google; (+http://code.google.com/appengine; appid: lookingglass-server)',
        'Mozilla/5.0 (compatible; redditbot/1.0; +http://www.reddit.com/feedback)',
        'Mozilla/5.0 (compatible; MSIE 6.0b; Windows NT 5.0) Gecko/2009011913 Firefox/3.0.6 TweetmemeBot',
        'Mozilla/5.0 (compatible; discobot/1.1; +http://discoveryengine.com/discobot.html)',
        'Mozilla/5.0 (compatible; Exabot/3.0; +http://www.exabot.com/go/robot)',
        'Mozilla/5.0 (compatible; SiteBot/0.1; +http://www.sitebot.org/robot/)',
        'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1 + FairShare-http://fairshare.cc)',
        'Mozilla/5.0 (compatible; Embedly/0.2; +http://support.embed.ly/)',
        'magpie-crawler/1.1 (U; Linux amd64; en-GB; +http://www.brandwatch.net)',
        'Sogou web spider/4.0(+http://www.sogou.com/docs/help/webmasters.htm#07)',
        'Googlebot/2.1 (http://www.googlebot.com/bot.html)',
        'msnbot-NewsBlogs/2.0b (+http://search.msn.com/msnbot.htm)',
        'msnbot/2.0b (+http://search.msn.com/msnbot.htm)',
        'msnbot-media/1.1 (+http://search.msn.com/msnbot.htm)',
        'Mozilla/5.0 (compatible; oBot/2.3.1; +http://www-935.ibm.com/services/us/index.wss/detail/iss/a1029077?cntxt=a1027244)',
        'Sosospider+(+http://help.soso.com/webspider.htm)',
        'COMODOspider/Nutch-1.0',
        'trunk.ly spider contact@trunk.ly',
        'Mozilla/5.0 (compatible; Purebot/1.1; +http://www.puritysearch.net/)',
        'Mozilla/5.0 (compatible; MJ12bot/v1.4.0; http://www.majestic12.co.uk/bot.php?+)',
        'knowaboutBot 0.01',
        'Showyoubot (http://showyou.com/support)',
        'Flamingo_SearchEngine (+http://www.flamingosearch.com/bot)',
        'MLBot (www.metadatalabs.com/mlbot)',
        'my-robot/0.1',
        'Mozilla/5.0 (compatible; woriobot support [at] worio [dot] com +http://worio.com)',
        'Mozilla/5.0 (compatible; YoudaoBot/1.0; http://www.youdao.com/help/webmaster/spider/; )',
        'Mozilla/5.0 (TweetBeagle; http://app.tweetbeagle.com/)',
        'OctoBot/2.1 (OctoBot/2.1.0; +http://www.octofinder.com/octobot.html?2.1)',
        'Mozilla/5.0 (compatible; FriendFeedBot/0.1; +Http://friendfeed.com/about/bot)',
        'Mozilla/5.0 (compatible; WASALive Bot ; http://blog.wasalive.com/wasalive-bots/)',
        'Mozilla/5.0 (compatible; Apercite; +http://www.apercite.fr/robot/index.html)',
        'urlfan-bot/1.0; +http://www.urlfan.com/site/bot/350.html',
        'SeznamBot/3.0 (+http://fulltext.sblog.cz/)',
        'Yeti/1.0 (NHN Corp.; http://help.naver.com/robots/)',
        'Mozilla/5.0 (Windows; U; Windows NT 6.0; en-GB; rv:1.0; trendictionbot0.4.2; trendiction media ssppiiddeerr; http://www.trendiction.com/bot/; please let us know of any problems; ssppiiddeerr at trendiction.com) Gecko/20071127 Firefox/2.0.0.11',
        'yacybot (freeworld/global; amd64 Linux 2.6.35-24-generic; java 1.6.0_20; Asia/en) http://yacy.net/bot.html',
        'Mozilla/5.0 (compatible; suggybot v0.01a, http://blog.suggy.com/was-ist-suggy/suggy-webcrawler/)',
        'ssearch_bot (sSearch Crawler; http://www.semantissimo.de)',
        'Mozilla/5.0 (compatible; Linux; Socialradarbot/2.0; en-US; crawler@infegy.com)',
        'wikiwix-bot-3.0',
        'Mozilla/5.0 (compatible; AhrefsBot/1.0; +http://ahrefs.com/robot/)',
        'Mozilla/5.0 (compatible; DotBot/1.1; http://www.dotnetdotcom.org/, crawler@dotnetdotcom.org)',
        'GarlikCrawler/1.1 (http://garlik.com/, crawler@garik.com)',
        'Mozilla/5.0 (compatible; SISTRIX Crawler; http://crawler.sistrix.net/)',
        'Mozilla/5.0 (compatible; 008/0.83; http://www.80legs.com/webcrawler.html) Gecko/2008032620',
        'PostPost/1.0 (+http://postpo.st/crawlers)',
        'Aghaven/Nutch-1.2 (www.aghaven.com)',
        'SBIder/Nutch-1.0-dev (http://www.sitesell.com/sbider.html)',
        'Mozilla/5.0 (compatible; ScoutJet; +http://www.scoutjet.com/)',
        'Soup/2011-05-11Z11-51-38&#8211;soup&#8211;production-2-g251c1f9d/251c1f9d6cdff8491e0b49f4ba3288ec7f3de903 (http://soup.io/)',
        'kame-rt (support@backtype.com)',
        'Mozilla/5.0 (compatible; Topix.net; http://www.topix.net/topix/newsfeeds)',
        'Megite2.0 (http://www.megite.com)',
        'SkyGrid/1.0 (+http://skygrid.com/partners)',
        'Netvibes (http://www.netvibes.com)',
        'Zemanta Aggregator/0.7 +http://www.zemanta.com',
        'Owlin.com/1.3 (http://owlin.com/)',
        'Mozilla/5.0 (compatible; Twitturls; +http://twitturls.com)',
        'Tumblr/1.0 RSS syndication (+http://www.tumblr.com/) (support@tumblr.com)',
        'Mozilla/4.0 (compatible; www.euro-directory.com; urlchecker1.0)',
        'Covario-IDS/1.0 (Covario; http://www.covario.com/ids; support at covario dot com)',
		$_SERVER['HTTP_USER_AGENT']];
		
	/* Faz o looping de teste com os agentes informado no Array */
    foreach ($Browsers as $Browser) {
        $Crawler = new _app\Helpers\Crawler;
        if($Crawler->CrawlerDetect($Browser)){
			/* Caso seja detectado como Bot/Crawler executa à ação abaixo */
            echo '<p style="color:red;">Este acesso foi realizado por um Bot/Crawler</p>';
        }else{
			/* Caso seja detectado como um Visitante executa à ação abaixo */
            echo '<p style="color:green;font-weight:bold;">Este acesso foi realizado por um Visitante</p>';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
		<title>Jônatas Fenske - Crawler - Debugando Acessos</title>
	</head>
	<body>
		<div style="box-sizing:border-box;width:80%;margin:1% 10%;border-radius:10px;background-color:#F5F5F5;-moz-column-count: 3;-webkit-column-count: 3;-moz-column-width: 30%;-webkit-column-width: 30%;-moz-column-gap: 50px;-webkit-column-gap: 50px;text-align:center;padding:40px;">
			<?php
			/* Chama a função que realiza os testes e recebe o retorno */
			is_bot();
			?>
		</div>
	</body>
</html>
