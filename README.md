## symfony3 forms tutorial

This tutorial was created to be an example on how proper form validation may be done.

### Installation procedures

```
composer install
```

#### Sample Apache (2.4) VirtualHost configuration
```
<VirtualHost *:80>
    ServerName symfony-forms.local

    DocumentRoot /var/www/symfony3_forms_tutorial/web
    <Directory /var/www/symfony3_forms_tutorial/web>
        DirectoryIndex app_dev.php
        AllowOverride All
        Order Allow,Deny
        Allow from All
        <IfModule mod_rewrite.c>
            Options -MultiViews
            RewriteEngine On

            RewriteRule ^(.*)$ app_dev.php [QSA,L]
        </IfModule>

    </Directory>

    ErrorLog /var/log/apache2/project_error.log
    CustomLog /var/log/apache2/project_access.log combined
</VirtualHost>
```