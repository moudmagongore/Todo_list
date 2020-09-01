composer:
	composer update

#Crée le fichier .env
#et lie la base de donnée avant de continuer avec la cible key.

key:
	php artisan key:generate

migrate:
	php artisan migrate

seed:
	php artisan db:seed

run:
	php artisan serve

#Tu te connecte avec l'administrateur créer par defaut 
#avec c'est informations ci-dessous:

#Email : administrateur@gmail.com
#mot de passe : 00000000
