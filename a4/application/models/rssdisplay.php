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
        $items = $items->channel->item;

        // if(!is_null($num_feed_items)){
        //     $itemsSlice = array_slice($items,0,0-(count($items)-$num_feed_items));
        //     $items = $itemsSlice;
        //     $this->num_feed_items = $num_feed_items;
        // }

        return $items;
    }

    public function getChannelInfo(){
        $channel = simplexml_load_file($this->feed_url);
        return $channel->channel;
    }
}