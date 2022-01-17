        <!DOCTYPE html>
<html lang="en">
  <head>
      <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <meta charset="utf-8">
    <title>vistaTube</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="red's site built in bootstrap 1.4.0">
    <meta name="author" content="redst0netech, thewinapi">

    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <![endif]-->

    <!-- Le styles -->
    <link href="https://redst0ne.xyz/bootstrap.min.css" rel="stylesheet">
    <link href="https://s.imon.fr/css3-youtube-buttons/yt-buttons.css" rel="stylesheet">
    <style type="text/css">
      /* Override some defaults */
      html, body {
        background-color: #eee;
      }
      body {
        padding-top: 40px; /* 40px to make the container go all the way to the bottom of the topbar */
      }
      .container > footer p {
        text-align: center; /* center align it with the container */
      }
      .container {
        width: 820px; /* downsize our container to make the content feel a bit tighter and more cohesive. NOTE: this removes two full columns from the grid, meaning you only go to 14 columns and not 16. */
      }

      /* The white background content wrapper */
      .container > .content {
        background-color: #fff;
        padding: 20px;
        margin: 0 -20px; /* negative indent the amount of the padding to maintain the grid system */
        -webkit-border-radius: 0 0 6px 6px;
           -moz-border-radius: 0 0 6px 6px;
                border-radius: 0 0 6px 6px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.15);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.15);
                box-shadow: 0 1px 2px rgba(0,0,0,.15);
      }

      /* Page header tweaks */
      .page-header {
        background-color: #f5f5f5;
        padding: 20px 20px 10px;
        margin: -20px -20px 20px;
      }

      /* Styles you shouldn't keep as they are for displaying this base example only */
      .content .span10,
      .content .span4 {
        min-height: 500px;
      }
      /* Give a quick and non-cross-browser friendly divider */
      .content .span4 {
        margin-left: 0;
        padding-left: 19px;
        border-left: 1px solid #eee;
      }

      .topbar .btn {
        border: 0;
      }
      
      .logost {
                font-family: 'Red Hat Display', sans-serif;
      }

.video-thumbnail{
    flex: 0 0 120px;
    border: 1px solid var(--colw-1);
    outline: 1px solid var(--colg-2);
    background: var(--colb-1);
    width: 120px;
    height: 72px;
    padding: 0px;
    display: block;
    margin: auto;
    float: left;
}
.video-thumbnail video{
    width: 100%;
    height: 100%;
}
    </style>

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon" href="../assets/ico/bootstrap-apple-57x57.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../assets/ico/bootstrap-apple-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../assets/ico/bootstrap-apple-114x114.png">
  </head>

  <body>
<?php include 'db.php';?>
<?php include 'header.php';?>
    <!--<div class="topbar">
      <div class="fill">
        <div class="container">
          <a class="brand logost" href="#"><strong>RevTube</strong></a>
          <ul class="nav">
            <li class="active"><a href="//redst0ne.xyz">Home</a></li>
            <li><a href="videos.php">Videos</a></li>
            <li><a href="channels.php">Channels</a></li>
            <li><a href="community.php">Community</a></li>
          </ul>
          <form action="" class="pull-right">
            <input class="input-small" type="text" placeholder="Username">
            <input class="input-small" type="email" placeholder="Email">
            <input class="input-small" type="password" placeholder="Password">
            <button class="btn" type="submit">login</button>
          </form>
        </div>
      </div>
    </div>-->
    <div class="container">
 <div class="content">
        <div class="page-header">
            <div class="alert-message info">
  <a class="close" href="#">×</a>
  <p><strong>welcome to, vistaTube bootstrap 1.4.0 - part 2. </strong>please note this: this is still a WIP update or should i say BETA.</p>
</div>
          <h1>Channel <small><div id="clockbox"></div></small></h1>
          <script type="text/javascript">
