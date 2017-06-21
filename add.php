<!DOCTYPE html>
<html>
  <head>
  </head>
  <body>
    <h2>Add a Task:</h2>
    <form action="" method =  "post">
      Title: <input type = 'text' name = 'title'><br>
      Description: <input type = 'text' name = 'description'><br>
      Due Date: <input type = 'text' name = 'due'><br>
      Due Time: <input type = 'text' name = 'dueTime'><br>
      Completed (Y/N): <input type = 'text' name = 'completed'><br>
      <input type = "submit" value = "Add Task">
    </form>
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
      else {
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
      $stmt->execute();
      //echo "Record added successfully. ";

      $stmt->close();
      $conn->close();
    ?>
  </body>
</html>
