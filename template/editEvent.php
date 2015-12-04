<? include_once 'php/loadEvent.php'; ?>

<form action="" method="post" class="event-form">
    <h1>Contact Form
        <span>Please fill all the texts in the fields.</span>
    </h1>
    <label>
        <span>Title :</span>
        <input id="event_name-edit" type="text" name="name" value=<? echo $event["name"]; ?> />
    </label>

    <label>
        <span>Your Email :</span>
        <input id="email" type="email" name="email" placeholder="Valid Email Address" />
    </label>

    <label>
        <span>Description :</span>
        <textarea id="event_description-edit" name="description" value=<? echo $event["description"]; ?>></textarea>
    </label>
     <label>
        <span>Subject :</span><select name="selection">
        <option value="Job Inquiry">Job Inquiry</option>
        <option value="General Question">General Question</option>
        </select>
    </label>
     <label>
        <span>&nbsp;</span>
        <input type="button" class="button" value="Send" />
    </label>
</form>
