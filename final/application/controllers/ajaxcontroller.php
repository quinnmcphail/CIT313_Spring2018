<?php
class AjaxController extends Controller
{
    protected $postObject;
    protected $userObject;
    protected $categoryObject;

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

            $this->set("response", $json);
        }
    }

    public function get_post_content()
    {
        $this->postObject = new Post();
        $post = $this->postObject->getPost($_GET['pID']);
        $this->set("response", $post['content']);
    }

    public function get_post_comments()
    {
        $this->postObject = new Post();
        $comments = $this->postObject->getAllComments($_GET['pID']);
        $this->set("response", json_encode($comments));
    }

    public function add_post_comment()
    {
        $this->postObject = new Post();
        $message = $this->postObject->addComment($_POST);
        $this->set("response", var_dump($message));
    }
}
