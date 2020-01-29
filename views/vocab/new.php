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
                          <div class="input-group mb-2">
                            <div class="input-group-prepend">
                              <div class="input-group-text">English </div>
                            </div>
                            <input type="text" class="form-control" name="vocabs[0][]" >
                          </div>
                          <div class="input-group mb-2">
                            <div class="input-group-prepend">
                              <div class="input-group-text">German</div>
                            </div>
                            <input type="text" class="form-control" name="vocabs[0][]">
                          </div>
                    </div>
                </div>
                <hr class="light">
                <input type="submit" class="btn btn-primary" value="send"/>
                <button onclick="addNewPair()" class="btn btn-secondary">Add new Pair</button>
            </form>
            <!--<form method="POST" action="/vocab/import" enctype="multipart/form-data">-->
                <div class="form-group">
                    <label for="exampleFormControlFile1">Example file input</label>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1">
                  </div>
                  <button type="button" class="form-control btn btn-warning" onclick="import_file()">Load</button>
            <!--</form>-->
        </div>
    </div>   
</div>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    let pair_count = 1;
    function addNewPair() {
        $('#vocab_space').append('<label>Enter Word</label><div class="input-group mb-2">'
                            +'<div class="input-group-prepend">'
                              +'<div class="input-group-text">English </div>'
                            +'</div>'
                            +'<input type="text" class="form-control" name="vocabs[0][' + pair_count + ']" >'
                          +'</div>'
                          +'<div class="input-group mb-2">'
                            +'<div class="input-group-prepend">'
                              +'<div class="input-group-text">German</div>'
                            +'</div>'
                            +'<input type="text" class="form-control" name="vocabs[0][' + pair_count + ']">'
                          +'</div>');
        pair_count += 1;
    }
    
    function import_file() {
        var file = document.getElementById("exampleFormControlFile1").files[0];
        if (file) {
            var reader = new FileReader();
            reader.readAsText(file, "UTF-8");
            reader.onload = function (evt) {
                parser = new DOMParser();
                xmlDoc = parser.parseFromString(evt.target.result,"text/xml");
                console.log(xmlDoc);
                let quiz_title = xmlDoc.getElementsByTagName("name")[0].childNodes[0].nodeValue;
                let vocabs = [];
                [...xmlDoc.getElementsByTagName("var")].forEach(function(variable) {
                    vocabs.push([variable.getAttribute("en"), variable.getAttribute("de")]);
                });
                console.log(vocabs);
                axios.post('/vocab/import', {title: quiz_title, vocab: vocabs}).then(function() {
                    window.location.replace("/vocab");
                });
            }
            reader.onerror = function (evt) {
                document.getElementById("fileContents").innerHTML = "error reading file";
            }
        }   
    }
</script>