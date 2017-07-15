<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8">
</head>
<body>
	<div>Hi,</div>
	<h3>User <span style="color: red;">{{ $user }}</span> just created a new contact :</h3>
	<div> First Name: {{ $fname }} </div>
	<div> Last Name: {{ $lname }} </div>
	<div> Phone: {{ $phone }} </div>
	<div> Address: {{ $address }} </div>
</body>
</html>