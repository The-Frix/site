<form id="messages" method="POST">
	<p>Имя: <input type="text" name="namesend"></p>
	<p>Сообщение: <input type="text" name="messagesend" class="messagesend"></p>
	<input type="button" value="send">
</form>
<script>
	$('#submit').click(function(){
   $.ajax({ 
         type: "POST",
         url: "engine/chat.php",
         data: ('#messages').serialize(),
         success: function(response) {
            $('#table').html(response);
         }
   })
});
</script>
<textarea id="table" cols="30" rows="10">
<?php
	if (isset($_POST['messagesend'])) {
		echo $_POST['namesend'].": ".$_POST['messagesend'];
	}
?>
</textarea>