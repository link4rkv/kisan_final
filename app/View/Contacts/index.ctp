<div class="container">
	<div class="page-header">
		<h2>Contacts</h2>
	</div>
	<table class="table">
    	<thead>
      		<tr>
      			<th>#</th>
        		<th>Fullname</th>
        		<th>Email</th>
      		</tr>
    	</thead>
		<tbody>
            <? foreach ($contacts as $contact) { ?>
                <tr>
                    <td><?=$contact['Contact']['id'];?></td>
                    <td><a href="/contacts/view/<?=$contact['Contact']['id'];?>"><?=$contact['Contact']['full_name'];?></a></td>
                    <td>kisan@kisan.com</td>
                </tr>    
            <? } ?>
		</tbody>
	</table>
</div>
