<?php

class AddPostController extends Controller
{

    public $postObject;
    public $categoryObject;

    public function defaultTask()
    {

        $this->postObject = new Post();
        $this->set('task', 'add');
        $this->categoryObject = new Category();
        $this->categoryObject = new Category();

        $categories = $this->categoryObject->getAllCategories();

        $this->set('categories', $categories);

    }

    public function add()
    {

        $this->postObject = new Post();

        $data = array('title' => $_POST['post_title'], 'content' => $_POST['post_content']);

        $result = $this->postObject->addPost($data);

        $this->set('message', $result);

    }

    public function edit($pID)
    {

        $this->postObject = new Post();

        $post = $this->postObject->getPost($pID);

        $this->set('pID', $post['pID']);
        $this->set('title', $post['title']);
        $this->set('content', $post['content']);
        $this->set('task', 'update');

    }

}
