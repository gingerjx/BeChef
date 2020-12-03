<script src="js/slider.js"></script>
<aside>
  <form id="order-container" action="../service/orderBy.php" method="post">
    <div>
      <input type="checkbox" name="order" value="order">
      <label for="order">Ascending</label><br>
    </div>
    <div>
      <input type="radio" name="order-by" value="add-date">
      <label for="add-date">Add date</label><br>
    </div>
    <div>
      <input type="radio" name="order-by" value="likes">
      <label for="likes">Likes</label><br>
    </div>
    <div>
      <input type="radio" name="order-by" value="saves">
      <label for="saves">Saves</label>
    </div>
    <div>
      <input type="radio" name="order-by" value="title">
      <label for="title">Title</label>
    </div>
    <div>
      <input type="radio" name="order-by" value="cost">
      <label for="title">Average cost</label>
    </div>
    <div>
      <input type="radio" name="order-by" value="difficulty">
      <label for="title">Difficulty level</label>
    </div>
    <div>
      <input type="radio" name="order-by" value="people">
      <label for="title">Number of people</label>
    </div>
    <div>
      <input type="radio" name="order-by" value="kcal">
      <label for="title">Kcal per person</label>
    </div>

    <input type="submit" value="Order by">
  </form>

  <form id="search-container" action="../service/searchBy.php" method="post">
    <label for="title">Title:</label>
    <input type="search" name="title">

    <label for="tag">Tag:</label>
    <input type="search" name="tag">

    <div>
      <input id="diff-box" type="checkbox" name="diff-box">
      <label id="diff-label" for="diff">Max difficulty level <b>5</b>:</label>
      <input type="range" min="1" max="5" value="5" name="diff"
              oninput="showMaxDiffValue(this.value)" onchange="showMaxDiffValue(this.value)">
    </div>

    <div>
      <input id="cost-box" type="checkbox" name="cost-box">
      <label id="cost-label" for="cost">Max cost <b>1000$</b>:</label>
      <input type="range" min="1" max="1000" value="1000" name="cost"
              oninput="showMaxCostValue(this.value)" onchange="showMaxCostValue(this.value)">
    </div>

    <div>
      <input id="people-box" type="checkbox" name="people-box">
      <label id="people-label" for="people">Max number of people <b>10</b>:</label>
      <input type="range" min="1" max="10" value="10" name="people"
              oninput="showMaxPeopleValue(this.value)" onchange="showMaxPeopleValue(this.value)">
    </div>

    <div>
      <input id="kcal-box" type="checkbox" name="kcal-box">
      <label id="kcal-label" for="kcal">Max number of kcal per person <b>8000</b>:</label>
      <input type="range" min="1" max="8000" value="8000" name="kcal"
              oninput="showMaxKcalValue(this.value)" onchange="showMaxKcalValue(this.value)">
    </div>

    <input type="submit" value="Search by">
  </form>

</aside>