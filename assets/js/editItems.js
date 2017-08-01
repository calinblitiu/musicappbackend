$(document).ready(function(){
	$('.edit-music-btn').click(function(){
		var me = $(this);
		var p_th = me.parent();
		var pp_tr = me.parent().parent();
		var item_no = pp_tr.attr('data-item-id');
		var field_name = p_th.attr('data-key');
		$('#music-item-no').val(item_no);
		$('#music-field-name').val(field_name);
		$('#editmodal').modal('show');
	});

	$('.listen-music-btn').click(function(){
		var music_url = $(this).data('music-url');
		$('#music-player-div').html('<audio src="" preload="auto" id="music-player" >');
		$('#music-player').attr('src',baseURL+'/assets/music-sample/'+music_url);
		audiojs.events.ready(function(){
			var as = audiojs.createAll();
		});
	});


	$('.listen-music-btn').each(function(){
		var me = $(this);
		var music_url = me.data('music-url');
		if (music_url=="") {
			me.removeClass('btn-success');
			me.addClass('btn-default');
			me.attr('disabled',true);
			me.siblings('.remove-music-btn').attr('disabled',true);
		}
	});
});