<?php include('server.php'); ?>
<!DOCTYPE html>
<html>

<head>
<style>
  .button5 {border-radius: 50%;}
  .button:hover {background-color: #3e8e41}

.button:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
</style>
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css" type="text/css">
    <script src="lib/jquery-3.2.0.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="lib/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="lib/bootstrap-switch/css/bootstrap-switch.min.css">
    <script src="lib/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <script src="../twemoji.maxcdn.com/twemoji.min.js"></script>
    <script src="js/lazy-load.min.js"></script>
    <script src="js/socialyte.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="style.css" type="text/css">
</head>

<body id="wall">
<?php 
    $query = "select p.*, u.username as username, u.email as email from posts as p, users as u where u.id = p.user_id order by p.post_id desc";
    $result = mysqli_query($db, $query);
    
    
    $results = [];
    if ($result) {
        while($row = mysqli_fetch_assoc($result)){
            $results[] = $row;
        }
    }
?>

    <!--Header with Nav -->
    <header class="text-right">
        <form class="text-left search" method="GET">
            <input name="q" type="text" placeholder="Search..">
        </form>
        <div class="menu-icon">
            <div class="dropdown">
                <span class="dropdown-toggle" role="button" id="dropdownSettings" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="true">
                    <span class="hidden-xs hidden-sm">Settings</span> <i class="fa fa-cogs" aria-hidden="true"></i>
                </span>
                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownSettings">
                    <li>
                        <a href="settings.php" title="Settings" data-toggle="modal" data-target="#settingsmodal">
                            <div class="col-xs-4">
                                <i class="fa fa-wrench" aria-hidden="true"></i>
                            </div>
                            <div class="col-xs-8 text-left">
                                <span>Settings</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" title="Settings">
                            <div class="col-xs-4">
                                <i class="fa fa-question" aria-hidden="true"></i>
                            </div>
                            <div class="col-xs-8 text-left">
                                <span>FAQ</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="index.php?logout='1' title="Settings">
                            <div class="col-xs-4">
                                <i class="fa fa-sign-out" aria-hidden="true"></i>
                            </div>
                            <div class="col-xs-8 text-left">
                                <span>Logout</span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="second-icon dropdown menu-icon">
            <span class="dropdown-toggle" role="button" id="dropdownNotification" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="true">
                <span class="hidden-xs hidden-sm">Notifications</span> <i class="fa fa-bell-o" aria-hidden="true"></i>
                <span class="badge">2</span>
            </span>
            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownNotification">
                <li class="new-not">
                    <a href="#" title="User name comment"><img src="img/user2.jpg" alt="User name"
                            class="img-circle img-user-mini"> User comments your post</a>
                </li>
                <li class="new-not">
                    <a href="#" title="User name comment"><img src="img/user3.jpg" alt="User name"
                            class="img-circle img-user-mini"> User comments your post</a>
                </li>
                <li>
                    <a href="#" title="User name comment"><img src="img/user4.jpg" alt="User name"
                            class="img-circle img-user-mini"> User comments your post</a>
                </li>
                <li role="separator" class="divider"></li>
                <li><a href="#" title="All notifications">All Notifications</a></li>
            </ul>
        </div>
        <div class="second-icon menu-icon">
            <span><a href="personal-profile.php" title="Profile"><span class="hidden-xs hidden-sm">Profile</span> <i
                        class="fa fa-user" aria-hidden="true"></i></a>
            </span>
        </div>
        <div class="second-icon menu-icon">
            <span><a href="wall.php" title="Wall"><span class="hidden-xs hidden-sm">Wall</span> <i
                        class="fa fa-database" aria-hidden="true"></i></a>
            </span>
        </div>
    </header>

    <!--Left Sidebar with info Profile -->
    <div class="sidebar-nav">
        <a href="personal-profile.php" title="Profile">
            <img src="img/user.jpg" alt="User name" class="img-circle img-user">
        </a>
        <h2 class="text-center hidden-xs"><a href="personal-profile.php" title="Profile"><?php  echo $_SESSION["username"]; ?></a></h2>
        <p class="text-center user-description hidden-xs">
            <i>In my spare time, the web development community is a big part of my life. Whether teaching code to kids at a local school, managing online programming groups and blogs or attending a conference, I find keeping involved helps me stay up to date..</i>
        </p>
    </div>

    <!--Wall with Post -->
    <div class="content-posts active" id="posts">
        <div id="posts-container" class="container-fluid container-posts">
        <div class="container col-lg-12">
            <div class="col-lg-6">
                <form id="myform" action="insertpost.php" method="post">
                    <div class="form-group">
                        <input type="text" name="post" class="form-control">
                    </div>
                    <input type="submit" name="submit" value="publish" class="btn btn-success" id="submit">
                </form>
            </div>
        </div>
        
            <!-- <div class="card-post">
                <div class="row">
                    <div class="col-xs-9 col-sm-10">
                        <a href="personal-profile.php" title="Profile">
                            <img src="img/user.jpg" alt="User name" class="img-circle img-user">
                        </a>
                    </div>
                    <div class="col-xs-9 col-sm-10 info-user">
                        <h3><a href="personal-profile.php" title="Profile"><?php echo $res['username']; ?></a></h3>
                        <p><i>2h</i></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2 data-post">
                        <p><?php echo $res['post']; ?></p>
                        <div class="reaction">
                            &#x2764; 156 &#x1F603; 54
                        </div>
                        <div class="comments">
                            <div class="more-comments">View more comments</div>
                            <ul>
                                <li><b>User1</b> Nice</li>
                                <li><b>User2</b> Nice &#x1F602;</li>
                            </ul>
                            <form>
                                <input type="text" class="form-control" placeholder="Add a comment">
                            </form>
                        </div>
                    </div>
                </div>
            </div> -->
        
        <?php foreach($results as $res){ ?>
            <div class="card-post">
                <div class="row">
                    <div class="col-xs-3 col-sm-2">
                        <a href="user-profile.php" title="User Profile">
                            <img src="img/user2.jpg" alt="User name" class="img-circle img-user">
                        </a>
                    </div>
                    <div class="col-xs-9 col-sm-10 info-user">
                        <h3><a href="user-profile.php" title="User Profile"><?php echo $res['username']; ?></a></h3>
                        <p><i>2h</i></p>
                    </div>
                </div>
                <div class="row">
                    <div class=" col-sm-8 col-sm-offset-2 data-post">
                        <p><?php echo $res['post']; ?></p>
                        <!-- <img src="img/post.jpg" alt="image post" class="img-post"> -->
                        <div class="reaction">
                            &#x2764; 1234 &#x1F603; 54
                        </div>
                        <div class="comments">
                            <div class="more-comments">View more comments</div>
                            <ul>
                                <li><b>User1</b> Nice</li>
                                <li><b>User2</b> Nice &#x1F602;</li>
                            </ul>
                            <form>
                                <input type="text" class="form-control" placeholder="Add a comment">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
            <!--
            <div class="card-post">
                <div class="row">
                    <div class="col-xs-3 col-sm-2">
                        <a href="personal-profile.php" title="User Profile">
                            <img src="img/user.jpg" alt="User name" class="img-circle img-user">
                        </a>
                    </div>
                    <div class="col-xs-9 col-sm-10 info-user">
                        <h3><a href="personal-profile.php" title="User Profile">My User</a></h3>
                        <p><i>2h</i></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2 data-post">
                        <p>Nice</p>
                        Video here
                        <video controls>
                            <source src="img/post-video.mp4" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                        <div class="reaction">
                            &#x2764; 1234 &#x1F603; 54
                        </div>
                        <div class="comments">
                            <div class="more-comments">View more comments</div>
                            <ul>
                                <li><b>User1</b> Nice</li>
                                <li><b>User2</b> Nice &#x1F602;</li>
                            </ul>
                            <form>
                                <input type="text" class="form-control" placeholder="Add a comment">
                            </form>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
        <!--Close #posts-container-->
        <div id="loading">
            <img src="img/load.gif" alt="loader">
        </div>
    </div>
    <!-- Close #posts -->
    <!-- Modal container for settings--->
    <div id="settingsmodal" class="modal fade text-center">
        <div class="modal-dialog">
            <div class="modal-content">
            </div>
        </div>
    </div>



<!-- publish script start -->
<script type="text/javascript">
$(document).ready(function() {
     $(':input[type="submit"]').prop('disabled', true);
     $('input[type="text"]').keyup(function() {
        if($(this).val() != '') {
           $(':input[type="submit"]').prop('disabled', false);
        }
     });
 });


     $(document).ready(function(){
       var form = $('#myform');
       $('#submit').click(function(e){
           e.preventDefault();
        $.ajax({
           url: form.attr("action"),
           type: 'post',
           dataType:'json',
           data: $("#myform input").serialize(),
           success: function(data){
               
               if(data['status']){
                   //alert(data['message']);
                   location.reload();
               }
           }
        });
       });
     });

  </script>
// publish script ends
</body>


</html>