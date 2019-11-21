<!DOCTYPE html>
<html>
<body>

<h1>My first PHP page</h1>

<input type="text" id="name" name="Name">
<br>
<input type="text" id="school" name="ID">
<br>
<input type="button" value="ok"	onclick="display()">

<script type="text/javascript">
	function display(){
		var name = document.getElementById('name').value;
		var school = document.getElementById('school').value;
		alert('Welcome ' + name + ' from school ' + school);
	}
</script>

</body>
</html>