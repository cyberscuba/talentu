# Api Talentu

API para bolsa de empleo, usando php en symfony 5.4, se implementa JWT.

### Pre-requisitos 📋
Los requisitos puntuales para el funcionamiento del programa son los
siguientes:
```
PHP 7.4
Symfony 5.4
MySql 5
```
_Se utilizan los datos de conexión en .env file_
### Instalación 🔧

_**1.** Asumiendo que ya se tiene instalado los pre-requisitos en la maquina local, 
clone el programa:_
```
https://github.com/cyberscuba/talentu.git
```
_**2.** Luego, ejecute el comando sobre el directorio raiz del programa
clonado:_
```
composer update
```
_**3.** Ejecute las migraciones_
```
bin/console doctrine:migrations:migrate
```
### Validación API REST
Una vez validado el servicio, consulte los endpoints del API REST en los siguientes enlaces:

### Postulant:
- _**create_postulant**: Este endpoint permite crear los postulantes en el api._  

**POST** /api/v1/postulant/create_postulant

![alt text](https://github.com/cyberscuba/talentu/blob/main/public/create_postulant.png "Create postulant")

### Offer:
- _**create_offer**: Este endpoint permite crear las ofertas laborales en el api._ 

**POST** /api/v1/offer/create_offer

![alt text](https://github.com/cyberscuba/talentu/blob/main/public/create_offer.png "Create offer")

- _**create_offer_postulant**: Este endpoint permite crear el enlace entre oferta y postulante._
 
**POST** /api/v1/offer/create_offer_postulant
![alt text](https://github.com/cyberscuba/talentu/blob/main/public/create_offer_postulant.png "Create offer postulant")

### OfferList:

- _**offer_list**: Este endpoint permite listar los postulantes relacionados a una oferta._

**GET** /api/v1/offer/offer_list
![alt text](https://github.com/cyberscuba/talentu/blob/main/public/offer_list.png "Create offer list")

---
Trabajo realizado por [Carlos A Martínez](https://www.linkedin.com/in/carlosamartinezs/)
