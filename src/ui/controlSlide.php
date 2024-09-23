<!-- Sidebar container -->
<div id="slideLeft" class="slideLeft"> 
    <!-- Hamburger menu button -->
    <button id="menuBurger"> 
        <!-- Visual representation of the menu -->
        <div id="burgerDiv" class="burgerDiv"></div> 
    </button>

    <!-- User profile information section -->
    <div class="profileInfo"> 
        <!-- Placeholder for user profile photo -->
        <div class="profilePhoto"></div> 
        <!-- Welcome message with user name -->
        <div class="profileName">wellcome <?= $_SESSION['name'] ?></div> 
    </div>

    <!-- Menu links container -->
    <div> 
        <a href="admin.php"> <!-- Link to the admin dashboard -->
            <div class="menuList">Dashboard</div>
        </a>
        <a href="createUser.php"> <!-- Link to create a new user -->
            <div class="menuList">Create user</div>
        </a>
        <a href="userList.php"> <!-- Link to view user list -->
            <div class="menuList">Users List</div>
        </a>
        <a href="category.php"> <!-- Link to gallery categories -->
            <div class="menuList">Gallery</div>
        </a>
    </div>

    <!-- Link to sign out -->
    <a class="menuList" href="controllers/logout.php">sign out</a> 
</div>
