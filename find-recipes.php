<div class="container">
  <div id="remove-padding" class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
    <div id="page-title-responsive" class="desc">
      <div class="desc2">
        <?php if (is_page('recipe-details')): ?>
          <h3 id="page-title" style="text-transform: uppercase;">Recipe Details Page</h3>
        <?php else: ?>
          <h3 id="page-title" style="text-transform: uppercase;"><?php the_title(); ?> Page</h3>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div id="find-recipes-button-padding" class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
    <button id="find-recipes" class="" name="button" type="button">Find Recipes &gt;</button>
  </div>
</div>
<form class="search-form" style="margin:0;" action="search" method="get">
  <div class="search-recipe-fields">
    <div class="container">
      <div id="search-recipe-fields-row" class="row">
        <div id="ingredient-xs" class="col-xs-6 col-sm-3 col-md-3 col-lg-3"><label>Ingredient</label>
          <input class="search-img" name="search" type="text" value="" placeholder="Any Ingredient" />
        </div>
        <div id="course-xs" class="col-xs-6 col-sm-3 col-md-3 col-lg-3"><label>Course</label>
          <select class="basic" name="search_course">
            <option value="">Any Course</option>
            <option value="MainCourse">Main Course</option>
            <option value="SideDish">Side Dish</option>
            <option value="Soup">Soup</option>
            <option value="Salad">Salad</option>
            <option value="Dessert">Dessert</option>
            <option value="Other">Other</option>
          </select>
        </div>
        <div id="cuisine-xs" class="col-xs-6 col-sm-3 col-md-3 col-lg-3"><label>Cuisine</label>
          <select class="basic" name="search_cuisine">
            <option value="">Any Cuisine</option>
            <option value="Italian">Italian</option>
            <option value="Mexican">Mexican</option>
            <option value="Greek">Greek</option>
            <option value="Chinese">Chinese</option>
            <option value="Balcanian">Balcanian</option>
            <option value="Other">Other</option>
          </select>
        </div>
        <div id="skill-xs" class="col-xs-6 col-sm-3 col-md-3 col-lg-3"><label>Skill Level</label>
          <select class="basic" name="search_time">
            <option value="">Any Skill Level</option>
            <option value="Basic">Basic</option>
            <option value="Medium">Medium</option>
            <option value="Advance">Advance</option>
          </select>
        </div>
        <button id="search-recipes" name="submit-search" type="submit" value="Search source code">Search</button>
      </div>
    </div>
  </div>
</form>
