@foreach($news as $oneNews)
    {{__($oneNews->title)}}<br>
    {{__($oneNews->description)}}
    <hr>
@endforeach
