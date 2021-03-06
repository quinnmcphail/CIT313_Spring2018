<?php
class Post extends Model
{

    public function getPost($pID)
    {

        $sql = 'SELECT posts.pID, posts.title, posts.content, posts.date, posts.uID, users.first_name as userFN, users.last_name as userLN, posts.categoryID, categories.name as catName FROM posts JOIN users ON posts.uID = users.uID JOIN categories ON posts.categoryID =categories.categoryID WHERE pID = ?;';

        // perform query
        $results = $this->db->getrow($sql, array($pID));

        $post = $results;

        return $post;

    }

    public function getAllPosts($limit = 0)
    {

        $numposts = '';
        if ($limit > 0) {

            $numposts = ' LIMIT ' . $limit;
        }

        $sql = 'SELECT posts.pID, posts.title, posts.content, posts.date, posts.uID, users.first_name as userFN, users.last_name as userLN, posts.categoryID, categories.name as catName FROM posts JOIN users ON posts.uID = users.uID JOIN categories ON posts.categoryID =categories.categoryID;' . $numposts;

        // perform query
        $results = $this->db->execute($sql);

        while ($row = $results->fetchrow()) {
            $posts[] = $row;
        }

        return $posts;

    }

    public function addPost($data)
    {

        $sql = 'INSERT INTO posts (title,content,date,categoryID,uID) VALUES (?,?,?,?,?)';
        $this->db->execute($sql, $data);
        $message = 'Post added.';
        return $message;

    }

    public function updatePost($data)
    {
        $sql = 'UPDATE posts SET title = ?, content = ?, date = ?, categoryID = ? WHERE pID = ?';
        $this->db->execute($sql, $data);
        $message = 'Post updated.';
        return $message;
    }

}
