<?php
    require_once 'admin.php';
    require_once 'functions.php';
    session_start();
        if(isset($_SESSION['veiwer'])){//------------------>this is the section of the code that will be excuted if I have the veiwer variable
            $veiwer = $_SESSION['veiwer'];
            // if(!isset($_SESSION['data_base'])){
                $data_base = new mysqli($hn,$un,$pw,$db);
                if ($data_base->connect_error){
                    $fatal_error = '<h1 style="margin:20%;">OOPS SOMETHING WENT WRONG</h1>';
                    die ("$fatal_error");
                }
                $_SESSION['data_base'] = $data_base;
            // }else{
            //     $data_base = $_SESSION['data_base'];
            // }
            if(isset($_POST['publish'])){//-----------------> from here I start listing the cases of form submissions starting with posting
                $content = $_POST['content'];
                $veiwer->post($content,$data_base);
                header("Location: index.php");
            }else{//---------------------------------------->this is the case where no form submission occures and the veiwer is just veiwing the page
                $post_objects = posts::get_all($data_base);
                echo <<<_OUTPUT
                
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Social media - Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <form style="margin:0; padding:0; width:0;" action="index.php" method="POST" id="publisher">
        <input type="hidden" name="publish" value="yes">
    </form>
    <header>
        <div class="nav">
            <div class="logo">
                <a href="index.php">
                    <img src="images/social-green-icon.png" alt="Social Media" title="Social Media">
                    <p>Sanagel Club</p>
                </a>
                <section class="fix"></section>
            </div>
            <nav>
                <ul>
                    <li>
                        <button onclick="profile()"><i class="fas fa-user"></i></button>
                        <div class="profile-option">
                            <button><i class="fas fa-user-circle"></i> Profile <!--Put User's Name Here--></button>
                            <button><i class="fas fa-door-open"></i> Logout</button>
                        </div>
                    </li>
                    <li>
                        <button title="Post" id="post-btn" onclick="post()"><i class="fas fa-edit"></i></button>
                        <div class="add-post">
                            <div class="share-option">
                                <label for="share-with">Share With : </label>
                                <select name="share-with" id="">
                                    <option value="public"><span class="fas fa-edit"></span>Public</option>
                                    <option value="friends">Friends</option>
                                    <option value="me">Only Me</option>
                                </select>
                            </div>
                            <form name="post-form">   
                                <textarea name="content" form="publisher" id="" name="post-field" cols="30" rows="10"
                                    placeholder="What's in your mind ?..."></textarea>
                            </form>
                            <label for="file">Upload image :</label>
                            <input type="file" name="image" id="image">
                            <button class="share" type="submit" form="publisher">Share</button>
                        </div>
                    </li>
                    <li><a href="index.php"><button title="Home"><i class="fas fa-home"></i></button></a></li>
                    <li>
                        <button title="Notifcation" onclick="notifcation()"><i class="fas fa-bell"></i></button>
                        <div class="notifcation-panel">
                            <div class="notifcation">
                                <img src="images/avatar.png">
                                <div class="notifcation-content">
                                    <p class="head">Emad liked your post</p>
                                    <p class="center">Emad and 22 others liked your post on <span class="bold">your
                                            profile</span></p>
                                    <p class="date">20-4-2020</p>
                                </div>
                            </div>
                            <div class="notifcation">
                                <img src="images/avatar.png">
                                <div class="notifcation-content">
                                    <p class="head">Emad liked your post</p>
                                    <p class="center">Emad and 22 others liked your post on <span class="bold">your
                                            profile</span></p>
                                    <p class="date">20-4-2020</p>
                                </div>
                            </div>
                            <div class="notifcation">
                                <img src="images/avatar.png">
                                <div class="notifcation-content">
                                    <p class="head">Emad liked your post</p>
                                    <p class="center">Emad and 22 others liked your post on <span class="bold">your
                                            profile</span></p>
                                    <p class="date">20-4-2020</p>
                                </div>
                            </div>
                            <div class="notifcation">
                                <img src="images/avatar.png">
                                <div class="notifcation-content">
                                    <p class="head">Emad liked your post</p>
                                    <p class="center">Emad and 22 others liked your post on <span class="bold">your
                                            profile</span></p>
                                    <p class="date">20-4-2020</p>
                                    <section class="fix"></section>
                                </div>
                            </div>
                            <section class="fix"></section>
                        </div>
                    </li>
                </ul>
            </nav>
            <section class="fix"></section>
        </div>
    </header>

    <main>
        <div class="feeds">
_OUTPUT;
                $index = 0;
                foreach($post_objects as $post){
                    $owner = $post->get_owner();
                    $post_time = $post->get_post_time();
                    $content = $post->get_content();
                    $likes_num = $post->get_likes_num();
                    $comments_num = $post->get_comments_num();
                    $name = $owner->get_first_name().' '.$owner->get_last_name();
                    $id = $owner->get_id();
                    echo <<<_OUTPUT
            <div class="post">
                <div class="post-head">
                    <a href="profile.php?id=$id">
                        <img src="images/avatar.png" title="Emad's Profile Picture">
                        <div class="head-details">
                            <h3>$name</h3>
                            <p class="date">$post_time</p>
                        </div>
                    </a>
                    <div class="head-button">
                        <button class="more"><i class="fas fa-ellipsis-h"></i></button>
                        <div class="optiones">
                            <button class="edit-btn"><i class="fas fa-pencil-alt"></i> Edit</button>
                            <button><i class="fas fa-trash-alt"></i> Delete</button>
                        </div>
                    </div>
                </div>
                <section class="fix"></section>
                <div class="post-details">
                    <div class="content">
                        <p>$content</p>
                    </div>
                    <form class="edit-form" id="edit-form">
                        <textarea>$content</textarea>
                    </form>
                </div>
                <div class="post-action">
                    <div class="left-action">
                        <button class="love-btn">
                            <i class='love far fa-heart'></i>
                            <p class="plove">Love</p>
                        </button>
                        <button class="comment">
                            <i class="fas fa-comment"></i>
                            <p>Commment</p>
                        </button>
                    </div>
                    <div class="right-action">
                        <p class="likes">$likes_num Likes</p>
                        <p class="comments">$comments_num Comments</p>
                        <button class="ebs" form="edit">Save</button>
                        <button class="ebc" type="button">Cancel</button>
                    </div>
                    <section class="fix"></section>
                </div>
            </div>
            <div class="comment-section">
                <h3>Add a Comment</h3>
                <textarea placeholder="Type your comment..."></textarea>
                <button>Comment</button>
                <section class="fix"></section>
            </div>
_OUTPUT;
                    $index++;
                }
                echo <<<_OUTPUT
        </div>
    </main>

    <script src="js/main.js"></script>
</body>

</html>
_OUTPUT;
            }
        }else{//--------------------------------------------->this is the section to be excuted if I don't have the veiwer variable
            if(isset($_POST['signed'])){
                $data_base = new mysqli($hn,$un,$pw,$db);
                if ($data_base->connect_error){
                    $fatal_error = '<h1 style="margin:20%;">OOPS SOMETHING WENT WRONG</h1>';
                    die ("$fatal_error");
                }
                $_SESSION['data_base'] = $data_base;
                if($_POST['signed'] == 'up'){
                    $birthdate = $_POST['year'].'-'.$_POST['month'].'-'.$_POST['day'];
                    $veiwer = users::new_user($_POST['first_name'],$_POST['last_name'],$_POST['password'],$_POST['gender'],$birthdate,$_POST['mail'],$data_base);
                    $_SESSION['signed'] = TRUE;
                    $_SESSION['veiwer'] = $veiwer;
                    header("Location: index.php");
                }elseif($_POST['signed'] == 'in'){
                    $veiwer = users::verify($_POST['mail'],$_POST['password'],$data_base);
                    if($veiwer == 'wrong password'){
                        die('wrong password');
                    }elseif($veiwer == 'user doesnt exist' ){
                        die('user doesnt exist');
                    }else{
                        $_SESSION['signed'] = TRUE;
                        $_SESSION['veiwer'] = $veiwer;
                        header("Location: index.php");
                    }
                }else{
                    echo 'SOMETHING WENT WRONG';
                }
            }else{//---------------------------------->this is the section to be excuted if the user isn't logged in
                header('Location: pages/login.php');
            }
        }
?>