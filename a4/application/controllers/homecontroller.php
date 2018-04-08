<?php

class HomeController extends Controller
{

    public function index()
    {
        $rss = new RssDisplay("http://fox59.com/feed");
        var_dump($rss->getFeedItems(1));
    }

}
