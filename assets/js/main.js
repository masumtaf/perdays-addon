(function ($) {
    "use strict";

    $('.pstep-product-list').select2({
        placeholder: 'Select an option'
    });


    // //jQuery time
    // var current_fs, next_fs, previous_fs; //fieldsets
    // var left, opacity, scale; //fieldset properties which we will animate
    // var animating; //flag to prevent quick multi-click glitches

    // $(".next").click(function () {
    //     if (animating) return false;
    //     animating = true;

    //     current_fs = $(this).parent();
    //     next_fs = $(this).parent().next();

    //     //activate next step on progressbar using the index of next_fs
    //     $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

    //     //show the next fieldset
    //     next_fs.show();
    //     //hide the current fieldset with style
    //     current_fs.animate({ opacity: 0 }, {
    //         step: function (now, mx) {
    //             //as the opacity of current_fs reduces to 0 - stored in "now"
    //             //1. scale current_fs down to 80%
    //             scale = 1 - (1 - now) * 0.2;
    //             //2. bring next_fs from the right(50%)
    //             left = (now * 50) + "%";
    //             //3. increase opacity of next_fs to 1 as it moves in
    //             opacity = 1 - now;
    //             current_fs.css({
    //                 'transform': 'scale(' + scale + ')',
    //                 'position': 'absolute'
    //             });
    //             next_fs.css({ 'left': left, 'opacity': opacity });
    //         },
    //         duration: 800,
    //         complete: function () {
    //             current_fs.hide();
    //             animating = false;
    //         },
    //         //this comes from the custom easing plugin
    //         easing: 'easeInOutBack'
    //     });
    // });

    // $(".previous").click(function () {
    //     if (animating) return false;
    //     animating = true;

    //     current_fs = $(this).parent();
    //     previous_fs = $(this).parent().prev();

    //     //de-activate current step on progressbar
    //     $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

    //     //show the previous fieldset
    //     previous_fs.show();
    //     //hide the current fieldset with style
    //     current_fs.animate({ opacity: 0 }, {
    //         step: function (now, mx) {
    //             //as the opacity of current_fs reduces to 0 - stored in "now"
    //             //1. scale previous_fs from 80% to 100%
    //             scale = 0.8 + (1 - now) * 0.2;
    //             //2. take current_fs to the right(50%) - from 0%
    //             left = ((1 - now) * 50) + "%";
    //             //3. increase opacity of previous_fs to 1 as it moves in
    //             opacity = 1 - now;
    //             current_fs.css({ 'left': left });
    //             previous_fs.css({ 'transform': 'scale(' + scale + ')', 'opacity': opacity });
    //         },
    //         duration: 800,
    //         complete: function () {
    //             current_fs.hide();
    //             animating = false;
    //         },
    //         //this comes from the custom easing plugin
    //         easing: 'easeInOutBack'
    //     });
    // });

    // $(".submit").click(function () {
    //     return false;
    // })




    // var next_click = document.querySelectorAll(".next_button");
    // var main_form = document.querySelectorAll(".main");
    // var step_list = document.querySelectorAll(".progress-bar li");
    // var num = document.querySelector(".step-number");
    // let formnumber = 0;

    // next_click.forEach(function (next_click_form) {
    //     next_click_form.addEventListener('click', function () {
    //         if (!validateform()) {
    //             return false
    //         }
    //         formnumber++;
    //         updateform();
    //         progress_forward();
    //         contentchange();
    //     });
    // });

    // var back_click = document.querySelectorAll(".back_button");
    // back_click.forEach(function (back_click_form) {
    //     back_click_form.addEventListener('click', function () {
    //         formnumber--;
    //         updateform();
    //         progress_backward();
    //         contentchange();
    //     });
    // });

    // var username = document.querySelector("#user_name");
    // var shownname = document.querySelector(".shown_name");


    // var submit_click = document.querySelectorAll(".submit_button");
    // submit_click.forEach(function (submit_click_form) {
    //     submit_click_form.addEventListener('click', function () {
    //         // shownname.innerHTML = username.value;
    //         formnumber++;
    //         updateform();
    //     });
    // });

    // var heart = document.querySelector(".fa-heart");
    // heart.addEventListener('click', function () {
    //     heart.classList.toggle('heart');
    // });


    // var share = document.querySelector(".fa-share-alt");
    // share.addEventListener('click', function () {
    //     share.classList.toggle('share');
    // });



    // function updateform() {
    //     main_form.forEach(function (mainform_number) {
    //         mainform_number.classList.remove('active');
    //     })
    //     main_form[formnumber].classList.add('active');
    // }

    // function progress_forward() {
    //     // step_list.forEach(list => {

    //     //     list.classList.remove('active');

    //     // }); 


    //     num.innerHTML = formnumber + 1;
    //     step_list[formnumber].classList.add('active');
    // }

    // function progress_backward() {
    //     var form_num = formnumber + 1;
    //     step_list[form_num].classList.remove('active');
    //     num.innerHTML = form_num;
    // }

    // var step_num_content = document.querySelectorAll(".step-number-content");

    // function contentchange() {
    //     step_num_content.forEach(function (content) {
    //         content.classList.remove('active');
    //         content.classList.add('d-none');
    //     });
    //     step_num_content[formnumber].classList.add('active');
    // }


    // function validateform() {
    //     var validate = true;
    //     var validate_inputs = document.querySelectorAll(".main.active input");
    //     validate_inputs.forEach(function (vaildate_input) {
    //         vaildate_input.classList.remove('warning');
    //         if (vaildate_input.hasAttribute('require')) {
    //             if (vaildate_input.value.length == 0) {
    //                 validate = false;
    //                 vaildate_input.classList.add('warning');
    //             }
    //         }
    //     });
    //     return validate;

    // }

})(jQuery);