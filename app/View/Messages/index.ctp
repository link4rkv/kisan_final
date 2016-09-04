<div class="container">
	<div class="page-header">
		<h2>Messages Sent</h2>
	</div>
	<table class="table">
    	<thead>
      		<tr>
      			<th>#</th>
        		<th>Contact Name</th>
        		<th>OTP</th>
                <th>Created</th>
      		</tr>
    	</thead>
		<tbody>
            <? foreach ($messages as $key => $message) { ?>
                <tr>
                    <td><?=$key+1;?></td>
                    <td><?=$message['Contact']['full_name'];?></a></td>
                    <td><?=$message['Message']['otp'];?></td>
                    <td><?=$message['Message']['created'];?></td>
                </tr>    
            <? } ?>
		</tbody>
	</table>
</div>
