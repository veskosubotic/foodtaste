// recipe image upload
$(document).ready(function(){
  $("#file").on("change", function(e){
    var filename = e.target.value.split('\\').pop();
    $("#label-span").text(filename);
  });

});

$(document).ready(function(){
  $("#upload-step-image-input").on("change", function(e){
    var filename = e.target.value.split('\\').pop();
    $("#label-spann").text(filename);
  });

});

$(document).ready(function(){
  $("#user-image").hide();
  $("#change-content3").on("change", function(e){
    var filename = e.target.value.split('\\').pop();
    $("#label-spannn").text(filename);
  });
});

// find recipes button (search field)
$(document).ready(function(){
  $('#find-recipes').click(function(){
    $('.search-recipe-fields').slideToggle();
    $('#search-recipe-fields-row').slideToggle();
  });

  $('#search-recipe-fields-row').hide();
  $('.search-recipe-fields').hide();
});
// /find reicpes button (search field)

// logout function
$(document).on('click', '#span-logout', function(){
  $(this).load('logout.php');
});
// /logout function

// left navigation for mobile
function openNav(){
  document.getElementById("mySidenav").style.width = "100%";
  document.getElementById("mySidenav").style.textAlign = "center";
  document.getElementById("header-image").style.background = "linear-gradient( rgba(0, 0, 0, 0.40), rgba(0, 0, 0,0.40) ), url('/wordpress/wordpress/wp-content/uploads/2018/04/recentbg.jpg')";
  document.getElementById("header-image").style.backgroundAttachment = "local";
  document.getElementById("header-image").style.backgroundPosition = "100% 70%";
  document.getElementById("header-image").style.backgroundSize = "cover";
  document.getElementById("widh").style.background = "linear-gradient( rgba(0, 0, 0, 0.40), rgba(0, 0, 0,0.40) ), #F8F7F5";
  document.getElementById("immage").style.pointerEvents = "none";
  document.getElementById("immage").style.opacity = "0.5";
  document.getElementById("immage").style.filter = "blur(3px)";
  document.getElementById("mySidenav").style.opacity= "0.9";

}

function closeNav(){
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("header-image").style.background = "url('/wordpress/wordpress/wp-content/uploads/2018/04/recentbg.jpg')";
  document.getElementById("header-image").style.backgroundAttachment = "local";
  document.getElementById("header-image").style.backgroundPosition = "100% 70%";
  document.getElementById("header-image").style.backgroundSize = "cover";
  document.getElementById("widh").style.background = "#F8F7F5";
  document.getElementById("immage").style.opacity = "1";
  document.getElementById("immage").style.pointerEvents = "auto";
  document.getElementById("immage").style.marginLeft = "0";
  document.getElementById("immage").style.filter = "none";

}
// /left navigation for mobile

// right navigation for mobile
function openProfile(){
  document.getElementById("mySidenav2").style.width = "100%";
  document.getElementById("mySidenav2").style.textAlign = "center";
  document.getElementById("header-image").style.background = "linear-gradient( rgba(0, 0, 0, 0.40), rgba(0, 0, 0,0.40) ), url('/wordpress/wordpress/wp-content/uploads/2018/04/recentbg.jpg')";
  document.getElementById("header-image").style.backgroundAttachment = "local";
  document.getElementById("header-image").style.backgroundPosition = "100% 70%";
  document.getElementById("header-image").style.backgroundSize = "cover";
  document.getElementById("widh").style.background = "linear-gradient( rgba(0, 0, 0, 0.40), rgba(0, 0, 0,0.40) ), #F8F7F5";
  document.getElementById("immage").style.pointerEvents = "none";
  document.getElementById("immage").style.opacity = "0.5";
  document.getElementById("immage").style.filter = "blur(3px)";
  document.getElementById("mySidenav2").style.opacity= "0.9";
}

function closeProfile(){
  document.getElementById("mySidenav2").style.width = "0";
  document.getElementById("header-image").style.background = "url('/wordpress/wordpress/wp-content/uploads/2018/04/recentbg.jpg')";
  document.getElementById("header-image").style.backgroundAttachment = "local";
  document.getElementById("header-image").style.backgroundPosition = "100% 70%";
  document.getElementById("header-image").style.backgroundSize = "cover";
  document.getElementById("widh").style.background = "#F8F7F5";
  document.getElementById("immage").style.opacity = "1";
  document.getElementById("immage").style.pointerEvents = "auto";
  document.getElementById("immage").style.marginRight = "0";
  document.getElementById("immage").style.filter = "none";
  document.getElementById("mySidenav2").style.opacity= "0";
}
// /right navigation for mobile

