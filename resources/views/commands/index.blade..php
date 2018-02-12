
<html>
<head>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body>
<ul id="commands">
    @foreach ($commands as $name => $description)
    <li><a href="/commands/run/{{ $name }}">{{ $description }}</a></li>
    @endforeach
</ul>

<div id="output">

</div>

<script>

    $('#commands li a').click(function(){
        $('#output').html('<p>Running...</p>');
        $('#output').load($(this).attr('href'));
        return false;
    });
</script>

</body>
</html>
