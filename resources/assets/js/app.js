
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

//require('./bootstrap');
require('jquery');
require('materialize-css');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app'
});

$(document).ready(function(){
	$(".button-collapse").sideNav();
	$('select').material_select();
})


$(document).on('click', '.add-btn', function(e)
    {
        e.preventDefault();

        var workContent = $('.work-row');
        	currentEntry = $(this).parents('.work-content:first').siblings('.work-content:first'),
        	newEntry = $(currentEntry.clone()).appendTo(workContent);

        newEntry.find('input').val('');
        workContent.find('.input-field:not(:last) .add-btn')
        // .removeClass('add-btn').addClass('remove-btn')
        // .html('<i class="material-icons"><a href="" class="remove-btn">remove</a></i>');
    }).on('click', '.remove-btn', function(e)
    {
		$(this).parents('.work-content:first').fadeOut().remove();
		e.preventDefault();
		return false;
	});
