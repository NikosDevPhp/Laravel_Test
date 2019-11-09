<?php

namespace App\Http\Controllers;

use App\Post;
use GuzzleHttp\Promise;
use Illuminate\Http\Request;
use Spatie\Crawler\Crawler;
use App\Providers\CrawlerProvider;
use Spatie\Browsershot\Browsershot;
use App\Crawl;
use GuzzleHttp\Psr7\Response;

class PostsController extends Controller
{
    public function index()
    {
        $st = microtime(true);
//        Crawler::create()
////            ->setBrowsershot(new Browsershot('https://leonice.gr/'))
////            ->executeJavaScript()
//            ->ignoreRobots()
//            ->setDelayBetweenRequests(2)
//            ->setCrawlObserver(new CrawlerProvider)
//            ->startCrawling('https://hsreplay.net/');
//        $client = new \GuzzleHttp\Client();
//
//        $promises = (function () use ($client) {
//            for($i=0; $i<19;$i++) {
//                $x = random_int(15,123143);
//                yield $client->requestAsync('GET', "https://www.in.gr?a=$x");
//            }
//        })();
//
//        $eachPromise = new Promise\EachPromise($promises, [
//            'fulfilled' => function (Response $response) {
//                Crawl::create([
//                'body' => $response->getBody(),
//                'url' => 'https://www.in.gr/',
//                'response_code' => $response->getStatusCode()
//                ]);
//            },
//            'rejected' => function ($reason) {
//                echo $reason;
//            }
//        ]);
//        $eachPromise->promise()->wait();

//        $crawled = Crawl::take(1)->get()->first();
//        echo $crawled->body;
        $et = microtime(true);
        $execution_time = $et - $st;
//        echo " Execution time of script = ".$execution_time." sec";
        $posts = Post::all();

        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required|min:2'
        ]);

        Post::create(request(['title', 'body']));

        return redirect('/');
    }
}
