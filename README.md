## Medical prescription API Laravel package
This is a very basic medical prescriptions API package intended to extend a Laravel application with an independent set of tables and a convinient CRUD interface.
### Installation
In order to use this package you need to add it as a *repository* in your Laravel application **composer.json** file ([visit composer documentation to learn more about repositories](https://getcomposer.org/doc/05-repositories.md))
```
{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/Mazagu/prescriptions"
        }
    ],
    "require": {
        "monolog/monolog": "dev-bugfix"
    }
}
```
Once the repository is added you can require it as any dependency:
```
composer require bluesourcery/prescription
```
The package will be installed in your application's **vendor** folder. After the first installation running the migrations to create the new tables is required.
```
php artisan migrate
```
The last step is to *publish* the package's configuration and resources files to your application. To achive this you'll need to run:
```
php artisan vendor:publish --provider("Bluesourcery\Prescription\PrescriptionServiceProvider") --tag="config"
```
The configuration file will be created in your application's **config** folder with the name **prescription.php**. 
To copy all language files run:
```
php artisan vendor:publish --provider("Bluesourcery\Prescription\PrescriptionServiceProvider") --tag="locale"
```
The **resources\lang** foder will be populated with the available language files.
## Configuration
### Authentication middleware
By default the package's routes aren't protected with any authentication middleware. You need to configure any middleware you want to apply in the **prescription.php** file in your **config** folder.
```
<?php

return [
    'middleware' => [],
    'notificationEmails' => []
];
```
As stated, by default **middleware** is an empty array, you can fill it with any route middeware your application is using. For example, if you're using **Sanctum**'s token authentication you should add it to **middleware**:
```
<?php

return [
    'middleware' => ['auth:sanctum'],
    'notificationEmails' => []
];
```
### Language files
You can modify or add new language files to adapt the package's locale to your needs. Language files are copied in the **resources** files:
```
resources
    | lang
      | en
        | prescription.php
      | es
        | prescription.php
```
To add a new language just copy a **prescription.php** file under its corresponding laguage code folder.
### Email notification
Any changes in the **patient**, **prescription** or **drug** tables are notified via email to the email addresses configured in **prescription.php** configuration file.
```
<?php

return [
    'middleware' => [],
    'notificationEmails' => []
];
```
**notificationEmails** is empty by default, any email addresses that need to be notified can be added as elements of the array:
```
'notificationEmails' => ['example@mail.to']
```
## Use
Once installed your aplication will be extendend with new routes and tables to support creating patients and drug prescriptions, list, update and delete them through an API that can be consumed by an app or website.
### Patient
Once created, patients may have any number of prescriptions.
- POST {{url}}/api/patient

  Creates a new patient with the following parameters
    - name (patient's firstname)
    - lastname (patient's lastname)
    - id_card (unique value, any valid identification)
- PUT {{url}}/api/patient/{{id}}

  Updates an existing patient referencde by {{id}}
    - name (patient's firstname)
    - lastname (patient's lastname)
    - id_card (unique value, any valid identification)
- DELETE {{url}}/api/patient/{{id}}

  Deletes an existing patient referenced by {{id}}
- GET {{url}}/api/patient

  Returns all existing patients 
- GET {{url}}/api/patient/filter

  Returns a fitered list of patients
    - name (patient's firstname)
    - lastname (patient's lastname)
    - id_card (unique value, any valid identification)
- GET {{url}}/api/patient/{{id}}

  Returns a single patient referenced by {{id}}
### Prescription
Once created, prescriptions may have any number of drugs.
- POST {{url}}/api/prescription

  Creates a new prescription with the following parameters
    - patient_id (patient's id)
- PUT {{url}}/api/prescription/{{id}}

  Updates an existing prescription referenced by {{id}}
    - patient_id (patient's id)
- DELETE {{url}}/api/prescription/{{id}}

  Deletes an existing prescription referenced by {{id}}
- GET {{url}}/api/prescription

  Returns all existing prescriptions 
- GET {{url}}/api/prescription/filter

  Returns a fitered list of prescriptions
    - patient_id (patient's id)
- GET {{url}}/api/prescription/{{id}}

  Returns a single prescription referenced by {{id}}
### Drug
- POST {{url}}/api/drug

  Creates a new drug with the following parameters
    - prescription_id (prescriptions's id)
    - name (drug's name)
    - code (drug's code)
    - posology (drug's posology)
- PUT {{url}}/api/drug/{{id}}

  Updates an existing drug referenced by {{id}}
    - prescription_id (prescriptions's id)
    - name (drug's name)
    - code (drug's code)
    - posology (drug's posology)
- DELETE {{url}}/api/drug/{{id}}

  Deletes an existing drug referenced by {{id}}
- GET {{url}}/api/drug

  Returns all existing drugs 
- GET {{url}}/api/drug/filter

  Returns a fitered list of drugs
    - prescription_id (prescriptions's id)
    - name (drug's name)
    - code (drug's code)
    - posology (drug's posology)
- GET {{url}}/api/drug/{{id}}

  Returns a single drug referenced by {{id}}
### Disclamer
This software is intended for educational purpouses, professional use is discouraged without previous modification.
