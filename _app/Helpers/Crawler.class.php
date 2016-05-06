<?php
namespace _app\Helpers;
/**
 * Crawler.class [ HELPER ]
 * Classe responável por verificar se o usuário online é um Bot/Crawler ou Visitante!
 * 
 * @copyright (c) 2016, Jônatas Fenske JONATAS FENSKE - TECNOLOGIA
 */
class Crawler {

    private $Crawler;

    /**
     * <b>Verifica USER_AGENT:</b> Executa verificação e determina se o usuário online é um Bot/Crawler ou um Visitante. Se for um Bot/Crawler ele retorna True e se for um Visitante ele retorna False.
     * @param STRING $USER_AGENT = Informe aqui o "$_SERVER['HTTP_USER_AGENT'];"
     * @return BOOL = True é um Bot/Crawler e False é um Visitante
     */
    public function CrawlerDetect($USER_AGENT) {
        $this->Crawler = ['Google' => 'Google',
            'MSN' => 'msnbot',
            'Rambler' => 'Rambler',
            'yahoo' => 'yahoo',
            'AbachoBOT' => 'AbachoBOT',
            'accoona' => 'Accoona',
            'AcoiRobot' => 'AcoiRobot',
            'ASPSeek' => 'ASPSeek',
            'CrocCrawler' => 'CrocCrawler',
            'Dumbot' => 'Dumbot',
            'FAST-WebCrawler' => 'FAST-WebCrawler',
            'GeonaBot' => 'GeonaBot',
            'Gigabot' => 'Gigabot',
            'Lycos spider' => 'Lycos',
            'MSRBOT' => 'MSRBOT',
            'Altavista robot' => 'Scooter',
            'AltaVista robot' => 'Altavista',
            'ID-Search Bot' => 'IDBot',
            'eStyle Bot' => 'eStyle',
            'Scrubby robot' => 'Scrubby',
            'Facebook' => 'facebookexternalhit',
            'UptimeRobot' => 'UptimeRobot',
            'bot' => 'bot',
            'ssppiiddeerr' => 'ssppiiddeerr',
            'spider' => 'spider',
            'crawler' => 'crawler',
            'urlchecker' => 'urlchecker',
            'covario' => 'covario',
            'tumblr' => 'tumblr',
            'twitturls' => 'twitturls',
            'owlin' => 'owlin',
            'zemanta' => 'zemanta',
            'skygrid' => 'skygrid',
            'megite' => 'megite',
            'topix' => 'topix',
            'backtype' => 'backtype',
            'google' => 'google',
            'soup' => 'soup',
            'scoutjet' => 'scoutjet',
            'sitesell' => 'sitesell',
            'aghaven' => 'aghaven',
            'summify' => 'summify',
            'postrank' => 'postrank',
            'gnip' => 'gnip',
            'metauri' => 'metauri',
            'tweetbeagle' => 'tweetbeagle',
            'fairshare' => 'fairshare',
            'embed.ly' => 'embed.ly',
            'netvibes' => 'netvibes',
            'UnwindFetchor' => 'UnwindFetchor'];

        if(is_array($this->Crawler)) {
            foreach ($this->Crawler as $Crawler) {
                if (strpos(strtolower($USER_AGENT), trim($Crawler)) !== false) {
                    return true;
                }
            }
        }
        return false;
    }

}
