<?php

class BlogController extends Controller
{

    public $postObject;

    public function post($pID)
    {

        $this->postObject = new Post();
        $post = $this->postObject->getPost($pID);
        $this->set('post', $post);

    }

    public function category($cat){
        $this->postObject = new Post();
        $posts = $this->postObject->getAllPostsWithCat($cat);
        $this->set('title', 'Posts With Category');
        $this->set('posts', $posts);
    }

    public function index()
    {

        $this->postObject = new Post();
        $posts = $this->postObject->getAllPosts();
        $this->set('title', 'The Default Blog View');
        $this->set('posts', $posts);

    }

}
