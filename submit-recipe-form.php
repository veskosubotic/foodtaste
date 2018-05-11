<?php
if (!defined('submit-recipe-form')) {
  exit();
}
?>
<?php
echo '
<div class="submit-recipe-form">
<form class="submit-form" id="submit-form" method="post" enctype="multipart/form-data"><br>
<input type="hidden" name="p_author" value="">
<label>Recipe Title</label><br>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="submit-form-inputs">
<input type="text" id="p_title" name="p_title" value="">
</div>
<label>Short Description</label><br>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="submit-form-inputs">
<textarea id="p_short" name="p_short"></textarea>
</div>
<label>Recipe Image</label>
<div class="upload">
<label style="position: absolute; left: 0; right: 0; bottom: 70px;" for="file"><span id="label-span">Select Image</span></label><br>
<label style="position: absolute; left:0; right: 0; bottom: 40px; font-weight: 300;" for="file"><span id="label-span">Upload Recipe Image</span></label><br>
<input type="file" name="image_upload" id="file"  value="">
</div>
<div class="txt">
<label>Ingredients</label><br>
<div class="row start-xs start-sm start-md start-lg">
<div class="col-xs-10 col-sm-11 col-md-11 col-lg-11" id="submit-form-inputs">
<input type="text" class="ingredient-step" name="p_ingredients" value="">
</div>
<input type="hidden" name="p_ingredients1" value="">
<input type="hidden" name="p_ingredients2" value="">
<input type="hidden" name="p_ingredients3" value="">
<input type="hidden" name="p_ingredients4" value="">
<input type="hidden" name="p_ingredients5" value="">
<input type="hidden" name="p_ingredients6" value="">
<input type="hidden" name="p_ingredients7" value="">
<input type="hidden" name="p_ingredients8" value="">
<input type="hidden" name="p_ingredients9" value="">
<input type="hidden" name="p_ingredients10" value="">
<input type="hidden" name="p_ingredients11" value="">
<input type="hidden" name="p_ingredients12" value="">
<input type="hidden" name="p_ingredients13" value="">
<input type="hidden" name="p_ingredients14" value="">
<input type="hidden" name="p_ingredients15" value="">
<input type="hidden" name="p_ingredients16" value="">
<input type="hidden" name="p_ingredients17" value="">
<input type="hidden" name="p_ingredients18" value="">
<input type="hidden" name="p_ingredients19" value="">
<input type="hidden" name="p_ingredients20" value="">
<input type="hidden" name="p_ingredients21" value="">
<input type="hidden" name="p_ingredients22" value="">
<input type="hidden" name="p_ingredients23" value="">
<input type="hidden" name="p_ingredients24" value="">
<input type="hidden" name="p_ingredients25" value="">
<input type="hidden" name="p_ingredients26" value="">
<input type="hidden" name="p_ingredients27" value="">
<input type="hidden" name="p_ingredients28" value="">
<input type="hidden" name="p_ingredients29" value="">
<input type="hidden" name="p_ingredients30" value="">
<input type="hidden" name="p_ingredients31" value="">
<input type="hidden" name="p_ingredients32" value="">
<input type="hidden" name="p_ingredients33" value="">
<input type="hidden" name="p_ingredients34" value="">
<input type="hidden" name="p_ingredients35" value="">
<input type="hidden" name="p_ingredients36" value="">
<input type="hidden" name="p_ingredients37" value="">
<input type="hidden" name="p_ingredients38" value="">
<input type="hidden" name="p_ingredients39" value="">
<input type="hidden" name="p_ingredients40" value="">
<input type="hidden" name="p_ingredients41" value="">
<input type="hidden" name="p_ingredients42" value="">
<input type="hidden" name="p_ingredients43" value="">
<input type="hidden" name="p_ingredients44" value="">
<input type="hidden" name="p_ingredients45" value="">
<input type="hidden" name="p_ingredients46" value="">
<input type="hidden" name="p_ingredients47" value="">
<input type="hidden" name="p_ingredients48" value="">
<input type="hidden" name="p_ingredients49" value="">
<input type="hidden" name="p_ingredients50" value="">
<input type="file" style="display:none;" name="image_upload1" value="">
<input type="file" style="display:none;" name="image_upload2" value="">
<input type="file" style="display:none;" name="image_upload3" value="">
<input type="file" style="display:none;" name="image_upload4" value="">
<input type="file" style="display:none;" name="image_upload5" value="">
<input type="file" style="display:none;" name="image_upload6" value="">
<input type="file" style="display:none;" name="image_upload7" value="">
<input type="file" style="display:none;" name="image_upload8" value="">
<input type="file" style="display:none;" name="image_upload9" value="">
<input type="file" style="display:none;" name="image_upload10" value="">
<input type="file" style="display:none;" name="image_upload11" value="">
<input type="file" style="display:none;" name="image_upload12" value="">
<input type="file" style="display:none;" name="image_upload13" value="">
<input type="file" style="display:none;" name="image_upload14" value="">
<input type="file" style="display:none;" name="image_upload15" value="">
<div class="col-xs-2 col-sm-1 col-md-1 col-lg-1" style="padding-left: 0; padding-right:0; text-align: right; padding-top: 10px;">
<button type="button" id="add" name="button">+</button>
</div>
</div>
</div>
<label>Step 1</label><br>
<div class="txta">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="submit-form-inputs">
<textarea class="ingredient-step" name="p_steps" id="txta"></textarea>
</div>
<div class="row center-xs start-sm start-md start-lg">
<div class="col-xs-6 col-sm-5 col-md-5 col-lg-5" id="step-image-upload">
<label style="font-weight: 300;" for="upload-step-image-input"><span id="label-spann">Upoad Step Image</span></label>
<input type="file" name="image_upload1" value="" id="upload-step-image-input">
</div>
<div class="col-xs-2 col-sm-2 col-md-2 col-lg-1" id="upload-step-image-button">
<button type="button" id="addtxta" name="button">+</button><br>
</div>
</div>
</div>
<input type="hidden" name="p_steps1" id="txta">
<input type="hidden" name="p_steps2" id="txta">
<input type="hidden" name="p_steps3" id="txta">
<input type="hidden" name="p_steps4" id="txta">
<input type="hidden" name="p_steps5" id="txta">
<input type="hidden" name="p_steps6" id="txta">
<input type="hidden" name="p_steps7" id="txta">
<input type="hidden" name="p_steps8" id="txta">
<input type="hidden" name="p_steps9" id="txta">
<input type="hidden" name="p_steps10" id="txta">
<input type="hidden" name="p_steps11" id="txta">
<input type="hidden" name="p_steps12" id="txta">
<input type="hidden" name="p_steps13" id="txta">
<input type="hidden" name="p_steps14" id="txta">
<div class="row center-xs center-sm start-md start-lg around-sm between-md between-lg" id="servings">
<div class="col-xs-8 col-sm-6 col-md-6 col-lg-6" id="left-padding">
<label>Yield</label><br>
<input type="text" name="p_yield" value="">
</div>
<div class="col-xs-8 col-sm-6 col-md-6 col-lg-6" id="right-padding">
<label>Servings</label>
<input type="text" name="p_servings" value="">
</div>
</div>
<div class="row center-xs center-sm start-md start-lg around-sm between-md between-lg" id="time">
<div class="col-xs-8 col-sm-3 col-md-3 col-lg-3">
<label>Preparation Time</label>
<input type="text" name="p_prepare" value="">

