<div class="container">
	<div class="page-header">
		<h2>Contact Info</h2>
	</div>
	<table class="table">
    	<thead>
      		<tr>
        		<th>Fullname</th>
        		<th>Email</th>
                <th>Contact Number</th>
                <th></th>
      		</tr>
    	</thead>
		<tbody>
  			<tr>
    			<td><?=$contact['Contact']['full_name'];?></td>
    			<td>kisan@kisan.com</td>
                <td><?=$contact['Contact']['contact_number'];?></td>
                <th><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#messageBox" onclick="contacts.generateOTP()">Send Message</button></th>
  			</tr>
		</tbody>
	</table>
    <div class="modal fade" id="messageBox" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">    <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="exampleModalLabel">New message</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Recipient:</label>
                            <p>Mr. <?=$contact['Contact']['full_name'];?></p>
                            <!-- <input type="text" class="form-control" id="recipient-name"> -->
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="control-label">Message:</label>
                            <textarea class="form-control" id="message-box"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="send-message-button" onclick="contacts.sendMessage(<?=$contact['Contact']['id'];?>);">Send Message</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="/js/app.js"></script>
