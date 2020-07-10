<!DOCTYPE html>
<html>
<head>
    <title>Questionaire</title>
</head>
<body>
    <h1>{{ $details['title'] }}</h1>
    <p>There is questionaire is uploaded please check and reply the question's answer</p>
    <p>Details are as follows:</p>

    <p> Adults: {{ $postdetails['adults'] }} </p>
    <p> Childrens: {{ $postdetails['childrens'] }} </p>
    <p> Infants: {{ $postdetails['infants'] }} </p>
    <p> Start Date: {{ $postdetails['start_date'] }} </p>
    <p> Length of Stay: {{ $postdetails['length_stay'] }} </p>
    <p> Flexible: {{ $postdetails['flexible'] }} </p>
    <p> Country: {{ $postdetails['country'] }} </p>
    <p> State: {{ $postdetails['state'] }} </p>
    <p> City: {{ $postdetails['city'] }} </p>
    <p> Interests: {{ $postdetails['interests'] }} </p>
    <p> Cost of Trip: {{ $postdetails['cost_trip'] }} </p>
    <p> No. of Days: {{ $postdetails['no_of_days'] }} </p>
    <p> Accommodation: {{ $postdetails['accommodation'] }} </p>
    <p> Challenges: {{ $postdetails['challenges'] }} </p>
    <p> Challenge Details: {{ $postdetails['challenge_details'] }} </p>
    <p> Name: {{ $postdetails['name'] }} </p>
    <p> Email: {{ $postdetails['email'] }} </p>
    <p>Thank you</p>
    
</body>
</html>