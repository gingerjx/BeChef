<script src="js/slider.js"></script>
<aside>
  <form id="order-container" action="../service/orderBy.php" method="post">
    <div>
      <input type="checkbox" name="order" value="order">
      <label>Ascending</label><br>
    </div>
    <div>
      <input type="radio" name="order-by" value="add-date">
      <label>Add date</label><br>
    </div>
    <div>
      <input type="radio" name="order-by" value="likes">
      <label>Likes</label><br>
    </div>
    <div>
      <input type="radio" name="order-by" value="saves">
      <label>Saves</label>
    </div>
    <div>
      <input type="radio" name="order-by" value="title">
      <label>Title</label>
    </div>
    <div>
      <input type="radio" name="order-by" value="cost">
      <label>Average cost</label>
    </div>
    <div>
      <input type="radio" name="order-by" value="difficulty">
      <label>Difficulty level</label>
    </div>
    <div>
      <input type="radio" name="order-by" value="people">
      <label>Number of people</label>
    </div>
    <div>
      <input type="radio" name="order-by" value="kcal">
      <label>Kcal per person</label>
    </div>

    <input type="submit" value="Order by">
  </form>

  <form id="search-container" action="../service/searchBy.php" method="post">
    <label>Title:</label>
    <input type="search" name="title">

    <label>Author:</label>
    <input type="search" name="author">

    <label>Tag:</label>
    <input type="search" name="tag">

    <label>Country:</label>
    <input type="search" name="country">

    <label>Vegetarian:</label>
    <div>
      <input type="radio" name="vegatarian" value="yes">
      <label>Yes</label>
      <input type="radio" name="vegatarian" value="no">
      <label>No</label>
    </div>

    <div>
      <input id="diff-box" type="checkbox" name="diff-box">
      <label id="diff-label">Max difficulty level <b>5</b>:</label>
      <input type="range" min="1" max="5" value="5" name="diff"
              oninput="showMaxDiffValue(this.value)" onchange="showMaxDiffValue(this.value)">
    </div>

    <div>
      <input id="cost-box" type="checkbox" name="cost-box">
      <label id="cost-label">Max cost <b>1000$</b>:</label>
      <input type="range" min="1" max="1000" value="1000" name="cost"
              oninput="showMaxCostValue(this.value)" onchange="showMaxCostValue(this.value)">
    </div>

    <div>
      <input id="people-box" type="checkbox" name="people-box">
      <label id="people-label">Max number of people <b>10</b>:</label>
      <input type="range" min="1" max="10" value="10" name="people"
              oninput="showMaxPeopleValue(this.value)" onchange="showMaxPeopleValue(this.value)">
    </div>

    <div>
      <input id="kcal-box" type="checkbox" name="kcal-box">
      <label id="kcal-label">Max number of kcal per person <b>8000</b>:</label>
      <input type="range" min="1" max="8000" value="8000" name="kcal"
              oninput="showMaxKcalValue(this.value)" onchange="showMaxKcalValue(this.value)">
    </div>

    <input type="submit" value="Search by">
  </form>

</aside>