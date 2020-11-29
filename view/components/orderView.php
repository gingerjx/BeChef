<form id="order-container" action="../service/orderBy.php" method="post">
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
      <input type="submit" value="Order by">
    <div>
</form>