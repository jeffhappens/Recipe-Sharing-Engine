<p>Hey {{ $first_name }}!</p>
<p>{{ $inviter }} has invited you to share recipes at {{ $_SERVER['HTTP_HOST'] }}</p>
<p>Just visit this link to get started: {{ $_SERVER['HTTP_HOST'] }}/refer/{{ $email }}/{{ $invite_token }}</p>