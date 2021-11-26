# Lumen

## Installation
### Cloner le repo
```sh
git clone .....
```

### composer install (se placer dans le bon dossier !)
```php
composer install
```

### Mettre les bons droits sur les dossiers
```sh
sudo chgrp -R www-data storage
sudo chmod -R g+w storage
```

### Configuration du fichier .env
__Attention, s'il y a une erreur de syntaxe dans le fichier.env, lumen affichera une page blanche !__


### Vérifier la configuration dans bootstrap/app.php
```php
// enable facades
$app->withFacades();

// enable Eloquent ORM (model classes)
$app->withEloquent();
```


### Configuration des routes
Dans le fichier routes/web.php
Exemple de route : 
```php
$router->get(
    '/',
    [
        'uses' => 'MainController@home',
        'as'   => 'main-home'
    ]
);
```