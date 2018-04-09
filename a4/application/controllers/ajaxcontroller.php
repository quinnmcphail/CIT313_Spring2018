<?php
class AjaxController extends Controller
{
    public function index()
    {
        $this->set("response", "Invalid Request");
    }

    public function get_location()
    {
        if (!empty($_POST['latitude']) && !empty($_POST['longitude'])) {
            $url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng=' . trim($_POST['latitude']) . ',' . trim($_POST['longitude']) . '&components=postal_code&sensor=false';
            $json = @file_get_contents($url);
            $data = json_decode($json);
            $status = $data->status;

            if ($status == "OK") {
                $location = $data->results[0]->formatted_address;
            } else {
                $location = '';
            }

            $match = array();
            preg_match('/\d{5}/', $location, $match);

            $this->set("response", $match[0]);
        }
    }

    public function get_weather()
    {
        if (!empty($_POST['zip'])) {
            $url = 'http://api.wunderground.com/api/9275ef0b6f8bd4ea/conditions/q/' . trim($_POST['zip']) . '.json';
            $json = @file_get_contents($url);
            $data = json_decode($json);

            $this->set("response", $json);
        }
    }
}
