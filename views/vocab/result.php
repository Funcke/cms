<br/>
<div class="container">
<h1>Yay! You finished your Quiz!</h1>
<h3>Here's what you got correct:</h3>
<hr class="light"/>
<table id="myTable">
	<thead>
		<tr>
			<th>
				English
			</th>
			<th>
				German
			</th>
			<th>
				Correct
			</th>
		</tr>
	</thead>
	<tbody>
		<? foreach($params['correct'] as $QuizPart): ?>
		<tr>
			<td><?= $QuizPart->English ?></td>
			<td><?= $QuizPart->German ?></td>
			<td><span class="badge badge-success badge-pill">+</span></td>
		</tr>
		<? endforeach; ?>
	</tbody>
</table>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
<script>
	$(document).ready( function () {
    $('#myTable').DataTable();
	} );
	
</script>
</div>