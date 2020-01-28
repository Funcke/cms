<div class="container padding mt-5">
    <div class="card mb-3">
        <div class="card-body text-center">
		<h2 class="card-title">Vocab Lection: <?= $params['quiz']['metadata']->Title ?></h2>
		<table class="table">
			<thead>
				<tr>
				<th scope="col">Englisch</th>
				<th scope="col">Deutsch</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($params['quiz']['content'] as $quiz): ?>
					<tr>
						<td onclick="speakEn('<?=$quiz->English ?>')"><?= $quiz->English?></td>
						<td onclick="speakGer('<?=$quiz->German ?>')"><?= $quiz->German ?></td>
					</tr>	
				<?php endforeach; ?>
				</tbody>
			</table>
			<hr class="light">
			<a href="/vocab/train?id=<?=$params['quiz']['metadata']->id ?>&format=en">Train now!</a>
        </div>
    </div>   
</div>



<script>
function speakEn(text) { 
	var msg = new SpeechSynthesisUtterance();
	msg.text = text;
	msg.lang = 'en-US';
	msg.volume = 1; // 0 to 1
	msg.rate = 1; // 0.1 to 10
	msg.pitch = 2; //0 to 2

	speechSynthesis.speak(msg);  
  }

  function speakGer(text) { 
	var msg = new SpeechSynthesisUtterance();
	msg.text = text;
	msg.lang = 'de-DE';
	msg.volume = 1; // 0 to 1
	msg.rate = 1; // 0.1 to 10
	msg.pitch = 2; //0 to 2

	speechSynthesis.speak(msg);  
  }
</script>