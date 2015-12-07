
function addClick(k){
  $("#"+k).click(function(){
    console.log("ugh");
    $("#inv_input").val(k);
    $("#addUser").show();
  });
}

$(document).ready(function(){
  $("#addUser").hide();
  $('#resultsUsername').html('<p style="padding:5px;">Start writing to search an username.</p>');

  $('#inv_input').keyup(function() {
    $("#addUser").hide();
    var searchVal = $(this).val();
    if(searchVal !== '') {

      $.get('./php/searchUsername.php?usersearch='+searchVal, function(returnData) {
        if (!returnData) {
          $('#resultsUsername').html('<p style="padding:5px;">No results were found.</p>');
          $("#addUser").hide();
        } else {
          var parsedData = JSON.parse(returnData);
          if (parsedData.length > 0){
            $('#resultsUsername').html('<span style="padding:5px;">Results:</span>');
            for(var i=0;i<parsedData.length;i++){
              var newLine="".concat('<li><button type="button" class="results-usernames-btn" id="',parsedData[i][1],'" >',parsedData[i][1],'</button></li>');
              $('#resultsUsername').append(newLine);
              addClick(parsedData[i][1]);
            }
            $('#resultsUsername').append("<br><br>");
            if (parsedData.length == 1){

            }
          }else {
            $("#addUser").hide();
            $('#resultsUsername').html('<p style="padding:5px;">No results were found.</p>');
          }


        }
      });
    } else {
      $('#resultsUsername').html('<p style="padding:5px;">Start writing to search an username.</p>');
    }


  });

});

$(document).on('click','#addUser', function(){
  $("#addUser").hide();
});
