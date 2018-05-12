Sujet du Projet:
- Magasin de goodies

Installation:
- git clone: https://github.com/P-Ced/cedprojet
- Editer le fichier models/db.php. Modifier le login/pass pour la connexion à la db en ligne 5 (par défaut: login:'root', password:'').
- importer le dump qui se trouve à la racine du répertoire (cedprojet.sql).

Créer un nouveau host dans /etc/hosts.
```
127.0.0.1 projet.local
```
Créer un vhost pour votre projet.
```
##### 
## cedprojet.local 
## DOMAINE de cedprojet 
##### 
NameVirtualHost cedprojet.local

<Directory "C:/wamp/www/cedprojet/">
AllowOverride All
Options Indexes MultiViews FollowSymLinks
Require all granted
</Directory>

<VirtualHost cedprojet.local> 
DocumentRoot C:/wamp/www/cedprojet/ 
ServerName cedprojet.local
</VirtualHost>
```

Utilisateur de test 'Admin':
- login: cedric
- password: 123

Utilisateur de test 'Client':
- login: koko
- password: 123
