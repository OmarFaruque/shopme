jQuery(document).ready(function($){
	$('div.ThOMainBody').hide();
	$('#general').show();
	$('.ThOleftMenuItem li:first-child').addClass('active');


	// Image Uploader  
	  var mediaUploader;
	  
	  $('.add-image').click(function(e) {
	  	var this_val = $(this);
	  	//alert(this_val);
		e.preventDefault();
		// If the uploader object has already been created, reopen the dialog
		 /*if (mediaUploader) {
		  mediaUploader.open();
		  return;
		}*/
		// Extend the wp.media object
		mediaUploader = wp.media.frames.file_frame = wp.media({
		  title: 'Choose Image',
		  button: {
		  text: 'Choose Image'
		}, multiple: false });
	 
		// When a file is selected, grab the URL and set it as the text field's value
		mediaUploader.on('select', function() {
		  attachment = mediaUploader.state().get('selection').first().toJSON();
		  this_val.prev('input').val(attachment.url);
          this_val.prev('input').prev('input').val(attachment.id);
		  this_val.closest('.partRight').next('.imgPreview').children('.img').html('<img src="'+attachment.url+'" alt="Logo"/>');
		});
		// Open the uploader dialog
		mediaUploader.open();
	  });

	  // checkbox function 
	  $('a.checkbox-status').live('click', function(){
	  	var checkbox = $(this).prev();
	  	if(checkbox.is(':checked')){
	  		checkbox.prop("checked", false);
	  		$(this).removeClass('active');
	  	}else{
	  		checkbox.prop("checked", true);
	  		$(this).addClass('active');
	  	}
	  	return false;
	  });


	  // checkbox function 
	  $('a.radio-status').live('click', function(){
	  	var radio = $(this).prev();
	  	if(radio.is(':checked')){
	  		//radio.prop("checked", false);
	  		//$(this).removeClass('active');
	  	}else{
	  		radio.prop("checked", true);
	  		$(this).closest('div').closest('.sectionPart').find('a.radio-status').removeClass('active');
	  		//.children('a.radio-status').removeClass('active');
	  		$(this).addClass('active');
	  	}
	  	return false;
	  });


	  // Select Left Manu
	  $('.ThOleftMenuItem ul li a').live('click', function(){
	  		var href = $(this).attr('href');
	  		$('.ThOleftMenuItem ul li').removeClass('active');
	  		$(this).closest('li').addClass('active');
	  		$('div.ThOMainBody').hide();
	  		$(href).fadeIn('slow');
	  		return false;
	  });

	  //Color Picker
	  
 
    	$('.codeHouseColorPicker').wpColorPicker();


$('.selectSidebar').each(function(){



$(this).children('select').wrap('<div class="select_wrapper"></div>');
$(this).children().children('select').parent().prepend('<span>'+ $(this).find(':selected').text() +'</span>');
$(this).children().children('select').parent().children('span').width($('select').width());	
$(this).children().children('select').css('display', 'none');					
$(this).children().children('select').parent().append('<ul class="select_inner"></ul>');
$(this).children().children('select').children().each(function(){
  var opttext = $(this).text();
  var optval = $(this).val();
  $(this).addClass('Test Omar');
  $(this).closest('select').next('.select_inner').append('<li id="' + optval + '">' + opttext + '</li>');
});



$(this).children().children('select').parent().find('li').on('click', function (){
  var cur = $(this).attr('id');
$(this).closest('ul.select_inner').prev('select').prev('span').text($(this).text());
  $(this).closest('ul.select_inner').prev('select').children().removeAttr('selected');
  $(this).closest('ul.select_inner').prev('select').children('[value="'+cur+'"]').attr('selected','selected');
  //$(this).children('[value="'+cur+'"]').attr('selected','selected');					
  console.log($('select').children('[value="'+cur+'"]').text());
});
$(this).children().children('select').parent().on('click', function (){
  $(this).find('ul').slideToggle('fast');
});
});
  	









	/*
	* Theme Admin Settings Page
	*/
	$(document.body).on('click', 'a.edit.button.button-edit', function(){
		$('.theme_setting_body').addClass('close');
		$(this).closest('.button_section').next('.theme_setting_body').removeClass('close');
		$('.theme_setting_body.close').hide();
		$(this).closest('.button_section').next('.theme_setting_body').slideToggle();
	});

	// Delete button Process 
	$(document.body).on('click', 'a.delete.button.button-delete', function(){
		$(this).closest('.button_section').closest('li').remove();
	});


	/* Add New Item  */
	$(document.body).on('click', 'a#add_item', function(){
						var itemsCount = 0;
                        $('.section_setting_field ul li').each(function(){
                            if(itemsCount < parseInt($(this).data('short'))){
                                itemsCount = parseInt($(this).data('short'));
                            }
                        });
						var itemHTML = '<li data-item="item" data-short="'+parseInt(itemsCount + 1)+'" class="section-item item_head">';
                                itemHTML += '<div class="open">Item '+ parseInt(itemsCount + 1) +'</div>';
                                itemHTML += '<div class="button_section j_button">';
                                        itemHTML += '<a href="javascript:void(0)" class="edit button button-edit">';
                                            itemHTML += '<span alt="f464" class="dashicons dashicons-edit"></span>';
                                        itemHTML += '</a>';
                                        itemHTML += '<a href="javascript:void(0)" class="delete button button-delete">';
                                            itemHTML += '<span alt="f182" class="dashicons dashicons-trash"></span>'
                                        itemHTML += '</a>';
                                itemHTML += '</div>';
                                itemHTML += '<div class="theme_setting_body">';
                                    itemHTML += '<div class="single_body_item">';
                                        itemHTML += '<div class="body_left">';
                                            itemHTML += '<input type="text" name="ch_theme[item]['+ parseInt(itemsCount + 1) +'][title]" value="" placeholder="Item '+ parseInt(itemsCount + 1) +'">';
                                        itemHTML += '</div>';
                                        itemHTML += '<div class="body_info">';
                                        itemHTML += '<span><b>Section Title:</b> Display as a menu item on the Theme Options page.</span>';
                                        itemHTML += '</div>';
                                    itemHTML += '</div>';
                                    itemHTML += '<div class="single_body_item">';
                                        itemHTML += '<div class="body_left">';
                                            itemHTML += '<input type="text" readonly name="ch_theme[item]['+ parseInt(itemsCount + 1) +'][id]" value="" placeholder="">';
                                        itemHTML += '</div>';
                                        itemHTML += '<div class="body_info">';
                                        itemHTML += '<span><b>Section ID:</b> A unique lower case alphanumeric string, underscores allowed.</span>';
                                             itemHTML += '</div>';
                                   itemHTML += '</div>';
                                    itemHTML += '</div>';
                                itemHTML += '</div>';
                            itemHTML += '</li>';

       $('.theme_setting_body').hide();
       $('.section_setting_field ul').append(itemHTML);
       $('.section_setting_field ul li').last().children('.theme_setting_body').css('display', 'block');
       return false;
	}); // End click a#add_item


	// Add New Section 
	$(document.body).on('click', 'a#add_section', function(){
		var itemsCount = $('.section_setting_field ul li').length;
						var sectionHTML = '<li class="section-item section_head">';
                                sectionHTML += '<div class="open">Item '+ parseInt(itemsCount + 1) +'</div>';
                                sectionHTML += '<div class="button_section j_button">';
                                        sectionHTML += '<a href="javascript:void(0)" class="edit button button-edit">';
                                            sectionHTML += '<span alt="f464" class="dashicons dashicons-edit"></span>';
                                        sectionHTML += '</a>';
                                        sectionHTML += '<a href="javascript:void(0)" class="delete button button-delete">';
                                            sectionHTML += '<span alt="f182" class="dashicons dashicons-trash"></span>'
                                        sectionHTML += '</a>';
                                sectionHTML += '</div>';
                                sectionHTML += '<div class="theme_setting_body">';
                                    sectionHTML += '<div class="single_body_item">';
                                        sectionHTML += '<div class="body_left">';
                                            sectionHTML += '<input type="text" name="ch_theme[section]['+ parseInt(itemsCount + 1) +'][title]" value="" placeholder="Item '+ parseInt(itemsCount + 1) +'">';
                                        sectionHTML += '</div>';
                                        sectionHTML += '<div class="body_info">';
                                        sectionHTML += '<span><b>Section Title:</b> Display as a Section Head on the Theme Options page.</span>';
                                        sectionHTML += '</div>';
                                    sectionHTML += '</div>';
                                    sectionHTML += '<div class="single_body_item">';
                                        sectionHTML += '<div class="body_left">';
                                            sectionHTML += '<input type="text" readonly name="ch_theme[section]['+ parseInt(itemsCount + 1) +'][id]" value="" placeholder="">';
                                        sectionHTML += '</div>';
                                        sectionHTML += '<div class="body_info">';
                                        sectionHTML += '<span><b>Section ID:</b> A unique lower case alphanumeric string, underscores allowed.</span>';
                                             sectionHTML += '</div>';
                                   sectionHTML += '</div>';
                                    sectionHTML += '</div>';
                                sectionHTML += '</div>';
                            sectionHTML += '</li>';

                            $('.theme_setting_body').hide();
                            $('.section_setting_field ul').append(sectionHTML);
                            $('.section_setting_field ul li').last().children('.theme_setting_body').css('display', 'block');
                            return false;
	}); // End New Section  


	// Add New Settings
	$(document.body).on('click', 'a#add_setting', function(){
		var itemsCount = $('.section_setting_field ul li').length;
		var sectionSetting = '<li class="section-item section_setting">';
                                sectionSetting += '<div class="open">Item '+ parseInt(itemsCount + 1) +'</div>';
                                sectionSetting += '<div class="button_section j_button">';
                                        sectionSetting += '<a href="javascript:void(0)" class="edit button button-edit">';
                                            sectionSetting += '<span alt="f464" class="dashicons dashicons-edit"></span>';
                                        sectionSetting += '</a>';
                                        sectionSetting += '<a href="javascript:void(0)" class="delete button button-delete">';
                                            sectionSetting += '<span alt="f182" class="dashicons dashicons-trash"></span>'
                                        sectionSetting += '</a>';
                                sectionSetting += '</div>';
                                sectionSetting += '<div class="theme_setting_body">';
                                    sectionSetting += '<div class="single_body_item">';
                                        sectionSetting += '<div class="body_left">';
                                            sectionSetting += '<input type="text" name="" value="" placeholder="Item '+ parseInt(itemsCount + 1) +'">';
                                        sectionSetting += '</div>';
                                        sectionSetting += '<div class="body_info">';
                                        sectionSetting += '<span><b>Section Title:</b> Display as a specific item name on the Theme Options page.</span>';
                                        sectionSetting += '</div>';
                                    sectionSetting += '</div>';
                                    sectionSetting += '<div class="single_body_item">';
                                        sectionSetting += '<div class="body_left">';
                                            sectionSetting += '<input type="text" name="ch_theme[]" value="" placeholder="">';
                                        sectionSetting += '</div>';
                                        sectionSetting += '<div class="body_info">';
                                        sectionSetting += '<span><b>Section ID:</b> A unique lower case alphanumeric string, underscores allowed.</span>';
                                             sectionSetting += '</div>';
                                   sectionSetting += '</div>';
                                    sectionSetting += '</div>';
                                sectionSetting += '</div>';
                            sectionSetting += '</li>';
                            $('.theme_setting_body').hide();
                            $('.section_setting_field ul').append(sectionSetting);
                            $('.section_setting_field ul li').last().children('.theme_setting_body').css('display', 'block');
                            return false;
	});


	// if change item heading text 
	$(document.body).on('keyup', '.theme_setting_body .single_body_item:first-child .body_left input', function(){
		var thisVal = $(this).val();
        var itemsCount = $('.section_setting_field ul li').length;
		$(this).closest('.body_left').closest('.single_body_item').closest('.theme_setting_body').prev().prev('.open').text(thisVal);
		$(this).closest('.body_left').closest('.single_body_item').next('.single_body_item').children('.body_left').children('input').val(thisVal.split(' ').join('_').toLowerCase());

	});

	// if change sectin heading text 
		
}); // End Document Ready 


