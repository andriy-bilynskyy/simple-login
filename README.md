## simple-login
Simple login php page which provides integration of user pages (wrap them with login functionality).
#### Usage

- Copy content to webserver data folder (ex: */var/www/html*)
- Create password folder. See  *simple_login/login.ini* file for location.for example:

        mkdir -m 700 /web-ext
        chown www-data:www-data /web-ext/

- Page with no user data is ready. To add examples as user data copy examples/user.ini to user ini file location. See  *simple_login/login.ini*