<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link href='../fullcalendar.css' rel='stylesheet' />
<link href='../fullcalendar.print.css' rel='stylesheet' media='print' />
<!--<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../css/site.css">-->
<script src='../lib/moment.min.js'></script>
<script src='../lib/jquery.min.js'></script>
<script src='../fullcalendar.min.js'></script>
<script>

    $(document).ready(function() {

        /*$('#calendar').fullCalendar({
            defaultDate: '2015-02-12',
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            events: [
                {
                  "title": "Presentation at the temple",
                  "url": "/",
                  "start": "2015-02-02"
                },
                {
                  "title": "Saint Blaise",
                  "url": "/",
                  "start": "2015-02-03"
                }
            ]
        });*/

        //Code that calls php file

        $('#calendar').fullCalendar({
            defaultDate: '2015-03-01',
            header: {
                left:   'prev, ',
                center: 'title',
                right:  'next',
            },
            eventSources: [
                //'json/events.json',
                'getEvent.php'
            ]
        });

        $('#calendar').fullCalendar('option', 'aspectRatio', 1.5);
    });

</script>
</head>
<style type="text/css">
</style>
<body>
    <center>
    <div id='calendar'></div>
    </center>
</body>
</html>
