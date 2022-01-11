# Estandares de Laravel

## Articulo 1 : Convenios de nombres

Estas son las convenciones de nomenclatura de PHP.

### 01.01 Controlador

- El nombre debe de estar en **singular**.
- Debe de usarse **PascalCase**.

| **Como deberia** | **Como NO deberia** |
| -- | -- |
| `CustomerController.php` | `CustomersController.php` |

### 01.02 Rutas

#### 01.02.01 URL de la ruta

- La URL debe estar en **plural**.
- Puede usarse **kebab-case** si hay dos palabras en una sola parte.

| **Como deberia** | **Como NO deberia** |
| -- | -- |
| `/customers/25` | `customer/25` |
| `/customers/password-reset` | `/customers/password_reset` |
| `"` | `/customers/passwordReset` |

#### 01.02.02 Nombre de la ruta

- Deberia de usar **snake_case** con notacion de puntos.
- Es mejor usar el mismo nombre como en la URL.

| **Como deberia** | **Como NO deberia** |
| -- | -- |
| `->('customers.view')` | `->('customers-view')` |
| `"` | `->('customers_view')` |
| `->('customers.password_reset')` | `->('customers.password.reset')` |
| `"` | `->('customers.password-reset')` |
| `"` | `->('customer-password-reset')` |

### 01.03 Relacionado con la base de datos

#### 01.03.01 Migracion

- Debe usar un nombre relacionado a lo que se va a hacer con **snake_case**.

| **Como deberia** | **Como NO deberia** |
| -- | -- |
| `2021_03_19_033513_create_customers_table.php` | `2021_03_19_033513_customers.php` |
| `2021_03_19_033513_add_image_id_to_customers_table.php` | `2021_03_19_033513_add_image_id_customers.php` |
| `2021_03_19_033513_drop_image_id_from_customers_table.php` | `2021_03_19_033513_remove_image_id_customers.php` |

#### 01.03.02 Tabla

- El nombre de la tabla debe estar en **plural**.
- Debe usar **snake_case**.

| **Como deberia** | **Como NO deberia** |
| -- | -- |
| `customers` | `customer` |
| `cart_items` | `cartItems`, `CartItems`, `Cart_item` |

#### 01.03.03 Tabla pivote

- El nombre de la tabla debe ser en **singular**.
- Debe usar **snake_case**.
- Los nombres deben estar en orden **alfabetico**.

| **Como deberia** | **Como NO deberia** |
| -- | -- |
| `course_student` | `student_courses`, `students_courses`, `course_students` |

#### 01.03.04 Columnas de la tabla

- Debe usar **snake_case**.
- NO debe usarse el nombre de la tabla para alguna columna.
- El nombre legible es una buena practica.

| **Como deberia** | **Como NO deberia** |
| -- | -- |
| `first_name` | `user_first_name`, `FirstName` |

#### 01.03.05 Clave externa (Foreign key)

- Debe usarse **snake_case**.
- Debe usar un nombre de tabla **singular** con el prefijo **id**.

| **Como deberia** | **Como NO deberia** |
| -- | -- |
| `course_id` | `courseId`, `id`, `courses_id`, `id_course` |

#### 01.03.06 Clave primaria (Primary key)

- Solo se usa el nombre **id**.

| **Como deberia** | **Como NO deberia** |
| -- | -- |
| `id` | `custom_name_id` |

#### 01.03.07 Modelo

- El nombre del modelo debe estar en **singular**.
- Debe usar **PascalCase**.
- El nombre del modelo debe ser una forma singular o un nombre de tabla.

| **Como deberia** | **Como NO deberia** |
| -- | -- |
| `Customer` | `Customers`, `customer` |

#### 01.03.08 Modelo de relaciones individuales [Has One, Belongs To]

- El nombre del metodo debe estar en **singular**.
- Debe usar **camalCase**.

| **Como deberia** | **Como NO deberia** |
| -- | -- |
| `studentCourse` | `StudentCourse`, `student_course`, `studentCourses` |

#### 01.03.09 Todos los demas modelos, relaciones y metodos [Has Many,other]

- El nombre del metodo debe estar en **plural**.
- Debe usar **camalCase**.

| **Como deberia** | **Como NO deberia** |
| -- | -- |
| `cartItems` | `CartItem`, `cart_item`, `cartItem` |

### 01.04 Funciones

- Debe usar **snake_case**.

| **Como deberia** | **Como NO deberia** |
| -- | -- |
| `show_route` | `showRoute`, `ShowRoute` |

### 01.05 Metodos en los controladores

- Debe usar **camelCase**.
- Debe usar palabras sueltas relacionadas con la accion.

| **Como deberia** | **Como NO deberia** |
| -- | -- |
| `store` | `saveCustomer` |
| `show` | `viewCustomer` |
| `destroy` | `deleteCustomer` |
| `index` | `allCustomersPage` |

### 01.06 Variables

- Debe usar **camelCase**.
- Debe usar palabras legibles que describan su valor.

| **Como deberia** | **Como NO deberia** |
| -- | -- |
| `$customerMessages` | `$CustomerMessages`, `$customer_messages`, `$c_messages`, `$c_m` |

### 01.07 Coleccione

- Debe describir su valor.
- Debe ser **plural**.

| **Como deberia** | **Como NO deberia** |
| -- | -- |
| `$verifiedCustomers = $customer->verified()->get()` | `$verified`, `$data`, `$resp`, `$v_c` |

### 01.08 Objeto

- Debe describir su valor.
- Debe ser **singular**.

| **Como deberia** | **Como NO deberia** |
| -- | -- |
| `$verifiedCustomer = $customer->verified()->first()` | `$verified`, `$data`, `$resp`, `$v_c` |

### 01.09 Configuraciones

- Debe usar **snake_case**.
- Debe describir su valor.

| **Como deberia** | **Como NO deberia** |
| -- | -- |
| `comments_enabled` | `CommentsEnabled`, `comments`, `c_enabled`, `ce` |

### 01.10 Rasgos

- Debe ser **adjetivo**.

| **Como deberia** | **Como NO deberia** |
| -- | -- |
| `Utility` | `UtilityTrait`, `Utilities` |

### 01.11 Interfaz

- Debe ser un adjetivo o un sustantivo.

| **Como deberia** | **Como NO deberia** |
| -- | -- |
| `Authenticable` | `AuthenticationInterface`, `Authenticate` |
