<div id="recipes-container">
  <?php foreach ($recipes as $rec) : ?>
    <a class="card" href="<?= 'recipeView.php?recipeID='.$rec->getRecipeID() ?>">
      <img src="<?= $rec->getImagePath() ?>"></img>
      <div class="ratings">
        <div class="img-number">
          <? if ($user != null && isLikedByUser($rec->getRecipeID(), $user->getID())): ?>
            <img src="img/thumbs-up-orange.svg" alt="Web icon"/>
          <? else: ?>
            <img src="img/thumbs-up.svg" alt="Web icon"/>
          <? endif; ?>
          <b> <?= getNumberOfRecipeLikes($rec->getRecipeID()) ?></b>
        </div>
        <div class="img-number">
          <? if ($user != null && isSavedByUser($rec->getRecipeID(), $user->getID())): ?>
            <img src="img/disk-orange.svg" alt="Web icon"/>
          <? else: ?>
            <img src="img/disk.svg" alt="Web icon"/>
          <? endif; ?>
          <b><?= getNumberOfRecipeSaves($rec->getRecipeID()) ?></b>
        </div>
        <div class="img-number">
          <img src="img/comment.svg" alt="Web icon"/>
          <b><?= getNumberOfRecipeComments($rec->getRecipeID()) ?></b>
        </div>
      </div>
      <h2><?= $rec->getTitle() ?></h2>
    </a>
  <?php endforeach ?>
</div>
