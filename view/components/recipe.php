<main id="recipe">
    <div id="general-info">
      <div>
        <h1><?= $rec->getTitle() ?></h1>
        <p><?= $rec->getDescription() ?></p>
        <span>author:  <?= $author->getFullname() ?></span>
        <span>add date:  <?= $rec->getAddDate() ?></span>
        <span>difficulty: 
          <?php 
            $difficulty = $rec->getDifficultyLevel();
            for($i = 0; $i<$difficulty; $i++) 
              echo '<img src="view/images/circle.svg" alt="Difficulty level"/>';
          ?>
        </span>
        <div id="recipe-ratings">
          <div>
            <button>
              <?php if ($user != null && isLikedByUser($recipeID, $user->getID())): ?>
                <img src="view/images/heart-red.svg" alt="Red heart icon"/>
              <?php else: ?>
                <img src="view/images/heart.svg" alt="Heart icon"/>
              <?php endif; ?>
            </button>
            <b><?= getNumberOfRecipeLikes($rec->getRecipeID()) ?></b>
          </div>
          <div>
            <button>
              <?php if ($user != null && isSavedByUser($recipeID, $user->getID())): ?>
                <img src="view/images/disk-yellow.svg" alt="Yellow disk icon"/>
              <?php else: ?>
                <img src="view/images/disk.svg" alt="Dsik icon"/>
              <?php endif; ?>
            </button>
            <b><?= getNumberOfRecipeSaves($rec->getRecipeID()) ?></b>
          </div>
          <div>
            <button>
              <img src="view/images/comment.svg" alt="Comment icon"/>
            </button>
            <b><?= getNumberOfRecipeComments($rec->getRecipeID()) ?></b>
          </div>
        </div>
      </div>
      <img src="view/images/recipes/<?= $rec->getImagePath() ?>" alt="Recipe image" />
    </div>
    <div id="recipe-properties">
      <div class="property">
        <img src="view/images/chronometer.svg" alt="Add icon" />
        <b><?= $rec->getPreparationTime() ?></b>
        <p>Preparation Time (min)</p>
      </div>
      <div class="property">
        <img src="view/images/money.svg" alt="Add icon" />
        <b><?= $rec->getAverageCost() ?></b>
        <p>Average Cost ($)</p>
      </div>
      <div class="property">
        <img src="view/images/coronavirus.svg" alt="Add icon" />
        <b><?= $rec->getCountry() ?></b>
        <p>Country</p>
      </div>
      <div class="property">
        <img src="view/images/vegetarian.svg" alt="Add icon" />
        <b><?php if ($rec->getVegetarian() == 1) echo 'Yes';
                 else echo 'No'; ?></b>
        <p>Vegetarian</p>
      </div>
      <div class="property">
        <img src="view/images/community.svg" alt="Add icon" />
        <b><?= $rec->getPeopleNumber() ?></b>
        <p>Number of people</p>
      </div>
      <div class="property">
        <img src="view/images/calories.svg" alt="Add icon" />
        <b><?= $rec->getKcalPerPerson() ?></b>
        <p>Kcal per person</p>
      </div>
    </div>
    <div id="ingredients-recipes">
      <section>
        <h2>Ingredients</h2>
        <ul>
          <?php foreach ($rec->getIngredients() as $ingredient) : ?>
            <li><?= $ingredient ?></pli>
          <?php endforeach ?>
        </ul>
      </section>
      <section>
        <h2>Preparation</h2>
        <ul>
          <?php foreach ($rec->getPreparation() as $preparation) : ?>
            <li><?= $preparation ?></pli>
          <?php endforeach ?>
        </ul>
      </section>
    </div>
    <div id="recipe-tags">
      <?php foreach ($rec->getTags() as $tag) : ?>
        <p><?= $tag ?></p>
      <?php endforeach ?>
    </div> 
    <div id="recipe-comments">
      <h2>Comments</h2>
      <?php foreach ($comments as $com) : ?>
        <div class="comment-title">
          <b><?= $com->getFullname() ?></b>
          <span><?= $com->getAddDate() ?></span>
        </div>
        <p class="comment-content"><?= $com->getContent() ?></p>
      <?php endforeach ?>
      
      <h3>Add comment</h3>
      <?php if($user != null) : ?>
        <textarea id="add-comment-content" placeholder="Add comment"></textarea>
        <button id="add-comment">Comment</button>
      <?php else : ?>
        <textarea id="add-comment-content" placeholder="Sign in to comment"></textarea>
        <button id="add-comment">Sign in</button>
      <?php endif; ?>
    </div>
  </main>