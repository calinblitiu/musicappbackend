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

	$('.remove-music-btn').click(function(){
		var me = $(this);
		var p_th = me.parent();
		var pp_tr = me.parent().parent();
		var item_no = pp_tr.attr('data-item-id');
		var field_name = p_th.attr('data-key');
		$('#del-music-item-no').val(item_no);
		$('#del-music-field-name').val(field_name);
		$('#deletemodal').modal('show');
	});

	$('.listen-music-btn').click(function(){
		var music_url = $(this).data('music-url');
		// $('#music-player-div').html('<audio src="" preload="auto" id="music-player" >');
		// $('#music-player').attr('src',baseURL+'/assets/music-sample/'+music_url);
		// audiojs.events.ready(function(){
		// 	var as = audiojs.createAll();
		// });
		$('.listen-modal-body').html('<img src="'+baseURL+'assets/images/loading.gif" style="width: 100%">');
		$.ajax({
			url : baseURL+'getmusicfiles/'+music_url,
			//data : {cell_id: music_url},
			type : 'GET',
			dataType : 'JSON',
			success: function(data){
				if(data.success == 0)
				{
					//window.temp_music_data = data;
					var append_html='';
					append_html+='<b>Player 1 : </b><audio controls> <source src="'+data.player_1+'" type="audio/ogg"></audio><br>';
					append_html+='<b>Player 2 : </b><audio controls> <source src="'+data.player_2+'" type="audio/ogg"></audio><br>';
					append_html+='<b>Player 3 : </b><audio controls> <source src="'+data.player_3+'" type="audio/ogg"></audio><br>';
					append_html+='<b>Player 4 : </b><audio controls> <source src="'+data.player_4+'" type="audio/ogg"></audio><br>';
					append_html+='<b>Player 5 : </b><audio controls> <source src="'+data.player_5+'" type="audio/ogg"></audio><br>';
					append_html+='<b>Player 6 : </b><audio controls> <source src="'+data.player_6+'" type="audio/ogg"></audio><br>';
					append_html+='<b>Player 7 : </b><audio controls> <source src="'+data.player_7+'" type="audio/ogg"></audio><br>';
					
					$('.listen-modal-body').html(append_html);
					
				}
				else{
					$('.listen-modal-body').html('<h1>'+data.message+'</h1>');
					alert(error);
				}
			} ,
			fail : function(err)
			{
				$("#listen-modal").modal('hide');
				alert(err);
			}
		});
		
		$("#listen-modal").modal('show');
		
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