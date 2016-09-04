window.contacts = {};

contacts.generateOTP = function(){
	let messageBox = $('#message-box');

	$.ajax({
		url: '/messages/generateOTP',
		type: 'GET',
		success: function(data){
			messageBox.val('Hi, Your OTP is ' + data + '.');
		},
		error: function(){
			alert("Sorry, An Error occured in sending the message!");
		}
	});
}

contacts.sendMessage = function(contact_id){
	let sendMessageButton = $('#send-message-button');
	let message = $('#message-box').val();
	
	$.ajax({
		url: '/messages/send_messages/'+contact_id,
		type: 'POST',
		dataType: 'json',
		data: {'message':message},
		success: function(data){
			alert('The message has been sent successfully')
			window.location.href = '/messages/index';
		},
		error: function(){
			alert("Sorry, An Error occured in sending the message!");
		}
	});
}

