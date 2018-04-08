<?php
class RssDisplay extends Model{
    protected $feed_url;
    protected $num_feed_items;

    public function __construct($url){
        parent::__construct();

        $this->feed_url = $url;
    }

    public function getFeedItems($num_feed_items){
        $items = simplexml_load_file($this->feed_url);

        if(!is_null($num_feed_items)){
            $items = array_slice($items,0,$num_feed_items,true);
            $this->num_feed_items = $num_feed_items;
        }
        return $items->channel->item;
    }

    public function getChannelInfo(){
        $channel = simplexml_load_file($this->feed_url);
        return $channel->channel;
    }
}