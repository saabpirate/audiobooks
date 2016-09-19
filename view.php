<html>
<head>
  <title>Board Games</title>
  <link rel="stylesheet" href="css/bootstrap.css">
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script>
    $(document).ready(function() {
      $("input#submit").click(function(){
        $.ajax({
          type: "POST",
          url: "add.php", 
          data: $('form.addform').serialize(),
          success: function(msg){
            $("#submit").html(msg)
            $("#addModal").modal('hide');
          },
          error: function(){
            alert("failure");
          }
        });
      });
    });
    $(function(){
        $(document).on('click','input[type=number]',function(){ this.select(); });
    });
  </script>
</head>
<?php include 'functions.php'; ?>
<?php include 'header.php'; ?>
<body>
<br>
<br>
<br>
<br>
<?php 
   if(!empty($_POST['gtitle']) && !empty($_POST['minplayers']) && !empty($_POST['maxplayers']))
   {
     insertGame();
   }
?>
  <div class="row">
    <div class="col-md-1 col-md-offset-2">
      <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addModal">
         Add Game
      </button>
      <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labeledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4>Add Game to Database</h4>
            </div>
            <div class="modal-body">
              <form class="form" id="addform" action="view.php" method="post">
                <div class="row">
                  <div class="col-md-8 col-md-offset-2">
                    <!--<script type="text/javascript">
                       function expansionCheck() {
                          if (document.getElementById('expyes').checked) {
                              document.getElementById('expands').style.display = 'block';
                          }
                          else document.getElementById('expands').style.display = 'none';
                        }
                    </script>-->
                    <script>
                       $(document).ready(function(){
                          $('input[id="expansion"]').click(function(){
                             if($(this).attr("value")=="no"){
                                $("#expands").hide();
                                $("#minplay").show();
                                $("#maxplay").show();
                                expandsgame.required=false;
                             }
                             if($(this).attr("value")=="yes"){
                                $("#expands").show();
                                $("#minplay").hide();
                                $("#maxplay").hide();
                                expandsgame.required=true;
                             }
                          });
                       });
                    </script>
                    <div class="form-group">
                      <label for="gtitle" id="gametitle" >Game Title:</label>
                      <input type="text" id="gtitle" name="gtitle" class="form-control" required="yes">
                    </div>
                    <div>
                       <label for="expansion" id="isexpansion">Is this game an Expansion?</label>
                       <input type="radio" id="expansion" name="expyesno" value="no" checked>No
                       <input type="radio" id="expansion" name="expyesno" value="yes">Yes
                    </div>
                    <div id="expands" style="display:none">
                       <label for="expandsgame" id="expandslbl">Expands which game?</label>
                       <select name="expandsgame" class="form-control" id="expandsgame" required="yes">
                         <?php addExpansionDropDown();?>
                       </select>
                    </div>
                    <div id="minplay">
                      <label for="minplayers" id="minimum">Minimum Players:</label>
                      <input type="number" id="minplayers" class="form-control" name="minplayers" required="yes" value=1>
                    </div>
                    <div id="maxplay">
                       <label for="maxplayers" id="maximum">Maximum Players:</label>
                       <input type="number" id="maxplayers" class="form-control" name="maxplayers" required="yes" value=2>
                    </div>
                    <br>
                    <div>
                       <label for="played" id="gameplayed">Game Played?</label>
                       <input type="radio" id="played" name="played" value="no" checked>No
                       <input type="radio" id="played" name="played" value="yes">Yes
                    </div>
                    <!--<div>
                       <label for="expansion" id="isexpansion">Is this game an Expansion?</label>
                       <input type="radio" id="expansion" name="expyesno" value="no" checked>No
                       <input type="radio" id="expansion" name="expyesno" value="yes">Yes
                    </div>
                    <div id="expands" style="display:none"> 
                       <label for="expandsgame" id="expandslbl">Expands which game?</label>
                       <select name="expandsgame" class="form-control" id="expandsgame">
                         <?php #addExpansionDropDown();?>
                       </select>
                    </div>-->
                  </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <div id="gpost"><input class="btn btn-success" type="submit" value="Add" id="gamepost"></div>
                <!--<button id="apost" type="submit" class="btn btn-primary" formmethod="post" formaction="view.php" data-dismiss="modal">Add</button>-->
            </div>
          </form>
          </div><!-- -->
        </div>
      </div>
    </div>
  </div>
  <br>
  <br>
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
       <?php createList(); ?>
    </div>
  </div>

</body>
<?php include 'footer.php'; ?> 
</html>
