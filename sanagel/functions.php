<?php
//-----------------------------------> the security functions
function fsecure($var){
    $s_var = htmlspecialchars($var);
    return $s_var;
}
function secure($var,$data_base){
    if(get_magic_quotes_gpc()){
        $var = stripslashes($var);
    }
    $s_var = $data_base->real_escape_string($var);
    return fsecure($s_var);
}
// function secure_arr($arr,$data_base){
//     $s_post = array();
//     foreach($arr as $name=>$value){
//         $s_post[$name] = secure($value,$data_base);
//     }
//     return $s_post;
// }

//----------------------------------------> begining of the user class
class users{
    private $id;
    private $first_name;
    private $last_name;
    private $password;
    private $gender;
    private $birthdate;
    private $bio;
    private $mail;
    private $join_time;
    //-----------------------------------> the constructor
    public function __construct($id,$data_base){
        $id = secure($id,$data_base);
        $query = "SELECT * FROM users WHERE user_id = '$id';";
        if($data_set = $data_base->query($query)){
            $info = $data_set->fetch_assoc();
            $this->id = $id;
            $this->first_name = fsecure($info['first_name']);
            $this->last_name = fsecure($info['last_name']);
            $this->password = fsecure($info['pw']);
            $this->gender = fsecure($info['gender']);
            $this->birthdate = fsecure($info['birthdate']);
            $this->bio = fsecure($info['bio']);
            $this->mail = fsecure($info['mail']);
            $this->join_time = fsecure($info['join_time']);
        }else{
            die("ERROR 1");
        }
    }
    //-----------------------------------------> adding a new user
    public static function new_user($first_name,$last_name,$password,$gender,$birthdate,$mail,$data_base){
        $mail = secure($mail,$data_base);
        $check_mail = "SELECT user_id FROM users WHERE mail = '$mail'";
        $data_set = $data_base->query($check_mail);
        if($data_set->fetch_assoc()){
            die("THIS E-MAIL IS ALREADY USED");
        }else{
            $first_name = secure($first_name,$data_base);
            $last_name = secure($last_name,$data_base);
            $password = secure($password,$data_base);
            $gender = secure($gender,$data_base);
            $birthdate = secure($birthdate,$data_base);
            $hash = password_hash($password, PASSWORD_DEFAULT);//this is where I hash before inserting a new user
            $query = "INSERT INTO users(first_name,last_name,pw,gender,birthdate,mail) VALUES ('$first_name','$last_name','$hash','$gender','$birthdate','$mail')";
            if($data_base->query($query)){
                $id = $data_base->insert_id;
                $user = new users($id,$data_base);
                return $user;
            }else{
                die("ERROR unsuccessful query");
            }
        }
    }
    //-------------------------------------> verifying a user
    public static function verify($mail,$password,$data_base){
        $mail = secure($mail,$data_base);
        $password = secure($password,$data_base);
        $query = "SELECT user_id, pw FROM users WHERE mail = '$mail'";
        if($data_set = $data_base->query($query)){
            $info = $data_set->fetch_assoc();
            $hash = $info['pw'];
            $id = $info['user_id'];
            if(password_verify($password,$hash)){
                $user = new users($id,$data_base);
                return $user;
            }else{
                return 'wrong password';
            }
        }else{
            return 'user doesnt exist';
        }
    }
    //-------------------------------------------->the posting method
    public function post($content,$data_base){
        $content = secure($content,$data_base);
        $id = $this->id;
        $query = "INSERT INTO posts (user_id, content, likes_num, comments_num) VALUES ('$id','$content','0','0');";
        if(!$data_base->query($query)){
            die("ERROR 2");
        }
    }

    //---------------------------------------> Edit Posts
    //public function edit_post($edited_content, $id, $data_base){
        //$edited_content = secure($edited_content, $data_base);
        //$query = "UPDATE posts SET content = '$edited_content' WHERE post_id = '$id'"
    //}
    
    //-------------------------------------> getter methods
    public function get_posts($data_base){
        $id = $this->id ;
        $id = secure($id,$data_base);
        $post_objects = array();
        $query = "SELECT post_id FROM posts WHERE user_id = $id ORDER BY post_time DESC ;";
        $data_set = $data_base->query($query);
        $counter = 0;
        while($temp_id = $data_set->fetch_assoc()){
            $id = $temp_id['post_id'];
            $post_objects[$counter] = new posts($id,$data_base);
            $counter++;
        }
        return $post_objects;
    }
    public function get_first_name(){
        return $this->first_name;
    }
    public function get_last_name(){
        return $this->last_name;
    }
    public function get_id(){
        return $this->id;
    }
    public function get_gender(){
        return $this->gender;
    }
    public function get_birthdate(){
        return $this->birthdate;
    }
    public function get_bio(){
        return $this->bio;
    }
    public function get_mail(){
        return $this->mail;
    }
    public function get_join_time(){
        return $this->join_time;
    }
}
//---------------------------------------------> end of the users class

//-------------------------------------------> begining of the posts class
class posts{
    //------------------------------->the properties
    private $id;
    private $owner;
    private $post_time;
    private $content;
    private $likes_num;
    private $comments_num;
    //-------------------------------------> the constructor
    function __construct($id,$data_base){
        $id = secure($id,$data_base);
        $query = "SELECT * FROM posts WHERE post_id = '$id';";
        if($data_set = $data_base->query($query)){
            $info = $data_set->fetch_assoc();
            $this->id = $id;
            $user_id = fsecure($info['user_id']);
            $this->owner = new users($user_id,$data_base);
            $this->post_time = fsecure($info['post_time']);
            $this->content = fsecure($info['content']);
            $this->likes_num = fsecure($info['likes_num']);
            $this->comments_num = fsecure($info['comments_num']);
        }else{
            echo "ERROR 3";
        }
    }
    //------------------------------------->the functions that returns all post objects
    public static function get_all($data_base){
        //notice how this function may need some modifications because when it returns an array of objects they come past sanitization 
        $post_objects = array();
        $query = "SELECT post_id FROM posts ORDER BY post_time DESC;";
        if($data_set = $data_base->query($query)){
            $counter = 0;
            while($temp_id = $data_set->fetch_assoc()){
                $id = $temp_id['post_id'];
                $post_objects[$counter] = new posts($id,$data_base);
                $counter++;
            }
            return $post_objects;
        }else{
            die('ERROR 4');
        }
    }
    //--------------------------------------> the getters
    public function get_id(){
        return $this->id;
    }
    public function get_owner(){
        return $this->owner;
    }
    public function get_post_time(){
        return $this->post_time;
    }
    public function get_likes_num(){
        return $this->likes_num;
    }
    public function get_comments_num(){
        return $this->comments_num;
    }
    public function get_content(){
        return $this->content;
    }
}

?>