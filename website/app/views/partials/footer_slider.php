  </main><!-- /.container -->
  <footer class="footer-slider">
    <div class="container">
        <div class="row">
          <div class="col-sm-2">
            <p class="text-left">
              2009
            </p>
          </div>
          <div class="col-sm-8">
            Current date <span id="date"></span>
            <br>
            <span id="demo"></span>
          </div>
          <div class="col-sm-2">
            <p class="text-right">
              2017
            </p>
          </div>
        </div>
        <div class="slidecontainer">
        <input type="range" min="0" max="2813" value="0" class="slider" id="myRange">
        </div>
    </div>
  </footer>


  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="public/js/jquery-3.3.1.slim.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>  </head>
  <!--Footer slider JS-->
  <script>
    var imgOne = document.getElementById("imageOne");
    var imgTwo = document.getElementById("imageTwo");
    var slider = document.getElementById("myRange");
    var output = document.getElementById("date");
    var date = new Date(2009, 08, 17, 00, 00, 00, 00);
    var data = {"an":2210446,"ar":580541,"anurl":"https://icen-berg.space/images/arctic/NISE_SSMISF17_20090817.png","arurl":"https://icen-berg.space/images/antarctic/NISE_SSMISF17_20090817.png"};
    if(imgOne!=null){
    imgOne.src = data.arurl;
    imgTwo.src = data.anurl;
  }
    output.innerHTML = date.toLocaleDateString(); // Display the default slider value
    // Update the current slider value (each time you drag the slider handle)
    slider.oninput = function() {
        var date = new Date(2009, 08, 17, 00, 00, 00, 00);
        //document.getElementById("demo").innerHTML = this.value;
        date.setTime(date.getTime() + (this.value * 24 * 60 * 60 * 1000));
        output.innerHTML = date.toLocaleDateString();
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
           //document.getElementById("demo").innerHTML = this.responseText;
            data = JSON.parse(this.responseText);
          if(imgOne!=null){
              imgOne.src = data.arurl;
              imgTwo.src = data.anurl;
            }

            threedImage = data.arurl;
            image(threedImage);
          }
        };
        xhttp.open("GET", "data?date="+this.value, true);
        xhttp.send();



    }
  </script>

</body>
</html>
