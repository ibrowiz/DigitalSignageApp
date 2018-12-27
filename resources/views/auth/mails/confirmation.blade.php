Hi {{$name}},
<p>Your registration is completed. Please click the link to get access</p>
<a href="{{route('confirmation', $token)}}">{{route('confirmation', $token)}}</a>