// select box stye
$(document).ready(function(){
  $('.basic').fancySelect();
});
// /select box style

// dropdown menu for user
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}
// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.profile-name,p,.fa-user')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
// /dropdown menu for user

// add another ingredient
$(document).ready(function () {
  var num = 1;
  // add another ingredient
  $('.txt').on ('click', '#add', function() {
    console.log("addMember was called");
    $(".txt").append("<div class='txt"+num+"'><div class='row start-xs start-sm start-md start-lg'><div class='col-xs-10 col-sm-11 col-md-11 col-lg-11' id='submit-form-inputs'><input type='text' class='ingredient-step' name='p_ingredients" + num + "'></div><div class='col-xs-2 col-sm-1 col-md-1 col-lg-1' style='padding-left: 0; padding-right:0; text-align: right; padding-top: 10px;'><button type='button' id='add' name='button'>+</button></div></div></div>");
    num++;
    return false;
  });
  // /add another ingredient

  var num = 1;
  var numm = 2;
  // add another step
  $('.txta').on ('click', '#addtxta', function() {
    console.log("addMember was called");
    $(".txta").append("<label>Step "+numm+"</label><div class='txta"+num+"'><div class='col-xs-12 col-sm-12 col-md-12 col-lg-12' id='submit-form-inputs'><textarea class='ingredient-step' id='txta' name='p_steps" + num + "'/></div><div class='row center-xs start-sm start-md start-lg'><div class='col-xs-6 col-sm-5 col-md-5 col-lg-5 step-image-upload' id='step-image-upload'><label style='font-weight: 300;' for='upload-step-image-input'><span id='label-spann'>Upoad Step Image</span></label><input type='file' id='upload-step-image-input' name='image_upload" + numm + "'></div><div class='col-xs-2 col-sm-2 col-md-2 col-lg-1' id='upload-step-image-button'><button type='button' id='addtxta' name='button'>+</button></div></div>");
    num++;
    numm++;
    return false;
  });
  // /add another step
});

// sum time
$(document).ready(function(e){
  $("input").change(function(){
    var sum=0;
    $("input[name=p_prepare],input[name=p_cook]").each(function(){
      sum = sum + parseInt($(this).val());
    })
    $("input[name=p_ready]").val(sum);
  });
});
// /sum time

// tags
$(document).ready(function(){
  $('#tags').keyup(function(){
    var str = this.value.replace(/(\w)[\s,]+(\w?)/g, '$1, $2');
    if (str!=this.value) this.value = str;
  });
});

$(document).ready(function(){
  var wordLen = 3,
  len; // Maximum word length
  $('#tags').keydown(function(event) {
    len = $('#tags').val().split(/[\s]+/);
    if (len.length > wordLen) {
      if ( event.keyCode == 46 || event.keyCode == 8 ) {// Allow backspace and delete buttons
      } else if (event.keyCode < 48 || event.keyCode > 57 ) {//all other buttons
        event.preventDefault();
      }
    }
    console.log(len.length + " words are typed out of an available " + wordLen);
    wordsLeft = (wordLen) - len.length;
    $('.words-left').html(wordsLeft+ ' words left');
    if(wordsLeft == 0) {
      $('.words-left').css({
        'background':'red'
      }).prepend('<i class="fa fa-exclamation-triangle"></i>');
    }
  });
});
// /tags

// update user info
$(document).on('click', '.btn-change-user-name', function(){
  $('#user-user-name').append("<form class='user-info-form' action='user.php' method='post'><textarea name='user_user_name' id='change-content'/><button type='submit' name='update-user-name'>Update</button></form>");
  $('.user-user-name').hide();
  $('#change-content').load('change-user-name');
});

$(document).on('click', '.btn-change-about-you', function(){
  $('#user-about-you').append("<form class='user-info-form' action='user.php' method='post'><textarea name='user_user_about' id='change-content2'/><button type='submit' name='update-about-you'>Update</button></form>");
  $('.user-about-you').hide();
  $('#change-content2').load('change-about-you');
});

