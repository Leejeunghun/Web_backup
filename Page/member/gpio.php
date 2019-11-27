<html>
 <head>
 <meta name="viewport" content="width=device-width" />
 <title>GPIO 21 Control</title>
 </head>
         <body>
         GPIO 21 Control:
         <form method="get" action="gpio.php">
                 <input type="submit" value="ON" name="on">
                 <input type="submit" value="OFF" name="off">
         </form>
	<?php
         shell_exec("gpio -g mode 21 out");
         if(isset($_GET['on'])){
                 shell_exec("gpio -g write 21 1");
		 echo "GPIO 21  is on";
		
         }
         else if(isset($_GET['off'])){
		 shell_exec("gpio -g write 21 0");
		 shell_exec("ls");
		 shell_exec("sudo python /var/www/html/camera.py ");
		 shell_exec("ls");
		 $mystring = exec('/usr/bin/python /home/pi/camera/camera.py');
		 $mystring;

		 echo "GPIO 21 is off ";
		 
         }
         ?>
         </body>
 </html>
