<!DOCTYPE html>
<html>
<body>

<h1>My first PHP page</h1>
<p>Name:</p>
<input type="text" id="name">
<br>
<p>School:</p>
<input type="text" id="school">
<br>
<input type="button" value="ok"	onclick="display()">

<script type="text/javascript">
	function checkInput(){
		var name = document.getElementById('name').value;
		if (name.length <5){
			alert('Name must be more than 5 characters');
		}
	}
	function display(){
		checkInput();
		var name = document.getElementById('name').value;
		var school = document.getElementById('school').value;
		alert('Welcome ' + name + ' from school ' + school);
	}
</script>

</body>
</html>