$(document).on('click', '.btn-change-email', function(){
  $('#user-email').append("<form class='user-info-form' action='user.php' method='post'><textarea name='user_user_email' id='change-content'/><button type='submit' name='update-user-email'>Update</button></form>");
  $('.user-email').hide();
  $('#change-content').load('change-email');
});

$(document).on('click', '.btn-change-password', function(){
  $('#user-password').append("<form class='user-info-form' action='user.php' method='post'><textarea name='user_user_password' id='change-content'/><button type='submit' name='update-user-password'>Update</button></form>");
  $('.user-password').hide();
  $('#change-content').load('change-password');
});

$(document).on('click', '.btn-change-picture', function(){
  $('.btn-change-picture').hide();
  $('#user-image').show();
});
// /update user info

// login/register
$(document).on('click', '#login', function(){
  window.location.href = 'http://localhost/wordpress/wordpress/login/';
});

$(document).on('click', '#register', function(){
  window.location.href = 'http://localhost/wordpress/wordpress/register/';
});

// /login/register

// google map
function initMap() {
  var uluru = {lat: -25.363, lng: 131.044};
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 4,
    center: uluru
  });
  var marker = new google.maps.Marker({
    position: uluru,
    map: map
  });
}
// /google map

// search form validation
$(document).ready(function() {
  $('.search-form').validate({
    rules: {
      search:{
        minlength:2
      },
    },
    messages:{
      search:{
        minlength:"<br>Please enter at least 2 charachters!"
      }
    }
  });
});
// /search-form validation

