<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans" rel="stylesheet">
 <link rel="stylesheet" type="text/css" href="/view/assets/common.css">
 <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
  <title>HAEGROUP Guestbook</title>
</head>
<body style="font-family: 'IBM Plex Sans', sans-serif;">
	<div class="container mt-xl-5 ">
		<div class="row">
			<div class="col-sm">
				<div class="text-center">
					<img class="img-fluid" src="/view/assets/image001.jpg" alt="HAEGROUP">
				</div>
				<h5 class="text-center">HAEGROUP GUESTBOOK</h5>
				<p class="mt-xl-5 text-center">Feel free to leave us a message to tell us what you think about our service</p>
				<div>
				<form id="mess_post" action="/action/postmessage" method="POST">
					<div class="form-group">
						<label for="username_inp">User Name</label>
						<input type="text" class="form-control" id="username_inp" placeholder="Enter User">
					</div>
  					<div class="form-group">
    					<label for="message_inp">Message</label>
    					<textarea class="form-control" rows="5" id="message_inp"></textarea>
  					</div>
  					<button type="submit" class="btn btn-primary">Send Message</button>
				</form>
				</div>
			</div>
			<div  align="center"  class="col-sm col-xl-8">
				<?php foreach ($DTO->message_array as $key => $value) { ?>
					<div class="col-sm-8">
            			<div class="panel panel-white post panel-shadow">
                			<div class="post-heading">
                    			<div class="pull-left image">
                        			<img src="http://bootdey.com/img/Content/user_1.jpg" class="img-circle avatar" alt="user profile image">
                    			</div>
                    			<div class="pull-left meta">
                       				<div class="title h6">
                            			<a href="#"><b><?php echo $value['user_name'] ?></b></a> gives a comment.
                        			</div>
                    			</div>
                			</div> 
                      <form name="updmessage" action="/action/updmessage" method="POST">
                			<div class="post-description"> 
                    			<input type="text" name="content" value="<?php echo $value['message']; ?>" >
                          <input type="hidden" name="id" value="<?php echo $value['id'] ?>">
                    	</div>
                        <div class="text-center">
                          <button type="submit" class="btn btn-primary">Edit</button>
                          <button type="button" class="btn btn-primary" onclick="deleteMessage(<?php echo $value['id'] ?>)">Delete</button>
                         <!--  <a href="/action/deletemess/<?php echo  $value['id'] ?>" name="delete" class="btn btn-primary a-btn-slide-text">
                            <i class="fas fa-eraser"></i>
                            <span><strong>Delete</strong></span> 
                          </a> -->
                        </div>
                      </form>
                       
            			</div>
        			</div>
				<?php } ?>
			</div>
		</div>
	</div>
</body>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src = "https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script   type = 'text/javascript'>
$("#mess_post").submit(function(e) {
e.preventDefault(); // avoid normal submit of the form.
var form = $(this);
var url = form.attr('action');

    $.ajax({
           type: "POST",
           url: url ,
           data: { username: $('#username_inp').val(), message: $('#message_inp').val() },
           success: function(data)
           {
             location.reload(); 
           }
         });
});

function deleteMessage(id) {
 $.ajax({
           type: "POST",
           url: "/action/deletemess" ,
           data: { id: id},
           success: function(data)
           {
             location.reload(); 
           }
         });
}
</script>