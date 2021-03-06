<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="../style.css">
  </head>
  <body>
    <?php
      /*$servername, $username, $password, and $port are used to connect to the
      mySQL server. change as necessary for your installation. 3306 is the
      default port used by WAMP. */
      $servername = "localhost";
      $username = "user";
      $password = "password";
      $dbname = "List";
      $port = 3306;

      //Creates a new connection to the server utilizing variables above.
      $conn = new mysqli($servername, $username, $password, $dbname, $port);

      /* Below checks to ensure a connection to the server is made. If failed,
      the error message is given.
      This is commented out as it is unnecessary in the client-side app.
      if ($conn->connect_error) {
        die("Connection failed for the following reason: " .
        $conn->connect_error);
      }
      class = "button" else {
        echo "Connection established. ";
      }
      */

      //below is the prepared statement to be executed on inputs
      $stmt = $conn->prepare("INSERT INTO Tasks (title, description, due, dueTime, completed)
      VALUES (?, ?, ?, ?, ?)");
      $stmt->bind_param("sssss", $title, $description, $due, $dueTime, $completed);

      //below stores the data to enter to the table
      $title = $_POST['title'];
      $description = $_POST['description'];
      $due = $_POST['due'];
      $dueTime = $_POST['dueTime'];
      $completed = $_POST['completed'];

      //below executes the assignment
      if (trim($title) == "" || trim($due) == "" || trim($dueTime) == "") {
        echo "Task not added due to empty field. Only description can be empty.";
      }
      else if ($completed != "N" && $completed != "Y") {
        echo "Task not added due to invalid field. Completed must be Y or N.";
      }
      else {
        $stmt->execute();
        echo "Task added successfully. ";
    }

      $stmt->close();
      $conn->close();
    ?>

    <!--Below checks if the user would like to add another task-->
    <p>Would you like to add another task?</p>
    <form action="./addform.html">
      <input class = "button" type="submit" value="Yes"><br>
    </form>
    <form action="../main.html">
      <input class = "button" type="submit" value="No"><br>
    </form>
  </body>
</html>