// recipe/login/register form validation
$(document).ready(function() {
  $('.submit-form').validate({
    rules: {
      p_title: {
        required: true,
        minlength: 2,
        maxlength: 50
      },
      p_short: {
        required: true,
        minlength: 100,
        maxlength: 150
      },
      image_upload:{
        required: true
      },
      p_ingredients: {
        required: true
      },
      p_ingredients1: {
        required: true
      },
      p_ingredients2: {
        required: true
      },
      p_ingredients3: {
        required: true
      },
      p_ingredients4: {
        required: true
      },
      p_ingredients5: {
        required: true
      },
      p_ingredients6: {
        required: true
      },
      p_ingredients7: {
        required: true
      },
      p_ingredients8: {
        required: true
      },
      p_ingredients9: {
        required: true
      },
      p_ingredients10: {
        required: true
      },
      p_ingredients11: {
        required: true
      },
      p_ingredients12: {
        required: true
      },
      p_ingredients13: {
        required: true
      },
      p_ingredients14: {
        required: true
      },
      p_ingredients15: {
        required: true
      },
      p_ingredients16: {
        required: true
      },
      p_ingredients17: {
        required: true
      },
      p_ingredients18: {
        required: true
      },
      p_ingredients19: {
        required: true
      },
      p_ingredients20: {
        required: true
      },
      p_ingredients21: {
        required: true
      },
      p_ingredients22: {
        required: true
      },
      p_ingredients23: {
        required: true
      },
      p_ingredients24: {
        required: true
      },
      p_ingredients25: {
        required: true
      },
      p_ingredients26: {
        required: true
      },
      p_ingredients27: {
        required: true
      },
      p_ingredients28: {
        required: true
      },
      p_ingredients29: {
        required: true
      },
      p_ingredients30: {
        required: true
      },
      p_ingredients31: {
        required: true
      },
      p_ingredients32: {
        required: true
      },
      p_ingredients33: {
        required: true
      },
      p_ingredients34: {
        required: true
      },
      p_ingredients35: {
        required: true
      },
      p_ingredients36: {
        required: true
      },
      p_ingredients37: {
        required: true
      },
      p_ingredients38: {
        required: true
      },
      p_ingredients39: {
        required: true
      },
      p_ingredients40: {
        required: true
      },
      p_ingredients41: {
        required: true
      },
      p_ingredients42: {
        required: true
      },
      p_ingredients43: {
        required: true
      },
      p_ingredients44: {
        required: true
      },
      p_ingredients45: {
        required: true
      },
      p_ingredients46: {
        required: true
      },
      p_ingredients47: {
        required: true
      },
      p_ingredients48: {
        required: true
      },
      p_ingredients49: {
        required: true
      },
      p_ingredients50: {
        required: true
      },
      p_steps: {
        required: true
      },
      p_steps1:{
        required: true
      },
      p_steps2:{
        required: true
      },
      p_steps3:{
        required: true
      },
      p_steps4:{
        required: true
      },
      p_steps5:{
        required: true
      },
      p_steps6:{
        required: true
      },
      p_steps7:{
        required: true
      },
      p_steps8:{
        required: true
      },
      p_steps9:{
        required: true
      },
      p_steps10:{
        required: true
      },
      p_steps11:{
        required: true
      },
      p_steps12:{
        required: true
      },
      p_steps13:{
        required: true
      },
      p_steps14:{
        required: true
      },
      image_upload1:{
        required: true
      },
      image_upload2:{
        required: true
      },
      image_upload3:{
        required: true
      },
      image_upload4:{
        required: true
      },
      image_upload5:{
        required: true
      },
      image_upload6:{
        required: true
      },
      image_upload7:{
        required: true
      },
      image_upload8:{
        required: true
      },
      image_upload9:{
        required: true
      },
      image_upload10:{
        required: true
      },
      image_upload11:{
        required: true
      },
      image_upload12:{
        required: true
      },
      image_upload13:{
        required: true
      },
      image_upload14:{
        required: true
      },
      image_upload15:{
        required: true
      },

      p_yield:{
        required: true,
        number: true
      },
      p_servings:{
        required: true,
        number: true
      },
      p_prepare:{
        required: true,
        number: true
      },
      p_cook:{
        required: true,
        number: true
      },
      p_tags:{
        required:true
      },
      u_name:{
        required:true,
        minlength: 4
      },
      u_about:{
        required:true,
        minlength: 250,
        maxlength: 300
      },
      u_email:{
        required:true,
        email:true
      },
      u_password:{
        required:true,
        minlength:5
      },
      u_cpassword:{
        required:true,
        equalTo: "#password"
      },
      g_recaptcha:{
        requierd:true
      },
    },
    messages: {
      p_title:{
        required:"<br> Please insert title!",
        minlength:"<br> Please enter at least 2 charachters!",
        maxlength:"<br> Please enter less than 50 charachters!"
      },
      p_short:{
        required:"<br> Description is required...",
        minlength:"<br> Please enter at least 100 charachters!",
        maxlength:"<br> Please enter less than 150 charachters!"
      },
      image_upload:{
        required:"<br> Please upload image!"
      },
      p_ingredients:{
        required:"<br> Please insert ingredient!"
      },
      p_ingredients1:{
        required:" Please insert ingredient!"
      },
      p_ingredients2:{
        required:" Please insert ingredient!"
      },
      p_ingredients3:{
        required:" Please insert ingredient!"
      },
      p_ingredients4:{
        required:" Please insert ingredient!"
      },
      p_ingredients5:{
        required:" Please insert ingredient!"
      },
      p_ingredients6:{
        required:" Please insert ingredient!"
      },
      p_ingredients7:{
        required:" Please insert ingredient!"
      },
      p_ingredients8:{
        required:" Please insert ingredient!"
      },
      p_ingredients9:{
        required:" Please insert ingredient!"
      },
      p_ingredients10:{
        required:" Please insert ingredient!"
      },
      p_ingredients11:{
        required:" Please insert ingredient!"
      },
      p_ingredients12:{
        required:" Please insert ingredient!"
      },
      p_ingredients13:{
        required:" Please insert ingredient!"
      },
      p_ingredients14:{
        required:" Please insert ingredient!"
      },
      p_ingredients15:{
        required:" Please insert ingredient!"
      },
      p_ingredients16:{
        required:" Please insert ingredient!"
      },
      p_ingredients17:{
        required:" Please insert ingredient!"
      },
      p_ingredients18:{
        required:" Please insert ingredient!"
      },
      p_ingredients19:{
        required:" Please insert ingredient!"
      },
      p_ingredients20:{
        required:" Please insert ingredient!"
      },
      p_ingredients21:{
        required:" Please insert ingredient!"
      },
      p_ingredients22:{
        required:" Please insert ingredient!"
      },
      p_ingredients23:{
        required:" Please insert ingredient!"
      },
      p_ingredients24:{
        required:" Please insert ingredient!"
      },
      p_ingredients25:{
        required:" Please insert ingredient!"
      },
      p_ingredients26:{
        required:" Please insert ingredient!"
      },
      p_ingredients27:{
        required:" Please insert ingredient!"
      },
      p_ingredients28:{
        required:" Please insert ingredient!"
      },
      p_ingredients29:{
        required:" Please insert ingredient!"
      },
      p_ingredients30:{
        required:" Please insert ingredient!"
      },
      p_ingredients31:{
        required:" Please insert ingredient!"
      },
      p_ingredients32:{
        required:" Please insert ingredient!"
      },
      p_ingredients33:{
        required:" Please insert ingredient!"
      },
      p_ingredients34:{
        required:" Please insert ingredient!"
      },
      p_ingredients35:{
        required:" Please insert ingredient!"
      },
      p_ingredients36:{
        required:" Please insert ingredient!"
      },
      p_ingredients37:{
        required:" Please insert ingredient!"
      },
      p_ingredients38:{
        required:" Please insert ingredient!"
      },
      p_ingredients39:{
        required:" Please insert ingredient!"
      },
      p_ingredients40:{
        required:" Please insert ingredient!"
      },
      p_ingredients41:{
        required:" Please insert ingredient!"
      },
      p_ingredients42:{
        required:" Please insert ingredient!"
      },
      p_ingredients43:{
        required:" Please insert ingredient!"
      },
      p_ingredients44:{
        required:" Please insert ingredient!"
      },
      p_ingredients45:{
        required:" Please insert ingredient!"
      },
      p_ingredients46:{
        required:" Please insert ingredient!"
      },
      p_ingredients47:{
        required:" Please insert ingredient!"
      },
      p_ingredients48:{
        required:" Please insert ingredient!"
      },
      p_ingredients49:{
        required:" Please insert ingredient!"
      },
      p_ingredients50:{
        required:" Please insert ingredient!"
      },
      p_steps:{
        required:"<br> Please insert step!"
      },
      image_upload1:{
        required:" Please upload image!"
      },
      p_yield:{
        required:"<br> Please insert yield!",
        number:"<br> Please insert correct number!"
      },
      p_servings:{
        required:"<br> Please insert servings!",
        number:"<br> Please insert correct number!"
      },
      p_prepare:{
        required:"<br> Please insert preparation time!",
        number:"<br> Please insert correct number!"
      },
      p_cook:{
        required:"<br> Please insert cook time!",
        number:"<br> Please insert correct number!"
      },
      p_tags:{
        required:"<br> You must insert at least one tag!"
      },
      u_name:{
        required:"<br>Name is required...",
        minlength:"<br>Please enter 4 charachters!"
      },
      u_about:{
        required:"<br>This is required",
        minlength:"<br>You must enter at least 250 charachters!",
        maxlength:"<br>You must enter less than 300 charachters!"
      },
      u_email:{
        required:"<br>This is requierd",
        true:"<br>Please insert correct email adrress!"
      },
      u_password:{
        required:"<br>This is required",
        minlength:"<br>Please insert at least 5 charachters!"
      },
      u_cpassword:{
        required:"<br>This is required",
        equalTo:"<br>Passwords do not match!"
      },
      g_recaptcha:{
        required:"<br>This is required!"
      }
    }
  });
});
// /recipe/login/register form validation

