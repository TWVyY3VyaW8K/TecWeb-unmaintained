<div class="menu" id="Topnav">
<div class="container1024">
  <a class="imageLink" href="index.php"><img src="Images/logo.png" alt="Logo"/></a>
  <ul>
    <li class="firstMenuItem <?php if(basename($_SERVER['PHP_SELF'])=="index.php")echo "activeMenuItem";?>"><a href="index.php">Home</a></li>
    <li><a href="index.php#team">Team</a></li>
    <li <?php if(basename($_SERVER['PHP_SELF'])=="gallery.php")echo 'class="activeMenuItem"';?> ><a href="gallery.php">Gallery</a></li>
    <li <?php if(basename($_SERVER['PHP_SELF'])=="upload.php")echo 'class="activeMenuItem"';?> ><a href="upload.php">Upload</a></li>
    <li <?php if(basename($_SERVER['PHP_SELF'])=="likedItems.php")echo 'class="activeMenuItem"';?> >
      <?php
        session_start();
        //Se l'utente è loggato allora può vedere i suoi preferiti
        if(isset($_SESSION['Username'])){
          echo '<a href="likedItems.php">Liked Images</a>';
        }
      ?>
    </li>
    <li <?php if(basename($_SERVER['PHP_SELF'])=="userItems.php")echo 'class="activeMenuItem"';?> >
      <?php
        if(isset($_SESSION['Username'])){
          echo '<a href="userItems.php">Your Images</a>';
        }
      ?>
    </li>
    <li>
      <a class="btnSearch" href="#" onclick="openSearchModal()"><span class="searchIcon"></span></a>
    </li>
    <li class="user">
      <?php //To Sign in or edit profile of User
        if(isset($_SESSION['Username']))
          echo '<a href="#" onclick="openEditProfileModal()">Edit Profile: '.$_SESSION["Username"].'</a>';
        else
          echo '<a href="#" onclick="openSignUpModal()" >Sign Up</a>';
      ?>
  </li> 
    <li class="user">
      <?php
        if(isset($_SESSION['Username']))
          echo '<a href="#" onclick="doLogOut()" >Log Out</a>';
        else
          echo '<a href="#" onclick="openLoginModal()">Login</a>';
      ?>
    </li>
    <li class="hamburgerMenu">
        <div class="hamburgerMenuContainer" onclick="openDrobDownMenu(this)">
          <div class="line1"></div>
          <div class="line2"></div>
          <div class="line3"></div>
        </div>
    </li>
  </ul>
  </div>
</div>