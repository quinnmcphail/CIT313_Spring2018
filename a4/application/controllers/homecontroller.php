<?php

class HomeController extends Controller
{

    public function index()
    {
        $rss = new RssDisplay("http://fox59.com/feed");
        $items = $rss->getFeedItems();
        foreach($items as $item){
            echo($item->title."<br>");
        }
    }

}
