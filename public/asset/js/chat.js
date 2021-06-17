function loadDefault() {
	var oldscrollHeight = $('#messageBox')[0].scrollHeight - 20;
	$.ajax({
		url: get_messages_url,
		type: 'get',
		success: function(response) {
			$('#messageBox').html(response);

			//Auto-scroll
			var newscrollHeight = $('#messageBox')[0].scrollHeight - 20;
			if (newscrollHeight > oldscrollHeight) {
				var objDiv = document.getElementById('messageBox');
				objDiv.scrollTop = objDiv.scrollHeight;
				// $("#messageBox").animate({ scrollTop: newscrollHeight }, 'normal');
			}
		}
	});
}

function sendMSG() {
	var token = $('meta[name="csrf-token"]').attr('content');
	var msg = $('.msgToSend').val();

	if (msg.length == 0) {
		return false;
	}

	$.ajax({
		url: send_messages_url,
		type: 'POST',
		async: true,
		data: {
			_token: token,
			message: msg,
			mThread,
			other_user
		},
		success: function(response) {
			$('.msgToSend').val('');
		}
	});
}

function load_unseen_notification() {
	$.ajax({
		url: get_message_notifications_url,
		type: 'GET',
		async: true,
		success: function(response) {
			$('.post_notification').removeClass('badge badge-danger');
			$('.post_notification').html(' ');
			$('#message_notification').removeClass('badge badge-danger');
			$('#message_notification').html(' ');

			if (response.total_unread > 0) {
				$('#message_notification').addClass('badge badge-danger');
				$('#message_notification').html(response.total_unread);
			}
			$.each(response.post_wise_unread, function(index, value) {
				if (value.msg_count) {
					$('#post_' + value.post_id + ' .post_notification').addClass('badge badge-danger');
					$('#post_' + value.post_id + ' .post_notification').html(value.msg_count);

					if (!$('#post_' + value.post_id).hasClass('unread')) {
						$('#post_' + value.post_id).addClass('unread');
					}
				}
			});
		}
	});
}
