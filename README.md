# nd-assessment-tools

"nd" stands for "Neuro developmental". The goal of this repository is to offer tools for performing assessments such as ADOS, ADI-R or the Vineland protocol. Since many of these are commercially protected, this solution separates application code from content so that the latter can remain private if necessary.

## Development environment setup

These instructions are the ones I used in Ubuntu, but it should be trivial to extrapolate to any other Linux distro. Also, the project should run just fine in other enviroments like Xampp.

1) Install Apache 2 web server.

```
sudo apt update
sudo apt install apache2
sudo systemctl status apache2
```

2) Install PHP, including basic modules. Then, restart Apache.

```
sudo apt install php libapache2-mod-php php-cli php-common php-mbstring php-xml
sudo systemctl restart apache2
```

3) Deploy to web root and test

Copy the source code to Apache's web root. This might require admin privileges.

```
sudo cp src/hello.php /var/www/html/hello.php
```

Open a web browser, Google Chrome for example, and navigate to `http://localhost/hello.php`.
It should display the HTML generated in hello.php. Try modifying that file, redeploying and refreshing.
You should be able to see the changes.

