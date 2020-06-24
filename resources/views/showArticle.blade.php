
<h2>{{ $articles->title }}</h2>
<ul>
    <li><strong>{{ $articles->author }}</strong></li>
    <li>{{$articles->date}}</li>
    <li><img src = "{{$articles->image}}"></li>
    <li>{{$articles->description}}</li>
</ul>