// reply comment
$(document).on('click', '.btn-reply', function(){
  var comment_id = $(this).attr("id");
  $('.btn-reply').hide();
  $('.btn-edit').hide();
  $('.btn-edit-parent').hide();
  $('.btn-delete').hide();
  $('#comment_id').val(comment_id);
  $('#comment_sender_name').focus();
  $('#comment').focus();
});
// /reply comment

// edit comment
$(document).on('click', '.btn-edit', function(){
  var comment_id = $(this).attr("id");
  $('.btn-edit').hide();
  $('.btn-edit-parent').hide();
  $('.btn-reply').hide();
  $('.btn-delete').hide();
  $('#comment_id').val(comment_id);
  $('#reply'+comment_id).css("background", "none");
  $('#reply'+comment_id).css("box-shadow", "none");
  $('#reply'+comment_id).append("<form class='comment-form' action='?p_id="+p_id+"&number="+comment_id+"' method='POST'><textarea name='comment' id='load'></textarea><button type='submit' name='update'>Update</button></form>");
  $('#name'+comment_id).hide();
  $('#time'+comment_id).hide();
  $('#comment'+comment_id).hide();
  $('#replyremove'+comment_id).hide();
  $('#editremove'+comment_id).hide();
  $('#deleteremove'+comment_id).hide();
  $('#load').load('edit?&number='+comment_id);
});
// /edit comment

