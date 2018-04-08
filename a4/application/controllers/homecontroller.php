<?php

class HomeController extends Controller
{

    public function index()
    {
        $rss = new RssDisplay("http://fox59.com/feed");
        $items = $rss->getFeedItems(2);
        foreach($items as $item){
            echo($item->title."<br>");
        }
        var_dump($items);
    }

}
