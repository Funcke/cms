<form method="POST" action="/vocab" >
    <div>
        <label> Enter Quiz Name: </label>
        <input type="text" name="name" required/>
    </div>
    <div id="vocab_space">
        <div class="vocab_pair">
            <label>Enter Word: </label>
            <input type="text" name="vocabs[0][]" required/>
            <input type="text" name="vocabs[0][]" required/>
        </div>
    </div>
    <input type="submit" value="send"/>
    <button onclick="addNewPair()">Add new Pair</button>
</form>

<script>
    let pair_count = 1;
    function addNewPair() {
        $('#vocab_space').append('<div>'
        +'<label>Enter Word: </label>'
        +'<input type="text" name="vocabs[' + pair_count + '][]" required/>'
        +'<input type="text" name="vocabs[' + pair_count + '][]" required/>'
    +'</div>');
        pair_count += 1;
    }
</script>