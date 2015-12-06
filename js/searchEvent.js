
$(document).ready(function(){
  $('#results').html('<p style="padding:5px;">Start writing to search an event.</p>');

  $('#eventsearch').keyup(function() {
    console.log("ugh");
    var searchVal = $(this).val();
    if(searchVal !== '') {

      $.get('./php/searchevent.php?eventsearch='+searchVal, function(returnData) {
        if (!returnData) {
          $('#results').html('<p style="padding:5px;">No results were found.</p>');
        } else {
          $('#results').html('<p style="padding:5px;">Results:</p>');
          var parsedData = JSON.parse(returnData);
          for(var i=0;i<parsedData.length;i++){
            var output="".concat(parsedData[i][1]," @",parsedData[i][2]);
            var newLine="".concat('<li><img src="',parsedData[i][4],'" ><h3><a href="./?pagina=showEvent&id=',parsedData[i][0],'">',output,'</a></h3><p>',parsedData[i][3],'</p><p>Created by: ', parsedData[i][6] ,'</p></li><br>');
            $('#results').append(newLine);
          }
          $('#results').append("<br><br>");

        }
      });
    } else {
      $('#results').html('<p style="padding:5px;">Start writing to search an event.</p>');
    }


  });

});
