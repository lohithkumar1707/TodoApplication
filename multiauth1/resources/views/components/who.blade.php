@if (Auth::guard('web')->check())
	<p class="text-success">
		You are logged In as a <strong>USER</strong>
	</p>

@endif

@if (Auth::guard('admin')->check())
	<p class="text-success">
		You are logged In as a <strong>ADMIN</strong>
	</p>

@endif