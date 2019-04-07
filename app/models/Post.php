<?php
class Post{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }


    public function getPosts(){
        $this->db->query('SELECT *,
 posts.id as postId,
 users.id as userId,
 posts.creted_at as postCreated,
 users.creted_at as userCreated
 FROM posts
 INNER JOIN users
 ON posts.user_id = users.id
 ORDER BY posts.creted_at DESC
 '); // gives an array of objects

        $results = $this->db->resultSet(); // used to return more than 1 row
        return $results;
    }


    public function addPost($data){
        $this->db->query( 'INSERT INTO posts (title, user_id, bodt) VALUES (:title, :user_id, :bodt)');
        $this->db->bind(':title',$data['title']);
        $this->db->bind(':user_id',$data['user_id']);
        $this->db->bind(':bodt',$data['bodt']);

        //Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

}
