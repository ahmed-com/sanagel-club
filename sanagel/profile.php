
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sanagel Club -
    <!-- somone's profile -->
</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet" href="css/profile-style.css">
</head>

<body>
    <form style="margin:0; padding:0; width:0;" action="index.php" method="POST" id="publisher">
        <input type="hidden" name="publish" value="yes">
    </form>
    <header>
        <div class="nav">
            <div class="logo">
                <a href="../index.php">
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
                            <button><i class="fas fa-user-circle"></i> Profile
                                <!--Put User's Name Here--></button>
                            <button><i class="fas fa-door-open"></i> Logout</button>
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
    <div class="profile-info">
            <button class="edit-profile" onclick="edit_profile()">
                <i class="fas fa-user-edit"></i>
                <p>Edit</p>
            </button>
            <div class="view">
                <img src="images/avatar.png" title="Somone's Name">
                <h2>Someone's Name</h2>
                <div class="bio">
                    <h5>Bio</h5>
                    <p>Hello Bio</p>
                </div>
            </div>
            <form id="edit-form" action="" method="post" enctype="multipart/form-data">
                <img src="images/avatar.png">
                <input type="file" name="" id="">
                <div class="bio">
                    <h5>Bio</h5>
                    <textarea name="" id="" placeholder="Tell us about yourself ♥"></textarea>
                </div>
                <div class="action-btn">
                    <button class="ebss" form="edit">Save</button>
                    <button class="ebcc" type="button" onclick="cancel_edit_profile()">Cancel</button>
                </div>
                <section class="fix"></section>
            </form>
        </div>
        
        <div class="feeds">
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
                        <p class="likes">$likes_num</p>
                        <p class="comments">$comments_num</p>
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
            <section class="fix"></section>
        </div>
        <section class="fix"></section>
    </main>

    <script src="js/main.js"></script>
</body>

</html>