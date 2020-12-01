<aside>
<form action="../service/orderBy.php" method="post">
    <div id="radio-container">
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
    <div>
</form>
</aside>
