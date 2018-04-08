<?php

class HomeController extends Controller
{

    public function index()
    {
        $rss = new RssDisplay("http://fox59.com/feed");
        $items = $rss->getFeedItems(1);
        // foreach($items as $item){
        //     echo($item->title."<br>");
        // }
        echo($items);
    }

}
