<aside id="search-box">
<button id="rewind-panel">Search <img src="view/images/filter.svg" alt="Down arrow icon"/></button>
<form id="search-form" action="#" method="get">
    <div id="sort-by-box" class="search-component">
        <h4>Sort by</h4>
        <label id="order-label">Order &#8599</label>  <!-- &#8600 -->
        <input id="order" type="checkbox" name="order">
        <div id="radio-box">
            <div>
                <input type="radio" name="order-by" value="none"  checked="checked">
                <label>None</label>
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
        </div>
    </div>
    <input id="order-submit" type="submit" value="Order by"/>
    <div id="filter-by-box" class="search-component">
        <h4>Filter by</h4>
        <div id="text-input-box">
            <label>Title </label>
            <input type="search" name="title">
            <label>Author </label>
            <input type="search" name="author">
            <label>Tag </label>
            <input type="search" name="tag">
            <label>Country </label>
            <input type="search" name="country">
        </div>  
        <div id="vege-input">
            <div>
                <input type="radio" name="vegetarian" value="both" checked="checked">
                <label>Both</label>
                <input type="radio" name="vegetarian" value="yes">
                <label>Yes</label>
                <input type="radio" name="vegetarian" value="no">
                <label>No</label>
            </div>
            <label>Vegetarian:</label>
        </div>
        <div id="diff-input" class="range-input">
            <div class="range-input-label">
            <span id="diff-min" class="slider-value">1</span> 
            <span>Difficulty level</span>
            <span id="diff-max" class="slider-value">5</span>
            </div>
            <div id="diff-slider"></div>
        </div>
        <div id="avg-cost-input" class="range-input">
            <div class="range-input-label">
            <span id="avg-cost-min" class="slider-value">0.01</span> 
            <span>Average cost</span>
            <span id="avg-cost-max" class="slider-value">1000</span>
            </div>
            <div id="avg-cost-slider"></div>
        </div>
        <div id="ppl-num-input" class="range-input">
            <div class="range-input-label">
            <span id="ppl-num-min" class="slider-value">1</span> 
            <span>People number</span>
            <span id="ppl-num-max" class="slider-value">10</span>
            </div>
            <div id="ppl-num-slider"></div>
        </div>
        <div id="kcal-input" class="range-input">
            <div class="range-input-label">
            <span id="kcal-min" class="slider-value">1</span> 
            <span>Kcal per person</span>
            <span id="kcal-max" class="slider-value">8000</span>
            </div>
            <div id="kcal-slider"></div>
        </div>
    </div>
    <input id="filter-submit" type="submit" value="Filter by"/>
</form>
<script src="view/script/search.js"></script>
</aside>