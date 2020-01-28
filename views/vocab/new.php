<div class="container padding mt-5">
    <div class="card mb-3">
        <div class="card-body">
            <h4 class="card-title">Add a new Quiz</h2>
            <hr class="light">
            <form method="POST" action="/vocab" >
                <div class="form-group"> 
                    <label> Enter Quiz Name: </label>
                    <input type="text" class="form-control" name="name" required/>
                </div>
                <div id="vocab_space" class="form-group">
                    <div class="vocab_pair">
                        <label>Enter Word: </label>
                        <input type="text" class="form-control" name="vocabs[0][]" required/>
                        <input type="text" class="form-control" name="vocabs[0][]" required/>
                    </div>
                </div>
                <hr class="light">
                <input type="submit" class="btn btn-primary" value="send"/>
                <button onclick="addNewPair()" class="btn btn-secondary">Add new Pair</button>
            </form>
        </div>
    </div>   
</div>
<script>
    let pair_count = 1;
    function addNewPair() {
        $('#vocab_space').append('<div>'
        +'<label>Enter Word: </label>'
        +'<input type="text" class="form-control" name="vocabs[' + pair_count + '][]" required/>'
        +'<input type="text" class="form-control" name="vocabs[' + pair_count + '][]" required/>'
    +'</div>');
        pair_count += 1;
    }
</script>