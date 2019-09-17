<html>

<head>
    <title>Simple List Example</title>
</head>

<link rel="stylesheet" href="{{url('/css/style.css')}}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="{{url('/script/schedule.js')}}"></script>

<body>
    <div>
        <input type="text" id="description" placeholder="test" class="box1">
        <button type="submit" id="submitSchedule" class="button1">Add Todo
    </div>
    <div style="margin-left:10px" id="checklist">
        @foreach($data as $item)
        <input type="checkbox" id="checkBox{{$item->id}}" value="{{$item->id}}" class="checkbox1" text=""><label for="checkBox{{$item->id}}">{{$item->description}} <br></label>
        @endforeach
    </div>
    <button type="submit" id="deleteSchedule" class="delete1">Delete
</body>

</html>
<script>
</script>