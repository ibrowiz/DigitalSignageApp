Hi {{$firstname}},
<p>Your registration is completed. Please click the link to get access</p>
<a href="{{route('admin.confirmation', $token)}}">{{route('admin.confirmation', $token)}}</a>
<p>Your username is &nbsp;&nbsp; {{$email}}</p>
<p>Your Password is &nbsp;&nbsp; {{$unhashedpassword}}</p>