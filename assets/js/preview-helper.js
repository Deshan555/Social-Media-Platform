function preview()
{
    frame.src = URL.createObjectURL(event.target.files[0]);
}

function get_caption()
{
    var caption_data = document.getElementById("caption").value;

    console.log(caption_data);

    document.getElementById("caption-data").innerHTML = caption_data;

    let date = new Date().toJSON();

    document.getElementById("current-date").innerHTML = date;

}

function get_hash()
{
    var hash_data = document.getElementById("tag-id").value;

    document.getElementById("hash-tags").innerHTML = hash_data;

    let date = new Date().toJSON();

    document.getElementById("current-date").innerHTML = "\t "+date;
}

function invite_link()
{
    var link_data = document.getElementById("url-id").value;

    document.getElementById("links").innerHTML = link_data;

    let date = new Date().toJSON();

    document.getElementById("current-date").innerHTML = "\t "+date;
}

function get_date()
{
    var date_data = document.getElementById("date_id").value;

    document.getElementById("event-date").innerHTML = "Event Will Be Held On "+date_data;

    let date = new Date().toJSON();

    document.getElementById("current-date").innerHTML = "\t "+date;
}

function clearImage()
{
    document.getElementById('formFile').value = null;

    frame.src = "";
}