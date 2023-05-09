# **API-TOKEN**

Este experimento fue realizado para aprender a crear un API usando Laravel Sanctum para la autenticación.

Fue hecho siguiendo el tutorial [API en Laravel 10 | Autenticación Sanctum](https://www.youtube.com/watch?v=fsiPXKzcH2M)

## **Configuración de entorno**

en mi caso utilice un vhost configurado en mis Hosts y Apache con la dirección **_api-token.test_** redirigiendo a la carpeta **_public_** del proyecto

## **Modelos y relaciones**

### User

Se utiliza para guardar la información de los usuarios de la aplicación es el por defecto que nos ofrece Laravel

### Department

Se encarga de manejar la information de los departamentos realizando **CRUD** en la base de datos.Tiene una relación **1-n** con el modelo `Employee` esto se especifica en el siguiente método

```php
public function employees()
{
    return $this->hasMany(Employee::class);
}
```

Aparte de ello se esta manejando softDelete para lo cual se agrego en la migración dicho campo

```php
$table->softDeletes();
```

Y en el Modelo se indica que se debe manejar con softDelete usando la declaración:

```php
class Employee extends Model
{
    use SoftDeletes;
}
```

También se están guardando registros de creación y actualización. Por ello para enviar la información limpia en la API utilizamos el atributo `$hidden` del Modelo para especificar los campos que no serán enviados en las respuestas

```php
protected $hidden = [
    "created_at",
    "updated_at",
    "deleted_at"
];
```

### Employee

Se encarga de manejar la information de los empleados realizando **CRUD** en la base de datos.Tiene una relación **n-1** con el modelo `Department` esto se especifica en el siguiente método

```php
public function department()
{
    return $this->belongsTo(Department::class);
}
```

Al igual que el Modelo `Department` en este se esta utilizando softDelete y timeStamps por lo que se hace el mismo proceso que en el modelo `Department` para ocultar dichos campos en las respuestas

## **Routes**

Los modelos `Department` y `Employee` se están manejando como Recursos por lo cual se definen con `Route::resource()`. Estas rutas están protegidas por autenticación por lo cual no se puede acceder a ellas sin una sesión de usuario.

Aparte de ello se definieron las siguientes rutas para la creación, login y logout de usuarios

|   Verb   | Route               | Controller       | Action     |
| :------: | ------------------- | ---------------- | ---------- |
| **post** | "api/auth/register" | `AuthController` | _create()_ |
| **post** | "api/auth/login"    | `AuthController` | _login()_  |
| **get**  | "api/auth/logout"   | `AuthController` | _logout()_ |

de igual manera se puede utilizar el comando de artisan `route:list` para consultar todas las rutas definidas en la aplicación

## **Requests and Responses**

### **Registro de usuario**

Request:

-   Route: "api/auth/register"
-   Header: Accept application/json
-   Auth: None
-   Body:

```json
{
    "name": "Some Name",
    "email": "example@example.com",
    "password": "12345abcde"
}
```

Response:

```json
{
    "status": true,
    "message": "User created successfully",
    "token": "5|PrL5GaDvl2Pc3KRjmtsMFZtSfYlQAMrm8wr5jRsP"
}
```

### **Login**

Request:

-   Route: "api/auth/login"
-   Header: Accept application/json
-   Auth: None
-   Body:

```json
{
    "email": "example@example.com",
    "password": "12345abdce"
}
```

Response:

```json
{
    "status": true,
    "message": "User logged in successfully",
    "data": {
        "id": 2,
        "name": "Some Name",
        "email": "example@example.com",
        "email_verified_at": null
    },
    "token": "6|z2KHghmvCBcUmzXhwJlZFQ46DMQ1e2PjK90Ho6Jk"
}
```

### **Logout**

Description: Unset all tokens of the user

Request:

-   Route: "api/auth/logout"
-   Header: Accept application/json
-   Auth: Token
-   Body; None

Response:

```json
{
    "status": true,
    "message": "User logged out successfully"
}
```

### List Departments

Description: Give you all departments in database

Request:

-   Route: "api/departments"
-   Header: Accept application/json
-   Auth: Token
-   Body; None

Response:

```json
{
    "status": true,
    "data": [
        {
            "id": 1,
            "name": "Construction Driller"
        },
        {
            "id": 2,
            "name": "Freight and Material Mover"
        }
        // other departments...
    ]
}
```

### Template

Description:

Request:

-   Route: "api/"
-   Header: Accept application/json
-   Auth: Token
-   Body; None

Response:

```json
{}
```
