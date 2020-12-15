<nav>
    <div id="web-logo">
        <button id="show-nav" onclick="toggleNav()">
            <img src="view/images/menu.svg" alt="Menu"/>
        </button>
        <img src="view/images/cooking.svg" alt="Logo"/>
        <h3>BeChef</h3>
    </div>

    <div id="links">
        <a href="#">
            <img src="view/images/new.svg" alt="The newest"/>
            The Newest
        </a>
        <a href="#">
            <img src="view/images/trending.svg" alt="Popular"/>
            Popular
        </a>
        <a href="#">
            <img src="view/images/magnifying-glass.svg" alt="Search"/>
            Search
        </a>

        <hr class="separator">

        <!-- if not logged -->
        <button id="sign-in">Sign in</button>
        <button id="sign-up">Sign up</button>
        <!-- else -->
        <a href="#">
            <img src="view/images/floppy-disk.svg" alt="Save"/>
            Saves
        </a>
        <a href="#">
            <img src="view/images/add.svg" alt="Add"/>
            Add
        </a>
        <a href="#">
            <img src="view/images/recipe-book.svg" alt="User recipes"/>
            Your recipes
        </a>
        <a href="#">
            <img src="view/images/settings.svg" alt="Settings"/>
            Settings
        </a>
        <a href="#">
            <img src="view/images/arrow.svg" alt="Logout"/>
            Logout
        </a>
        <!--  -->
    </div>
    <script type="text/javascript" src="view/script/nav.js?v=<?php echo time(); ?>"></script>
</nav>