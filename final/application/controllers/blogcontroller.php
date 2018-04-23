<?php

class BlogController extends Controller
{

    public $postObject;

    public function post($pID)
    {

        $this->postObject = new Post();
        $post = $this->postObject->getPost($pID);
        $comments = $this->postObject->getAllComments($pID);
        $this->set('post', $post);
        $this->set('comments', $comments);

    }

    public function index()
    {

        $this->postObject = new Post();
        $posts = $this->postObject->getAllPosts();
        $this->set('title', 'The Default Blog View');
        $this->set('posts', $posts);

    }

}
