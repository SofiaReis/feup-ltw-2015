

$(document).ready(function() {

  $( "#datepicker" ).datepicker();
  $("#event_type_edit_select").hide();


});

$(document).on('click','#event_title_edit_btn', function(){
  $("#event_title_edit").before('<section id="event_title_dynamic"> <label><span>New title :</span><input id="event_name_edit_dynamic" type="text" name="name_dym" value="'+$("#event_title_edit_h1").text()+'"/><button type="button" id="event_name_done_btn_dynamic"><i class="fa fa-check"></i></button></label></section>');
  $("#event_title_edit").remove();
  $("#event_name_done_btn_dynamic").click(function() {
    var title=$("#event_name_edit_dynamic").val();
    $("#hid_name").remove();
    $("#event_title_dynamic").before('<input type="hidden" name="name" value="' + title +'" id="hid_name">');
    $("#event_title_dynamic").before('<div id="event_title_edit"><h1> <label id="event_title_edit_h1">' + title +'</label><button type="button" id="event_title_edit_btn"><i class="fa fa-pencil-square-o"></i></button></h1></div>');
    $("#event_title_dynamic").remove();
  });
});

$(document).on('click','#event_description_edit_btn', function(){
  $("#event_description_edit").before('<section id="event_description_dynamic"><label><span>New description :</span><input id="event_description_edit_dynamic" type="text" name="description" value="'+ $("#event_description_edit_span").text() +'"/><button type="button" id="event_description_done_btn_dynamic"><i class="fa fa-check"></i></button></label></section>');
  $("#event_description_edit").remove();
  $("#event_description_done_btn_dynamic").click(function() {
    var description=$("#event_description_edit_dynamic").val();
    $("#hid_description").remove();
    $("#event_description_dynamic").before('<input type="hidden" name="description" value="' + description +'" id="hid_description">');
    $("#event_description_dynamic").before('<div id="event_description_edit" ><h2>Description:<span id="event_description_edit_span">' + description + '</span><button type="button" id="event_description_edit_btn"><i class="fa fa-pencil-square-o"></i></button></h2></div>');
    $("#event_description_dynamic").remove();
  });
});

$(document).on('click','#event_local_edit_btn', function(){
  $("#event_local_edit").before('<section id="event_local_dynamic"><label><span>New local :</span><input id="event_local_edit_dynamic" type="text" name="local" value="'+ $("#event_local_edit_span").text() +'"/><button type="button" id="event_local_done_btn_dynamic"><i class="fa fa-check"></i></button></label></section>');
  $("#event_local_edit").remove();
  $("#event_local_done_btn_dynamic").click(function() {
    var local=$("#event_local_edit_dynamic").val();
    $("#hid_local").remove();
    $("#event_local_dynamic").before('<input type="hidden" name="local" value="' + local +'" id="hid_local">');
    $("#event_local_dynamic").before('<div id="event_local_edit" ><h2>local:<span id="event_local_edit_span">' + local + '</span><button type="button" id="event_local_edit_btn"><i class="fa fa-pencil-square-o"></i></button></h2></div>');
    $("#event_local_dynamic").remove();
  });
});

$(document).on('click','#event_date_edit_btn', function(){
  $("#event_date_edit").before('<section id="event_date_dynamic"><label><span>New date :</span><input id="datepicker" class="datepicker" type="date" name="date" value="'+ $("#event_date_edit_span").text() +'"/><button type="button" id="event_date_done_btn_dynamic"><i class="fa fa-check"></i></button></label></section>');
  $("#datepicker" ).datepicker();
  $("#event_date_edit").remove();
  $("#event_date_done_btn_dynamic").click(function() {
    var date=$("#datepicker").val();
    $("#hid_date").remove();
    $("#event_date_dynamic").before('<input type="hidden" name="date" value="' + date +'" id="hid_date">');
    $("#event_date_dynamic").before('<div id="event_date_edit" ><h2>Date:<span id="event_date_edit_span">' + date + '</span><button type="button" id="event_date_edit_btn"><i class="fa fa-pencil-square-o"></i></button></h2></div>');
    $("#event_date_dynamic").remove();
  });
});

$(document).on('click','#event_type_edit_btn', function(){
  $("#event_type_edit_select").show();
  $("#event_type_edit").after('<button type="button" id="event_type_done_btn_dynamic"><i class="fa fa-check"></i></button>');
  $("#event_type_edit").remove();
  $("#event_type_done_btn_dynamic").click(function() {
    var type=$("#event_type_edit_select option:selected").text();
    $("#hid_type").remove();
    $("#event_type_edit_select").before('<input type="hidden" name="type" value="' + type +'" id="hid_type">');
    $("#event_type_edit_select").before('<div id="event_type_edit" ><h2>Type:<span id="event_type_edit_span">' + type + '</span><button type="button" id="event_type_edit_btn"><i class="fa fa-pencil-square-o"></i></button></h2></div>');
    $("#event_type_done_btn_dynamic").remove();
    $("#event_type_edit_select").hide();
  });
});
