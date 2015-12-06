<? include_once 'php/loadEvent.php';

if (!(isset($_GET['id'])))
{
  $_SESSION['errors']=" <script type=\"text/javascript\">
    swal({
          title: \"Error!\",
          text: \"Invalid url.\",
          type: \"error\",
          confirmButtonText: \"OK\"
    });
      </script>";
      header('Location: ./');
}
if ( !(isset($_SESSION['user_id'])) || ($authorUsername !== $_SESSION['username']) )
{
  $_SESSION['errors']=" <script type=\"text/javascript\">
    swal({
          title: \"Error!\",
          text: \"You have no permission to access this page.\",
          type: \"error\",
          confirmButtonText: \"OK\"
    });
      </script>";
      header('Location: ./');
}


?>

<script type="text/javascript" src="./js/editEventBtn.js"></script>
<script type="text/javascript" src="./js/searchUsername.js"></script>


<form action="./php/action_edit_event.php" method="post" enctype="multipart/form-data" class="event-form">
<input type="hidden" name="event_id" value="<? echo $_GET["id"]; ?>">
  <div id="event_title_edit">
    <h1> <label id="event_title_edit_h1"><? echo $event["name"]; ?></label>
      <button type="button" id="event_title_edit_btn">
        <i class="fa fa-pencil-square-o"></i>
      </button>
    </h1>
  </div>

  <div id="event_description_edit" >
  <h2>Description:
    <span id="event_description_edit_span"><? echo $event["description"]; ?></span>
    <button type="button" id="event_description_edit_btn">
      <i class="fa fa-pencil-square-o"></i>
    </button>
  </h2>
</div>

  <div id="event_local_edit" >
    <h2>Local:
      <span id="event_local_edit_span"><? echo $event["local"]; ?></span>
      <button type="button" id="event_local_edit_btn">
        <i class="fa fa-pencil-square-o"></i>
      </button>
    </h2>
  </div>

  <div id="event_type_edit" >
    <h2>Type:
      <span id="event_type_edit_span"> <? echo $type; ?></span>
      <button type="button" id="event_type_edit_btn">
        <i class="fa fa-pencil-square-o"></i>
      </button>
    </h2>
  </div>

<div id="event_type_edit_select" >
    <label>
      <span>Category :</span>
      <div class="styled-select">
        <select id="event_type-edit"  name="type" >
          <?php

            for($i=0; $i < count($types); ++$i)
            {
              echo '<option value="'.$i.'">'.$types[$i]['name'].'</option>';
            }
          ?>
      </select>
    </div>
  </label>
</div>



  <div id="event_image_edit">
  <section>
    <img src="http://indiabright.com/wp-content/uploads/2015/10/cute.jpg" alt="event image" >
    <button type="button" id="edit_photo">
      <i class="fa fa-pencil-square-o"></i>
    </button>
    <br /> <br />
  </section>
</div>

<br />
<div id="event_state_edit" >
  <h2 id="state-to-remove">State:
    <span id="event_state_edit_span"><? echo $state; ?></span>
    <button type="button" id="event_dstate_edit_btn">
      <i class="fa fa-pencil-square-o"></i>
    </button>
  </h2>

</div>
<section>
  <div class="onoffswitch" id="onoffstate">

    <input type="checkbox" name="estado" class="onoffswitch-checkbox" id="myonoffswitch">
    <label class="onoffswitch-label" for="myonoffswitch">
      <div class="onoffswitch-inner"></div>
      <div class="onoffswitch-switch"></div>
    </label>

  </div>
</section>


<br/>


  <div id="event_date_edit" >
  <h2>Date:
    <span id="event_date_edit_span"><? echo $event["date"]; ?></span>
    <button type="button" id="event_date_edit_btn">
      <i class="fa fa-pencil-square-o"></i>
    </button>
  </h2>
  </div>

  <div id="event_invites_edit" >
  <h2>Invited:
    <? foreach($invitedUsers as $invited){ ?>
    <span id="event_invites_edit_span"><? echo $invited["username"]; ?></span>
    <!--
    <button type="button" id="removeUser<? echo $invited["idUser"]; ?>">
      <i class="fa fa-times"></i>
    </button>
  -->
    <? } ?>
    <div id="inviteNew">
      Invite (please input username):
      <input type="text" id="inv_input"/>
      <button type="button" id="addUser">
        <i class="fa fa-check"></i>
      </button>
      <ul>
      <div id="resultsUsername">
      </div>
    </ul>
    </div>

  </h2>
  </div>

  <label>
    <span>&nbsp;</span>
    <input type="submit" class="button" value="Save changes" />
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


</form>
