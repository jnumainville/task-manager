This is as inventory management project utilizing a WAMP server. It is also a WIP.   
init.php initializes the database.  
add.php runs the user interface.  
init.php should run once and should return an error after.
table.php should then be ran to create the necessary table within the database.
add.php can then be accessed.  
On the Bitnami WAMP server specifically the files were moved to htdocs under the apache2 directory. The scripts can then be accessed by going to localhost/init.php, localhost/table.php or localhost/add.php.  
Other setups are not, at this time, directly supported, but should still work, as long as they support MySQLi Object-Oriented.  
