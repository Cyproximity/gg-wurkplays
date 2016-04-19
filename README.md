# Gnasty Gaming Website
This website is for gnastygaming  and its under development process. :metal:

### Requirements
LAMP STACK
- [ ] Linux
- [x] Apache
- [x] MySQL
- [x] PHP 5.6++

Build with CodeIgniter 3 :+1:

Setup Configuration:

Copy this Virtual host configuration
```    
<VirtualHost *:80>
    DocumentRoot "C:/xampp/htdocs/gnastygaming"
    ServerName gnastygaming.dev
    ServerAlias gnastygaming.dev
    <Directory "c:/xampp/htdocs/gnastygaming">
        Order allow,deny
        Allow from all
    </Directory>
</VirtualHost>
```
    
