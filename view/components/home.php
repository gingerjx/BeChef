<main id="home">
    <article id="home-welcome">
        <img src="view/images/recipe-book.svg" alt="recipe book"/>
        <div>
            <h1>Welcome at BeChef</h1> 
            <h3>Discover all the flavors of the world and share your own!</h3>
            <h4>More than <span><?= getNumberOfRecipes()?></span> of recipes available at one place</h4>
            <h4>Around <span><?= getNumberOfUsers()?></span> active users</h4> 
        </div>
    </article>
    <article id="home-newest">
        <div>
            <h1><span>New</span> recipes everyday</h1> 
            <h3>No inspiration? Check recipes uploaded by other chefs and prepare amazing meals for yourself and your family</h3>
        </div>
        <a href="newest.php">
            <img src="view/images/new.svg" alt="new icon"/>
        </a>
    </article>
    <article id="home-description">
        <div>
            <a href="popular.php">
                <img src="view/images/trending.svg" alt="trending icon"/>
            </a> 
            <h3>Be up to date with people tastes with easy access to the most popular recipes on our website</h3>
        </div>
        <div>
            <a href="search.php">
                <img src="view/images/magnifying-glass.svg" alt="glass icon"/>
            </a> 
            <h3>Use our search engine to find dishes that match your preferences</h3>
        </div>
        <div>
            <a href="login.php">
                <img src="view/images/cooking.svg" alt="chef icon"/>
            </a> 
            <h3>Become a culinary artist and participate in BeChef comunnity life by sharing your recipes, rewarding other chefs and saving the best dishes for later</h3>
        </div>
    </article>
</main>
