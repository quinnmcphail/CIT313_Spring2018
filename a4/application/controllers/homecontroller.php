<?php

class HomeController extends Controller
{

    public function index()
    {
        $rss = new RssDisplay("http://digitaltrends.com/feed");
        $this->set("feed_data", $rss->getFeedItems(8));
        $this->set("channel_info", $rss->getChannelInfo());
    }

    public function getLocation()
    {
        if (!empty($_POST['latitude']) && !empty($_POST['longitude'])) {
            $url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng=' . trim($_POST['latitude']) . ',' . trim($_POST['longitude']) . '&sensor=false';
            $json = @file_get_contents($url);
            $data = json_decode($json);
            $status = $data->status;

            if ($status == "OK") {
                $location = $data->results[0]->formatted_address;
            } else {
                $location = '';
            }

            echo $location;
        }
    }

}
