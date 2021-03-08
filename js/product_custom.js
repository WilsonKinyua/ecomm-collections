$(document).ready(function()
{"use strict";var menuActive=false;var header=$('.header');setHeader();initCustomDropdown();initPageMenu();initViewedSlider();initBrandsSlider();initQuantity();initColor();initFavs();initImage();$(window).on('resize',function()
{setHeader();});function setHeader()
{if(window.innerWidth>991&&menuActive)
{closeMenu();}}
function initCustomDropdown()
{if($('.custom_dropdown_placeholder').length&&$('.custom_list').length)
{var placeholder=$('.custom_dropdown_placeholder');var list=$('.custom_list');}
placeholder.on('click',function(ev)
{if(list.hasClass('active'))
{list.removeClass('active');}
else
{list.addClass('active');}
$(document).one('click',function closeForm(e)
{if($(e.target).hasClass('clc'))
{$(document).one('click',closeForm);}
else
{list.removeClass('active');}});});$('.custom_list a').on('click',function(ev)
{ev.preventDefault();var index=$(this).parent().index();placeholder.text($(this).text()).css('opacity','1');if(list.hasClass('active'))
{list.removeClass('active');}
else
{list.addClass('active');}});$('select').on('change',function(e)
{placeholder.text(this.value);$(this).animate({width:placeholder.width()+'px'});});}
function initPageMenu()
{if($('.page_menu').length&&$('.page_menu_content').length)
{var menu=$('.page_menu');var menuContent=$('.page_menu_content');var menuTrigger=$('.menu_trigger');menuTrigger.on('click',function()
{if(!menuActive)
{openMenu();}
else
{closeMenu();}});if($('.page_menu_item').length)
{var items=$('.page_menu_item');items.each(function()
{var item=$(this);if(item.hasClass("has-children"))
{item.on('click',function(evt)
{evt.preventDefault();evt.stopPropagation();var subItem=item.find('> ul');if(subItem.hasClass('active'))
{subItem.toggleClass('active');TweenMax.to(subItem,0.3,{height:0});}
else
{subItem.toggleClass('active');TweenMax.set(subItem,{height:"auto"});TweenMax.from(subItem,0.3,{height:0});}});}});}}}
function openMenu()
{var menu=$('.page_menu');var menuContent=$('.page_menu_content');TweenMax.set(menuContent,{height:"auto"});TweenMax.from(menuContent,0.3,{height:0});menuActive=true;}
function closeMenu()
{var menu=$('.page_menu');var menuContent=$('.page_menu_content');TweenMax.to(menuContent,0.3,{height:0});menuActive=false;}
function initViewedSlider()
{if($('.viewed_slider').length)
{var viewedSlider=$('.viewed_slider');viewedSlider.owlCarousel({loop:true,margin:30,autoplay:true,autoplayTimeout:6000,nav:false,dots:false,responsive:{0:{items:1},575:{items:2},768:{items:3},991:{items:4},1199:{items:6}}});if($('.viewed_prev').length)
{var prev=$('.viewed_prev');prev.on('click',function()
{viewedSlider.trigger('prev.owl.carousel');});}
if($('.viewed_next').length)
{var next=$('.viewed_next');next.on('click',function()
{viewedSlider.trigger('next.owl.carousel');});}}}
function initBrandsSlider()
{if($('.brands_slider').length)
{var brandsSlider=$('.brands_slider');brandsSlider.owlCarousel({loop:true,autoplay:true,autoplayTimeout:5000,nav:false,dots:false,autoWidth:true,items:8,margin:42});if($('.brands_prev').length)
{var prev=$('.brands_prev');prev.on('click',function()
{brandsSlider.trigger('prev.owl.carousel');});}
if($('.brands_next').length)
{var next=$('.brands_next');next.on('click',function()
{brandsSlider.trigger('next.owl.carousel');});}}}
function initQuantity()
{if($('.product_quantity').length)
{var input=$('#quantity_input');var incButton=$('#quantity_inc_button');var decButton=$('#quantity_dec_button');var originalVal;var endVal;incButton.on('click',function()
{originalVal=input.val();endVal=parseFloat(originalVal)+1;input.val(endVal);});decButton.on('click',function()
{originalVal=input.val();if(originalVal>0)
{endVal=parseFloat(originalVal)-1;input.val(endVal);}});}}
function initColor()
{if($('.product_color').length)
{var selectedCol=$('#selected_color');var colorItems=$('.color_list li .color_mark');colorItems.each(function()
{var colorItem=$(this);colorItem.on('click',function()
{var color=colorItem.css('backgroundColor');selectedCol.css('backgroundColor',color);});});}}
function initFavs()
{var fav=$('.product_fav');fav.on('click',function()
{fav.toggleClass('active');});}
function initImage()
{var images=$('.image_list li');var selected=$('.image_selected img');images.each(function()
{var image=$(this);image.on('click',function()
{var imagePath=new String(image.data('image'));selected.attr('src',imagePath);});});}});