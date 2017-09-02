<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package storefront
 */

?>

		</div><!-- .col-full -->
	</div><!-- #content -->

	<?php do_action( 'storefront_before_footer' ); ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="col-full">

			<?php
			/**
			 * Functions hooked in to storefront_footer action
			 *
			 * @hooked storefront_footer_widgets - 10
			 * @hooked storefront_credit         - 20
			 */
			do_action( 'storefront_footer' ); ?>

		</div><!-- .col-full -->
	</footer><!-- #colophon -->

	<?php do_action( 'storefront_after_footer' ); ?>

</div><!-- #page -->

<!-- Video already exists Popup -->
<!-- Modal Start -->
<div id="myVideoModal" class="modal fade">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">Send Query</h3>
        <h5 id="error"></h5>
      </div>
      <div class="modal-body">
        <div id="successMessage"></div>
        <div class="form-group">
              <textarea style="height:140px;" class="form-control" name="question" id="question" placeholder="Enter your question here.."></textarea>
            </div>
      </div>
      <div class="modal-footer">
        <a href="javascript:void(0);" class="btn btn-primary btnY">Submit</a>
        <a href="javascript:void(0);" data-dismiss="modal" aria-hidden="true" class="btn btn-default btnN">Cancel</a>
      </div>
    </div>

  </div>
</div>



<?php wp_footer(); ?>


<script type="text/javascript">
	jQuery('.sendquery').click(function(){
		var id = jQuery(this).data('product-id');
		$('#myVideoModal').data('id', id).modal('show');
	});

	jQuery('.btnY').click(function() {
		var question = jQuery.trim(jQuery('textarea#question').val());
        var id = jQuery('#myVideoModal').data('id');
        var BASE_URL = "<?php echo get_site_url();?>";
        if(question != ''){
	        jQuery.ajax({

				url : BASE_URL+"/wp-admin/admin-ajax.php",
				type : 'POST',
				data : {
					"productId"	: id,
					"question" : question,
					'action' 		: 'sendQuery'
				},
				success : function( response ) {
					
					//on success function append response object elements to the places where it should append.
					//$(".hero-banner-image").css("background-image", "url('"+response.image_url+"')");
					//$(".hero_title").html(response.title);
					//$(".text-description").html(response.description);
					//$(".form-header").html(response.form_description);
					//$(".form_footer").html(response.form_footer);
					if(response != 0){
						jQuery('#question').css('display','none');
						jQuery('#successMessage').text('Message sent successfully').css('color','green');
						setTimeout(function(){
						    jQuery('#myVideoModal').modal('hide');
						    jQuery('textarea#question').val('');
						    jQuery('#successMessage').text('');
						    jQuery('#question').css('display','block');
						}, 2000);
					} else {
						jQuery('#question').css('display','none');
						jQuery('#successMessage').text('Error occured. Try again later').css('color','red');
						setTimeout(function(){
						    jQuery('#myVideoModal').modal('hide');
						    jQuery('textarea#question').val('');
						    jQuery('#successMessage').text('');
						    jQuery('#question').css('display','block');
						}, 2000);
					}
				}
			});
	    } else {
	    	jQuery('#error').text('Enter your question').show().css('color','red').delay(1000).fadeOut('slow');
	    }
    });

    jQuery('.btnN').click(function(){
    	jQuery('#myVideoModal').modal('hide');
	    jQuery('textarea#question').val('');
	    jQuery('#successMessage').text('');
	    jQuery('#question').css('display','block');
    });
</script>

</body>
</html>
