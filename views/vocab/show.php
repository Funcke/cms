<h2>Vocab Lection: <?= $params['quiz']['metadata']->Title ?></h2>
<ul>
    <? foreach($params['quiz']['content'] as $quiz): ?>
        <li><span onclick="speakEn('<?=$quiz->English ?>')"><?= $quiz->English?></span> - <span onclick="speakGer('<?=$quiz->German ?>')"><?= $quiz->German ?></span></li>
    <? endforeach; ?>
</ul>
<a href="/vocab/train?id=<?=$params['quiz']['metadata']->id ?>&format=en">Train now!</a>

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