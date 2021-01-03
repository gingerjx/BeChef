<a class="card" href="<?= 'recipe.php?recipeID='.$rec->getRecipeID() ?>">
    <div class="image-cropper">
        <img src="<?= 'view/images/recipes/'.$rec->getImagePath() ?>" alt="Recipe image" /> <!-- Recipes image -->
    </div>
    <div class="ratings">
    <div class="img-number">
        <?php if ($user != null && isLikedByUser($rec->getRecipeID(), $user->getID())): ?>
            <img src="view/images/heart-red.svg" alt="Red heart"/>
        <?php else: ?>
            <img src="view/images/heart.svg" alt="White heart"/>
        <?php endif; ?>
        <b> <?= getNumberOfRecipeLikes($rec->getRecipeID()) ?> </b>
    </div>
    <div class="img-number">
        <?php if ($user != null && isLikedByUser($rec->getRecipeID(), $user->getID())): ?>
            <img src="view/images/disk-yellow.svg" alt="Yellow heart"/>
        <?php else: ?>
            <img src="view/images/disk.svg" alt="White disk"/>
        <?php endif; ?>
        <b> <?= getNumberOfRecipeSaves($rec->getRecipeID()) ?> </b>
    </div>
    <div class="img-number">
        <img src="view/images/comment.svg" alt="Comment cloud"/>
        <b> <?= getNumberOfRecipeComments($rec->getRecipeID()) ?> </b>
    </div>
    </div>
    <h2> <?= $rec->getTitle() ?> </h2>
</a>