var tday=["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
var tmonth=["January","February","March","April","May","June","July","August","September","October","November","December"];

function GetClock(){
var d=new Date();
var nday=d.getDay(),nmonth=d.getMonth(),ndate=d.getDate(),nyear=d.getFullYear();
var nhour=d.getHours(),nmin=d.getMinutes(),nsec=d.getSeconds(),ap;

if(nhour==0){ap=" AM";nhour=12;}
else if(nhour<12){ap=" AM";}
else if(nhour==12){ap=" PM";}
else if(nhour>12){ap=" PM";nhour-=12;}

if(nmin<=9) nmin="0"+nmin;
if(nsec<=9) nsec="0"+nsec;

var clocktext=""+tmonth[nmonth]+" "+ndate+", "+nyear+"";
document.getElementById('clockbox').innerHTML=clocktext;
}

GetClock();
setInterval(GetClock,1000);
</script>
        </div>
        <div class="row">
          <div class="span10">
        <div class="container-flex">
            <div class="col-2-3">
                <?php
                    $statement = $mysqli->prepare("SELECT `username`, `id`, `subscribers`, `verified` FROM `users` WHERE `id` = ? LIMIT 1");
                    $statement->bind_param("i", $_GET['id']);
                    $statement->execute();
                    $result = $statement->get_result();
                    while($row = $result->fetch_assoc()) {
                        $finalstring = "<h2>".$row['username']."</h2>
                        <!--<img class=\"user-pic\" src=\"pfp/".getUserPic($row["id"])."\">-->
                        <div class=\"user-info\">
                            <!--<div class=\"user-name\"><a href=\"profile.php?id=".$row["id"]."\">".$row["username"]."</a></div>-->
                            <div><h3><span class=\"black\">".$row["subscribers"]."</span> subscribers</h3></div>";
                            if($_SESSION["subscribedto".$row["id"]] === false) {
                                $finalstring .= "<div><a class\"btn danger\" href=\"subscribe.php?id=".$row["id"]."&u=0\"><!--<img src=\"buttonsub.png\">-->SUBSCRIBE</a></div>";
                            }
                            else{
                                $finalstring .= "<div><a class\"btn danger\"href=\"subscribe.php?id=".$row["id"]."&u=1\"><!--<img src=\"buttonunsub.png\">-->UNSUBSCRIBE</a></div>";
                            }
                                            if ($row['verified'] == 'TRUE') {
                    echo "
                <span class=\"label success\">Verified</span>
                ";
                }
                        $finalstring .= "</div>";

                        echo $finalstring;
                        $username = $row["username"];
                    }
                    $statement = $mysqli->prepare("SELECT * FROM `videos` WHERE `author` = ?");
                    $statement->bind_param("s", $username);
                    $statement->execute();
                    $result = $statement->get_result();
                    echo "<hr><h3>Videos</h3>";
                    if($result->num_rows !== 0){
                    while($row = $result->fetch_assoc()) {
                        echo '
                        <div class="video container-flex">
                                <div class="col-1-3 video-thumbnail">
                                <a href="watch.php?id='.$row['id'].'">
                                    <video>
                                        <source src="videos/'.$row['filename'].'" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video> 
                                </a>
                                </div>
                                <div class="col-1-3 video-title"><a href="watch.php?id='.$row['id'].'">'.$row['videotitle'].'</a></div>
                                <div class="col-1-3 video-info">
                                    <div><span>'.$row['views'].'</span> views</div>
                                    <div><span>'.$row['likes'].'</span> likes</div>
                                </div>
                            </div>
                            <hr>';
                    }
                    }
                    else{
                        echo("This channel has no videos.");
                    }
                    $statement->close();
                ?>
            </div>
        </div>
          </div>
          <div class="span4">
            <h3>Bio</h3>
                            <?php
                $statement = $mysqli->prepare("SELECT `description` FROM `users` WHERE `id` = ? LIMIT 1");
                $statement->bind_param("i", $_GET['id']);
                $statement->execute();
                $result = $statement->get_result();
                while($row = $result->fetch_assoc()) {
                    echo "<div class='card message'>
                    ".$row["description"]."
                    </div>";
                }
                $statement->close();
                ?>
            <!--<input class="input" type="text" placeholder="Username">
            <br>
            <input class="input" type="password" placeholder="Password">
            <br>
            <button class="btn" type="submit">login</button>-->
          </div>
        </div>
      </div>

      <footer>
        <p>&copy;Redst0ne 2012-2022</p>
      </footer>

    </div> <!-- /container -->

  </body>
</html>