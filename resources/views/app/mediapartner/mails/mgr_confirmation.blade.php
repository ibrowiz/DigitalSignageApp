Hi {{$first_name}},
<p>Your registration is completed. Please click the link to get access</p>
<a href="{{route('confirmation', $token)}}">{{route('confirmation', $token)}}</a>
<p>Your username is &nbsp;&nbsp; {{$email}}</p>
<p>Your Password is &nbsp;&nbsp; {{$unhashedpassword}}</p>