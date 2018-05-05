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

    public function getAllPostsWithCat($cat){
        $sql = $sql = 'SELECT posts.pID, posts.title, posts.content, posts.date, posts.uID, users.first_name as userFN, users.last_name as userLN, posts.categoryID, categories.name as catName FROM posts WHERE posts.categoryID = ? JOIN users ON posts.uID = users.uID JOIN categories ON posts.categoryID =categories.categoryID';
        $results = $this->db->execute($sql,array($cat));

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

    public function addComment($data){
        $sql = "INSERT INTO comments (commentText,postID,uID,date) VALUES (?,?,?,?)";
        $this->db->execute($sql, $data);
        $message = 'Comment added.';
        return $message;
    }

    public function deleteComment($data){
        $sql = "DELETE FROM comments WHERE commentID=?";
        $this->db->execute($sql, $data);
        $message = 'Comment deleted.';
        return $message;
    }

    public function updatePost($data)
    {
        $sql = 'UPDATE posts SET title = ?, content = ?, date = ?, categoryID = ? WHERE pID = ?';
        $this->db->execute($sql, $data);
        $message = 'Post updated.';
        return $message;
    }

    public function deletePost($data){
        $sql = 'DELETE FROM posts WHERE pID = ?';
        $this->db->execute($sql, $data);
        $message = 'Post updated.';
        return $message;
    }

    public function getAllComments($data)
    {

        $sql = 'SELECT comments.commentID, users.first_name as UserFN, users.last_name as UserLN, comments.commentText, comments.Date FROM comments JOIN users ON users.uID = comments.uID WHERE comments.postID = ?';

        // perform query
        $results = $this->db->execute($sql, $data);

        while ($row = $results->fetchrow()) {
            $comments[] = $row;
        }

        return $comments;

    }

}
