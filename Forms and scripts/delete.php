<!DOCTYPE html>
<html>
  <head>
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

      //below is the prepared statement to delete an entry from the database
      $stmt = $conn->prepare("DELETE FROM Tasks WHERE id = ?");
      $stmt->bind_param("i", $id);

      //below stores the id number taken from the html form
      $id = $_POST['id'];

      //below executes the statement
      $stmt->execute();
      echo "Record deleted successfully";

      $stmt->close();
      $conn->close();
    ?>

    <!--Below checks if the user would like to delete another entry-->
    <p>Would you like to delete another task?</p>
    <form action="/deleteform.html">
      <input type="submit" value="Yes"><br>
    </form>
    <form action="/main.html">
      <input type="submit" value="No"><br>
    </form>
  </head>
  <body>
  </body>
</html>