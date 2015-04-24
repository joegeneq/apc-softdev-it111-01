
<?php 

try {

    $url = 'mysql:dbname=dst_sts;host=localhost';
    $username = 'dst_sts';
    $password = 'dst_sts';

    // Connect to database
    $connection = new PDO($url, $username, $password);

    // Prepare and execute query
    $query = "SELECT * FROM event WHERE event_status='Active'";
    $sth = $connection->prepare($query);
    $sth->execute();

    // Returning array
    $events = array();

    // Fetch results
    while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {

        $e = array();
        $e['title'] = 
                    "Title: ".$row['event_title'].
                    "\n Date: ".$row['event_date'].
                    "\n Host: ".$row['event_host'].
                    "\n Venue: ".$row['event_venue'].
                    "\n Description: ".$row['event_description'];
        $e['start'] = $row['event_date'];
        $e['end'] = $row['event_date'];

        // Merge the event array into the return array
        array_push($events, $e);

    }

    // Output json for our calendar
    echo json_encode($events);
    exit();

} catch (PDOException $e){
    echo $e->getMessage();
}

?>