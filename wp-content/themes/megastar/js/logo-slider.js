/* abc*/
jQuery(function($){
	var tgm_media_frame;
	$('body').on('click','.custom_media_upload',function(e) {
		var $this = $(this);

		if ( tgm_media_frame ) {
		    tgm_media_frame.open();
		    return;
		  }

		  tgm_media_frame = wp.media.frames.tgm_media_frame = wp.media({
		    multiple: true,
		    library: {
		      type: 'image'
		    },
		  });

		   tgm_media_frame.on( 'select', function(){

            var attachments = tgm_media_frame.state().get('selection').map( 

                function( attachment ) {
                	attachment.toJSON();
                    return attachment;
            });
           var value_url = [];
           var i;
           
           for (i = 0; i < attachments.length; ++i) {
           		
                $('.widget-inside').find('#something > #offset_').before( '<div class="img_preview"><img src="'+attachments[i].attributes.url+'" alt="" class="img-fullwidth img-responsive"/><a class="delete-img " data-url="'+attachments[i].attributes.url+'" href="#"></a></div>' );
		        value_url.push(attachments[i].attributes.url);

            }
            inputval = $this.parent('p').children('input.media_url').val();
            if(inputval){	
            	a = inputval.concat(','+value_url);
            	$('.widget-inside').find('input.media_url').val(a);
            	
            }else{
            	$('.widget-inside').find('input.media_url').val(value_url)
            }
            return;
        });

		  tgm_media_frame.open();
	});

	// $('body').on('click','.background_upload',function(e) {
	// 	var frame;
	// 	var imgIdInput = $( this ).closest('p').children('.background_uri');
	// 	if ( frame ) {
	// 	    frame.open();
	// 	    return;
	// 	  }

	//   	frame = wp.media({
	//       	title: 'Select or Upload Media Of Your Chosen Persuasion',
	//       	button: {
	//         	text: 'Use this media'
	//       	},
	//       multiple: false  // Set to true to allow multiple files to be selected
	//     });
	//     frame.on( 'select', function() {
	//     	var attachment = frame.state().get('selection').first().toJSON();
	//     	imgIdInput.val( attachment.url );
	//     });

	//     frame.open();

	// });

	$('body').on( 'click','.delete-img', function( event ){
		 
	    event.preventDefault();

	    var mediaTag = $( this ).closest('.widget-content').find('input.media_url');
	    var inputValue = mediaTag.val();
	    data = $( this ).data('url');
	    wrap = $(this).closest('#something');
	    
	    if(wrap.children('.img_preview').length-1 > 0){
	    	if($( this ).parent('.img_preview').index() == wrap.children('.img_preview').length-1){
		    	mediaTag.val(inputValue.replace(','+data, ''));
		    }else{
		    	mediaTag.val(inputValue.replace(data+',', ''));
		    }
	    }else{
	    	mediaTag.val(inputValue.replace(data,''));
	    }
	    
	    $( this ).parent('.img_preview').remove();
	});
})