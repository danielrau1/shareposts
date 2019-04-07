<?php
class Posts extends Controller{

    public function __construct()
    {
        if(!isLoggedIn()){   // DR: if not logged in goes back to login - from the session helper
            redirect('users/login');
        }
        $this->postModel = $this->model('Post');

    }

    public function index(){
        //Get posts
        $posts = $this->postModel->getPosts();

        $data=[
            'posts'=>$posts
        ];

        $this->view('posts/index', $data);
    }

    public function add(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            //sanitize
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data=[
                'title'=> trim($_POST['title']),
                'bodt'=>trim($_POST['bodt']),
                'user_id'=>$_SESSION['user_id'],
                'title_err'=>'',
                'bodt_err'=>''
            ];

            //validate the data
            if(empty($data['title']))
            {
              $data['title_err']='enter title';
            }
            if(empty($data['bodt']))
            {
                $data['bodt_err']='enter bodt text';
            }

            //make sure no errors
            if(empty($data['title_err']) AND empty($data['bodt_err']) ){
                //validated
                if($this->postModel->addPost($data)){

                    redirect('posts');
                }else{
                    die('went wrong');
                }
            }else{
               //load with errors
                $this->view('posts/add',$data);
            }

        }else{
            $data=[
                'title'=> '',
                'bodt'=>''
            ];
            $this->view('posts/add',$data);
        }

    }
}
