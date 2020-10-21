# Visionable Code Test

Please complete the following test to provide a sample of your programming skills.  Timing for this test begins now.  You can take up to four hours to complete this test.  Time is certainly a factor, but don't rush too much - we want to see your best work.

In addition to the test results, if you would like to share a sample of particularly good code that you have written, you are welcome to include it with your response.

Create a REST API for hospital clinics.

The hospital can have any number of Clinics, and each Clinic can have any number of Appointments.

These Clinics and Appointments must be stored in a database.

This API should allow you to add, modify, delete, and retrieve Clinics and Appointments.

Each Clinic should have:

- a unique ID
- a name

Each Appointment should have:

- a unique ID
- a name
- an associated Clinic
- a start-time
- a duration

A clinic cannot have overlapping appointments.

This test must be written in PHP, run on Linux, and can use SQLite for the database.

Write this exactly as you would for an actual project. This should be a showcase of your programming style. The amount of error handling, testing, documentation, etc., if any, is up to you.

Email a zip file of your code back as soon as you have it completed. Please include a dump of the database or the SQLite database file.


# My Answer

Run 1 time
```sh
docker run -v $(pwd):/app php php /app/index.php
```

Run many times
```sh
docker run -it -v $(pwd):/app php bash
php /app/index.php

#choose a command

#create a clinic
curl -d "type=clinic&name=Foxtrot" http://localhost
#example response
{
  "status": true,
  "name": "Foxtrot",
  "id": 6
}

#change a clinic
curl -X PUT -d 'type=clinic&id=5&name=Echo%20Changed" http://localhost
#example response
{
  "status": true,
  "message": "Clinic #5 name changed to \"Echo Changed\""
}

#show a clinic
curl -X http://localhost/clinic/1
#example response
{
  "status": true,
  "name": "Alpha",
  "id": 1
}

#delete a clinic
curl -X DELETE -d 'type=clinic&name=2" http://localhost1
curl -X DELETE -d 'type=clinic&name=Echo%20Changed" http://localhost1
#example response
{
  "status": true,
  "message": "Clinic #2 deleted"
}

#for all commands' phase json supporting command, add this flag
-H "Content-Type: application/json"
#and reformat `-d` data
```

# Reference
* [PHP CRUD](https://www.onlyxcodes.com/2020/05/php-crud-api-tutorial.html)
* [SQLite](https://www.shiphp.com/blog/2018/php-sqlite-docker)
