<? include_once 'php/loadEvent.php'; ?>

<script type="text/javascript" src="./js/editEventBtn.js"></script>

<form action="" method="post" class="event-form">

  <div id="event-title-edit">
    <h1 id="event-title-edit-h1"> <? echo $event["name"]; ?>
      <button type="button" id="event-title-edit-btn">
        <i class="fa fa-pencil-square-o"></i>
      </button>
    </h1>
  </div>

  <div id="event-description-edit" >
  <h2>Description:
    <span><? echo $event["description"]; ?></span>
    <button type="button" id="event-description-edit-btn">
      <i class="fa fa-pencil-square-o"></i>
    </button>
  </h2>
</div>

  <div id="event-image-edit">
  <section>
    <img src="http://indiabright.com/wp-content/uploads/2015/10/cute.jpg" alt="event image" >
    <button type="button" id="edit_photo">
      <i class="fa fa-pencil-square-o"></i>
    </button>
    <br /> <br />
  </section>
</div>


  <br/><br/>
  <div class="onoffswitch" >
    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch">
    <label class="onoffswitch-label" for="myonoffswitch">
      <div class="onoffswitch-inner"></div>
      <div class="onoffswitch-switch"></div>
    </label>
  </div>
  <br/><br/>


  <label>
  <span>New date :</span>

    <input id="datepicker" type="date" name="date" max="1979-12-31" min="2000-01-02">

  </label>
  <!--
  <h1>Edit event
  <span>Edit the fields you wish to change.</span>
</h1>
<label>
<span>New title :</span>
<input id="event_name-edit" type="text" name="name" value=<? echo $event["name"]; ?> />
</label>

<label>
<span>New description :</span>
<textarea id="event_description-edit" name="description" value=<? echo $event["description"]; ?>></textarea>
</label>

<br/><br/>
<div class="onoffswitch" >
<input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch">
<label class="onoffswitch-label" for="myonoffswitch">
<div class="onoffswitch-inner"></div>
<div class="onoffswitch-switch"></div>
</label>
</div>
<br/><br/>

<label>
<span>New photo :</span>
<div class="fileUpload btn btn-primary" name="image">
<span>Upload</span>
<input id="uploadBtn" type="file" class="upload" name="image"/>
</div>
</label>

<label>
<span>New date :</span>
<input type="date" name="date" max="1979-12-31" min="2000-01-02">
</label>


<label>
<span>Type :</span>
<div class="styled-select">
<select id="event_type-edit"  name="type" >
<option value="concert">Concert</option>
<option value="party">Party</option>
<option value="conference">Conference</option>
<option value="meeting">Meeting</option>
</select>
</div>
</label>

<label>
<span>New local :</span>
<input id="event_local-edit" type="text" name="local" value=<? echo $event["local"]; ?> />
</label>
-->

<label>
  <span>&nbsp;</span>
  <input type="button" class="button" value="Save changes" />
</label>
</form>
