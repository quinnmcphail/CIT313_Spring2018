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

    public function getFeedItems($num_feed_items)
    {
        $items = simplexml_load_file($this->feed_url);
        $items = $items->channel->item;
        $itemsArray = $this->xml2array($items);

        if(!is_null($num_feed_items)){
            $itemsArray = array_slice($itemsArray,0,$num_feed_items);
            $this->num_feed_items = $num_feed_items;
        }

        return $itemsArray;
    }

    public function getChannelInfo()
    {
        $channel = simplexml_load_file($this->feed_url);
        return $channel->channel;
    }

    public function xml2array($xml)
    {
        $arr = array();

        foreach ($xml->children() as $r) {
            $t = array();
            if (count($r->children()) == 0) {
                $arr[$r->getName()] = strval($r);
            } else {
                $arr[$r->getName()][] = xml2array($r);
            }
        }
        return $arr;
    }
}
