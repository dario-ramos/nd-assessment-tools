# nd-assessment-tools

"nd" stands for "Neuro developmental". The goal of this repository is to offer tools for performing assessments such as ADOS, ADI-R or the Vineland protocol. Since many of these are commercially protected, this solution separates application code from content so that the latter can remain private if necessary.

## Development environment setup

These instructions are the ones I used in Ubuntu, but it should be trivial to extrapolate to any other Linux distro. Also, the project should run just fine in other enviroments like Xampp.

1) Install PHP, including basic modules and the MySQL connector.

```
sudo apt install
sudo apt install php
sudo apt install php-cli php-common php-mbstring php-xml php-curl php-mysql
```

2) Install MariaDB server.

MariaDB is a fork of MySQL. It leans more towards the open source world than MySQL, which is now owned by Oracle.

```
sudo apt install mariadb-server
sudo service mariadb start
```

3) Install Composer

Composer is a dependency manager for PHP.

```
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php composer-setup.php
php -r "unlink('composer-setup.php');"
sudo mv composer.phar /usr/local/bin/composer
composer --version
```

4) Install nvm and npm

Nvm is the Node Version Manager, and npm is the Node Package Manager. These are used by Laravel to handle the UI assets.

```
wget -qO- https://raw.githubusercontent.com/nvm-sh/nvm/v0.40.3/install.sh | bash
source $HOME/.bashrc
nvm -v
nvm install --lts
nvm use --lts
nvm alias default 'lts/*'
npm -v
node -v
```

4) Install Laravel

Laravel is a full-stack framework used for PHP development.

```
sudo apt install php-curl
composer global require laravel/installer
composer global config bin-dir --absolute
```

The last command will tell you where composer installs its global binaries. You will need to add that to the PATH environment variable so that the terminal can find the Laravel executables. In Ubuntu, that would be done like this:

```
nano $HOME/.bashrc
```

This will open the bashrc text file for editing. Go to the end and add a line like:

```
export PATH="$PATH:<replace the path informed by Composer here>
```

A typical value for this path would be `$HOME/.config/composer/vendor/bin`. Finally, reload the Bash configuration and test Laravel:

```
source $HOME/.bashrc
laravel -v
```

5) Configure database

Replace 'password' by an appropriate secure password.

```
# Log into MariaDB
sudo mariadb

# Execute these commands at the MariaDB prompt (>)
> CREATE DATABASE nd_assessment_db;
> CREATE USER 'nd_assessment_admin'@'localhost' IDENTIFIED BY 'password';
> GRANT ALL PRIVILEGES ON nd_assessment_db.* TO 'nd_assessment_admin'@'localhost';
> FLUSH PRIVILEGES;
> EXIT;
```

Inside the `src/nd-assessment-app` directory, open the `.env` file and adjust the values of the `DB_DATABASE`, `DB_USERNAME` and `DB_PASSWORD` environment variables to match the values configured in the MariaDB server.

Then, create the basic administrative tables:

```
php artisan migrate
```


6) Test locally.

Launch the application

```
composer run dev
```

Open a web browser, Google Chrome for example, and navigate to `http://localhost:8000/`.
It should display the Laravel welcome page. Try modifying that file, redeploying and refreshing.
You should be able to see the changes.

