<?php

class ManagePostsController extends Controller
{

    public $postObject;
    public $categoryObject;

    protected $access = 1;

    public function index(){
    }

    public function add()
    {

        $this->postObject = new Post();
        $this->set('task', 'save');
        $this->categoryObject = new Category();

        $categories = $this->categoryObject->getAllCategories();

        $this->set('categories', $categories);

    }

    public function save()
    {

        $this->postObject = new Post();

        $data = array('title' => $_POST['post_title'], 'content' => $_POST['post_content'], 'date' => $_POST['post_date'], 'categoryID' => $_POST['post_category']);

        $result = $this->postObject->addPost($data);

        $this->set('message', $result);

    }

    public function edit($pID)
    {

        $this->postObject = new Post();

        $post = $this->postObject->getPost($pID);
        $this->categoryObject = new Category();

        $categories = $this->categoryObject->getAllCategories();

        $this->set('categories', $categories);

        $this->set('pID', $post['pID']);
        $this->set('title', $post['title']);
        $this->set('content', $post['content']);
        $this->set('date', $post['date']);
        $this->set('categoryID', $post['categoryID']);
        $this->set('task', 'update');
    }

    public function update()
    {
        $this->postObject = new Post();
        $data = array('title' => $_POST['post_title'], 'content' => $_POST['post_content'], 'date' => $_POST['post_date'], 'categoryID' => $_POST['post_category'], 'pID' => $_POST['pID']);
        $result = $this->postObject->updatePost($data);
        $this->set('message', $result);
    }

}
