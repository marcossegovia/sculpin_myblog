---
title: Ajax, dynamic data callback
categories:
    - PHP
    - Javascript
tags:
    - ajax
    - frontend
---

As a PHP disciple I was really afraid of JS intends to cooperate with data from Server.
I always tried to separate and be clear about the differences in the gap between server-side and client-side. I’ve always seen JS as a nice complement to the well-known dynamic fluency web content rather than content manage around the controller, there is where our new friend comes out: AJAX.

The main goal?
**Manage php content without the need of refreshing our website**.

We do not ask to the server, we just do it locally.
THIS IS NOT A PHP ALTERNATIVE, because there is no way to do that by PHP. We could not ask the server by php if it’s not asking again to the server. REQUEST->RESPONSE you know, server manners.

Here I write for you and example illustrating the usage of Ajax:

~~~php
/**
* PHP function in our controller called by Ajax using POST
*/

function dataEdit()
{
 //Variable id assigned in the ajax function
 $amazingStuff = $_POST('id');

 //what you want to do during the ajax call
//Sending data back with echo or calling view functions, call to do things in DataBases, etc.
}

~~~
~~~javascript
/*
** This Script, gets an id from a row and a name from the input of that row
** and updates the name after Ajax called is completed
*/

<script type="text/javascript"  charset="utf-8">

$(document).ready(function()
{
    $(".edit_button").click(function()
    {
      var ID = $(this).attr('id');
      var name = $("#iname_input_"+ID).val();
    })
    $(".edit_tr").change(function()
    {
        var ID = $(this).attr('id');

        $.ajax({
        type: "POST",
        url: "controller.php",
        data: {id:ID},
        cache: false,
        success: function(html)
        {
            $("#name"+ID).html(name);
        }
        });

    });

    // Edit input box click action
    $(".editbox").mouseup(function()
    {
    return false
    });

    // Outside click action
    $(document).mouseup(function()
    {
    $(".editbox").hide();
    $(".text").show();
    });
});

</script>
~~~
~~~html
/*
** We just display the names and add an edit button to be able
** to modify them
** $dataTable is a variable passed to the template and it is an array
** of names
**
*/

<div>
    <table>
        <tr>
            <td><b> Name </b></td>
        </tr>
        <?php $id=0; ?>
        foreach($dataTable as $dataRow): ?>
        <tr class="edit_tr" id="<?php echo $id; ?>">

            <td>
                <span id="name_<?php echo $id; ?>" class="text"><?php echo $dataRow ?></span>
                <input type="text" value="<?php echo $dataRow; ?>" class="editbox" id="iname_input_<?php echo $id; ?>">
            </td>
            <td>
                <input type="submit" value="Edit" id="<?php echo $id; ?>" class="edit_button">
            </td>
        </tr>
        <?php $id++; ?>
        <?php endforeach; ?>
    </table>
</div>
~~~

And that is how you simply do it.