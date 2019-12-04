<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <title>All task results</title>

</head>
<body>

<div class="container">

    @yield('content')

    <h2>Basic HTML Table</h2>

    <table style="width:100%" id="rezultate">

    <thead>
        <tr>
            <th>Keyword</th>
            <?php foreach($dates as $date): ?>
            <th>{{ $date }}</th>
            <?php endforeach; ?>
        </tr>
    </thead>
    <tbody>

    <?php $t = 0; ?>
    @foreach ($keywords as $keyword)

        <tr>
            <td align="center">{{ $keyword['post_key'] }}</td>
            <?php foreach($results[$t] as $result): ?>
            <th>{{ $result }}</th>
            <?php endforeach; ?>


        </tr>
        <?php $t += 1; ?>
    @endforeach
    </tbody>
    </table>

</div>

<div class="container">
    @yield('footer')

</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function(){
       $("#rezultate").DataTable();
    });
</script>
</body>
</html>
