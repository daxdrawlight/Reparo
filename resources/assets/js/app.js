
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

//require('./bootstrap');
require('jquery');
require('materialize-css');

// window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example', require('./components/Example.vue'));

// const app = new Vue({
//     el: '#app'
// });

$(document).ready(function(){
	$(".button-collapse").sideNav(); 
	$('select').material_select();
})

$(document).on('click', '.add-work-btn', function(e)
    {
        e.preventDefault();

        var workContent = $('.work-row');
            currentEntry = $('.work-row').children('.work-data:first');
            console.log(currentEntry);
            newEntry = $(currentEntry.clone()).appendTo(workContent);

        newEntry.find('input').val('');
    }).on('click', '.remove-btn', function(e)
    {
        $(this).parents('.work-data:first').remove();
        e.preventDefault();
        return false;
    });

$(document).on('click', '.add-part-btn', function(e)
    {
        e.preventDefault();

        var partContent = $('.part-row');
            currentEntry = $('.part-row').children('.part-data:first');
            console.log(currentEntry);
            newEntry = $(currentEntry.clone()).appendTo(partContent);

        newEntry.find('input').val('');
    }).on('click', '.remove-btn', function(e)
    {
        $(this).parents('.part-data:first').remove();
        e.preventDefault();
        return false;
    });


// $(document).on('click', '.add-btn', function(e)
//     {
//         e.preventDefault();

//         var workContent = $('.work-row');
//         	currentEntry = $(this).parents('.work-content:first').siblings('.work-content:first'),
//         	newEntry = $(currentEntry.clone()).appendTo(workContent);

//         newEntry.find('input').val('');
//         workContent.find('.input-field:not(:last) .add-btn')
//         // .removeClass('add-btn').addClass('remove-btn')
//         // .html('<i class="material-icons"><a href="" class="remove-btn">remove</a></i>');
//     }).on('click', '.remove-btn', function(e)
//     {
// 		$(this).parents('.work-content:first').remove();
// 		e.preventDefault();
// 		return false;
// 	});

// $(document).on('click', '.add-btn', function(e)
//     {
//         e.preventDefault();

//         var partContent = $('.part-row');
//             currentEntry = $(this).parents('.part-content:first').siblings('.part-content:first'),
//             newEntry = $(currentEntry.clone()).appendTo(partContent);

//         newEntry.find('input').val('');
//         partContent.find('.input-field:not(:last) .add-btn')
//         // .removeClass('add-btn').addClass('remove-btn')
//         // .html('<i class="material-icons"><a href="" class="remove-btn">remove</a></i>');
//     }).on('click', '.remove-btn', function(e)
//     {
//         $(this).parents('.part-content:first').remove();
//         e.preventDefault();
//         return false;
//     });

// $(document).on('keyup', '.hours', function(e)
// {
//     // get current and sibling input field values, add them together and insert into the total work cost field
//     hours = $(this).val();
//     pph = $(this).parents('.hours').siblings('.pph').children('.pph').val();
//     calculate = $(this).parent('.hours').siblings('.total').find('input').val(hours*pph);

//     // get all total work cost fields and sum them together for the total ticket cost
//     total = 0;
//     $(".work-total").each(function() {
//         var totalWork = $(this).val()
//         total = parseInt(total) + parseInt(totalWork);
//     });

//     $('.total-price').val(total);
// });

// $(document).on('keyup', '.pph', function(e)
// {
//     pph = $(this).val();
//     hours = $(this).parents('.pph').siblings('.hours').children('.hours').val();
//     calculate = $(this).parent('.pph').siblings('.total').find('input').val(hours*pph);
// });

  $(document).ready(function(){
    // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
  });

$(function() {
   $("#delete_btn").click(function(event){
      if (!confirm("Obriši nalog?")){
         event.preventDefault();
      }
   });
});
          
