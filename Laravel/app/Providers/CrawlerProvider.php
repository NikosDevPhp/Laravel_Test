<?php

namespace App\Providers;

use Spatie\Crawler\CrawlObserver;
use Psr\Http\Message\UriInterface;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\RequestException;
use App\Crawl;

class CrawlerProvider extends CrawlObserver
{

    /**
     * @param UriInterface $url
     * @param ResponseInterface $response
     * @param UriInterface|null $foundOnUrl
     */
    public function crawled(UriInterface $url,
                            ResponseInterface $response,
                            ?UriInterface $foundOnUrl = null
                            )
    {

        Crawl::create([
            'body' => $response->getBody(),
            'url' => $url->getHost() . $url->getPath(),
            'response_code' => $response->getStatusCode()
        ]);
//        dd($url, $foundOnUrl, $response);
//        $path = $url->getPath();
//        $doc = new \DOMDocument();
//        @$doc->loadHTML($response->getBody());
//        $title = $doc->getElementsByTagName("title")[0]->nodeValue;
//
//        $this->pages[] = [
//            'path'=>$path,
//            'title'=> $title
//        ];

//        dd($this->pages);
    }

    /**
     * @param UriInterface $url
     * @param RequestException $requestException
     * @param UriInterface|null $foundOnUrl
     */
    public function crawlFailed(UriInterface $url, RequestException $requestException, ?UriInterface $foundOnUrl = null)
    {
//        dd($requestException);
        echo 'failed';
    }

    public function finishedCrawling()
    {

    }
}
