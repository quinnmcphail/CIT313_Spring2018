<?php

class HomeController extends Controller
{

    public function index()
    {
        $rss = new RssDisplay("http://digitaltrends.com/feed");
        $this->set("feed_data",$rss->getFeedItems(8));
        $this->set("channel_info",$rss->getChannelInfo());
    }

}
