<html>
 <head>
  <title>Session Hijacking Preventor</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
  <style>
  body
  {
   margin:0;
   padding:0;
   background-color:#f1f1f1;
  }
  .box
  {
   width:500px;
   border:1px solid #ccc;
   background-color:#fff;
   border-radius:5px;
   margin-top:100px;
  }
  #load_posts
  {
   padding:16px;
   background-color:#f1f1f1;
   margin-bottom:30px;
  }
  #load_posts p
  {
   padding:12px;
   border-bottom:1px dotted #ccc;
  }
  </style>
 </head>
 <body>
  <div class="container box">
   <form name="add_post" method="post">
    <h3 align="center">Post Page</h3>
    <div class="form-group">
     <textarea name="post_name" id="post_name" class="form-control" rows="3"></textarea>
    </div>
    <div class="form-group" align="right">
     <input type="button" name="post_button" id="post_button"  value="Post" class="btn btn-info" />
     
    </div>
   </form>
   
   <br />
   <br />
   <div id="load_posts"></div>
   <!-- Refresh this Div content every second!-->
   <!-- For Refresh Div content every second
     we use setInterval() !-->
  </div>
 </body>
</html>
<script>
$(document).ready(function(){
 $('#post_button').click(function(){
  var post_name = $('#post_name').val();
  //trim() is used to remover spaces
  if($.trim(post_name) != '')
  {
   $.ajax({
    url:"post.php",
    method:"POST",
    data:{post_name:post_name},
    dataType:"text",
    success:function(data)
    {
     $('#post_name').val("");
    }
   });
  }
 });
 
 setInterval(function(){//setInterval() method execute on every interval until called clearInterval()
  $('#load_posts').load("display.php").fadeIn("slow");
  //load() method fetch data from fetch.php page
 }, 1000);
 
});
</script>