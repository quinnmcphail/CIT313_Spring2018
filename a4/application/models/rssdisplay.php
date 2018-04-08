<?php
class RssDisplay extends Model
{
    protected $feed_url;
    protected $num_feed_items;

    public function __construct($url)
    {
        parent::__construct();

        $this->feed_url = $url;
    }

    public function getFeedItems($num_feed_items = -1)
    {
        $items = simplexml_load_file($this->feed_url);
        $items = $items->channel->item;
        $feed = array();
        $limit = 0;

        foreach ($items as $item) {
            if ($limit == $num_feed_items) {
                break;
            }

            $i = array();
            $i["title"] = (string) $item->title;
            $i["description"] = (string) $item->description;
            $i["link"] = (string) $item->link;
            $i["pubDate"] = (string) $item->pubDate;
            $i["category"] = (string) $item->category[0];
            array_push($feed,$i);
            $limit++;
        }

        return $feed;
    }

    public function getChannelInfo()
    {
        $channel = simplexml_load_file($this->feed_url);
        return $channel->channel;
    }
}