// edit parent comment
$(document).on('click', '.btn-edit-parent', function(){
  var comment_id = $(this).attr("id");
  $('.btn-edit').hide();
  $('.btn-edit-parent').hide();
  $('.btn-reply').hide();
  $('.btn-delete').hide();
  $('#comment_id').val(comment_id);
  $('#reply'+comment_id).css("background", "none");
  $('#reply'+comment_id).css("box-shadow", "none");
  $('#reply'+comment_id).append("<form class='comment-form' action='recipe-details?p_id="+p_id+"&number="+comment_id+"' method='POST'><textarea name='comment' id='load'></textarea><button type='submit' name='update'>Update</button></form>");
  $('#name'+comment_id).hide();
  $('#time'+comment_id).hide();
  $('#comment'+comment_id).hide();
  $('#replyremove'+comment_id).hide();
  $('#editremove'+comment_id).hide();
  $('#load').load('edit-parent?&number='+comment_id);
});
// /edit parent comment

// delete comment
$(document).on('click', '.btn-delete', function(){
  var comment_id = $(this).attr("id");
  if (confirm("Do you want to delete this comment?")) {
    $('#starter'+comment_id).load('delete?number='+comment_id);
    setTimeout(function(){
      location.href = "?p_id="+p_id+"";
    }, 300);
  }
});
// /delete comment

// index recipes box
$(document).ready(function(){
  $(".recipes-day2").hide();
  $(".recipes-day3").hide();
  document.getElementById("most-rated").style.background = "#fff";
  $("#most-rated span").addClass("focus");
  $("#most-rated").click(function(){
    document.getElementById("most-rated").style.background = "#fff";
    $(".recipes-day1").fadeIn(700);
    $(".recipes-day2").hide();
    $(".recipes-day3").hide();
    $("#most-rated span").addClass("focus");
    $("#popular span").removeClass("focus");
    $("#random span").removeClass("focus");
  });
  $("#popular").click(function(){
    document.getElementById("most-rated").style.background = "#e2ddda";
    $(".recipes-day1").hide();
    $(".recipes-day2").fadeIn(700);
    $(".recipes-day3").hide();
    $("#most-rated span").removeClass("focus");
    $("#random span").removeClass("focus");
    $("#popular span").addClass("focus");
  });
  $("#random").click(function(){
    document.getElementById("most-rated").style.background = "#e2ddda";
    $(".recipes-day1").hide()
    $(".recipes-day2").hide()
    $(".recipes-day3").fadeIn(700);
    $("#random span").addClass("focus");
    $("#most-rated span").removeClass("focus");
    $("#popular span").removeClass("focus");
  });
});
// /index recipes box

// modal for step images
function openModal(){
  // Get the modal
  var modal = document.getElementById('myModal');

  // Get the image and insert it inside the modal - use its "alt" text as a caption
  var img = document.getElementById('myImg');
  var modalImg = document.getElementById("img01");
  var captionText = document.getElementById("caption");
  $(".stepimg").click(function(){
    modal.style.display = "block";
    img01.style.boxShadow = "0 10px 10px rgba(0, 0, 0, 0.2)";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
    immage.style.filter = "blur(3px)";
  });

  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];

  // When the user clicks on <span> (x), close the modal
  $('span').click(function() {
    modal.style.display = "none";
    immage.style.filter = "none";
  });

};
// /modal for step images

// delete recipe

$(document).on('click', '.delete-recipe', function(){
  var recipe_id = $(this).attr("id");
  if (confirm("Do you want to delete this recipe?")) {
    $(this).load('delete-recipe?p_id='+recipe_id);
    setTimeout(function(){
      location.href = "http://localhost/wordpress/wordpress/my-recipes/";
    }, 300);
  }
});

// /delete recipe

// slider

$(window).on("load",function(){
  $('.showcase-recipes').slick({
    dots: false,
    arrows: false,
    infinite: true,
    speed: 1000,
    fade: true,
    cssEase: 'linear',
    autoplay: true,
    autoplaySpeed: 5000
  });
});

// /slider