</div>
<div class="col-xs-8 col-sm-3 col-md-3 col-lg-3">
<label>Cook Time</label>
<input type="text" name="p_cook" value="">

</div>
<div class="col-xs-8 col-sm-3 col-md-3 col-lg-3">
<label>Ready In</label><br>
<input type="text" name="p_ready" value="">

</div>
</div>
<label>Tags</label><br>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="submit-form-inputs">
<input type="text" id="tags" name="p_tags" value="" onkeyup="checkWordLen(this);">
</div>
<div class="row center-xs center-sm start-md start-lg around-sm between-md between-lg" id="select">
<div class="col-xs-8 col-sm-6 col-md-6 col-lg-6" id="left-padding">
<label>Cuisine</label><br>
<select class="basic" name="p_cuisine">
<option value="">None</option>
<option value="Italian">Italian</option>
<option value="Mexican">Mexican</option>
<option value="Greek">Greek</option>
<option value="Chinese">Chinese</option>
<option value="Balcanian">Balcanian</option>
<option value="Other">Other</option>
</select>
</div>
<div class="col-xs-8 col-sm-6 col-md-6 col-lg-6" id="right-padding">
<label>Course</label><br>
<select class="basic" name="p_course">
<option value="">None</option>
<option value="MainCourse">Main Course</option>
<option value="SideDish">Side Dish</option>
<option value="Soup">Soup</option>
<option value="Salad">Salad</option>
<option value="Dessert">Dessert</option>
<option value="Other">Other</option>
</select>
</div>
</div>
<div class="row center-xs center-sm start-md start-lg around-sm between-md between-lg" id="select">
<div class="col-xs-8 col-sm-6 col-md-6 col-lg-6" id="left-padding">
<label>Skill Level</label><br>
<select class="basic" name="p_skill">
<option value="">None</option>
<option value="Basic">Basic</option>
<option value="Medium">Medium</option>
<option value="Advance">Advance</option>
</select>
</div>
<div class="col-xs-8 col-sm-6 col-md-6 col-lg-6" id="right-padding">
<label>Type</label><br>
<select class="basic" name="p_type">
<option value="">None</option>
<option value="Breakfast">Breakfast</option>
<option value="Starter">Starter</option>
<option value="Lunch">Lunch</option>
<option value="Dinner">Dinner</option>
<option value="Desert">Desert</option>
</select>
</div>
</div>
<input class="f" type="submit" id="submit" name="submit-your-recipe" value="Submit Your Recipe">
<p class="form-message"></p>
</form>
</div>
';
