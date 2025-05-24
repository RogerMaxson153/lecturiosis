# 🧑‍💻 Proyecto: Lecturiosis

Este proyecto es una actividad práctica donde trabajarás con clases en PHP. El objetivo es que clones este repositorio, trabajes localmente realizando la actividad, y luego subas tu trabajo a tu propio repositorio para entregar la tarea en Google Classroom.

---

## 📦 Requisitos

- Tener instalado [Git](https://git-scm.com) ✅
- Tener instalado PHP **versión 8.3 o superior** ✅
- Tener un editor de código (recomendado: [Visual Studio Code](https://code.visualstudio.com)) ✅

---

## 🚀 Instrucciones

### 1. Clona este repositorio

En la terminal de windows (powershell, gitbash,etc) escribe

```
git clone https://github.com/JulitoM3/lecturiosis.git
cd lecturiosis

```

---

### 2. Crea tu propio repositorio

1. Entra a [GitHub](https://github.com) y crea un nuevo repositorio con el nombre `lecturiosis`.
2. No inicialices con README, `.gitignore` ni licencia.
3. Copia la URL del nuevo repositorio.

---

### 3. Conecta tu carpeta local con tu repositorio

En la terminal de windows (powershell, gitbash,etc) escribe

```
git remote remove origin
git remote add origin https://github.com/TU-USUARIO/lecturiosis.git
```

---

### 4. Actividad

1. Implementa **getters y setters** en `User.php` para los atributos privados.
2. Crea una interfaz `ModelInterface` con los siguientes métodos:

- `save()`
- `delete()`
- `findById($id)`

3. Crea una clase base `Model` que implemente `ModelInterface`. Simula su comportamiento con `echo` o estructuras básicas de PHP.
4. Haz que la clase `User` **herede** de `Model` y agregue sus propios atributos (`id`, `name`, `email`, etc.).
5. En el controlador `IndexController.php has lo siguiente`:

- Instancia un objeto `User`.
- Asignes valores con los setters.
- Llamen los métodos `save()`, `findById()`, y `delete()`.

---

### 5. Haz tu primer commit

En la terminal de windows (powershell, gitbash,etc) escribe

```
git add .
git commit -m "Termine la actividad"

```

---

### 6. Sube tu código a GitHub

En la terminal de windows (powershell, gitbash,etc) escribe

```
git push -u origin main
```

> Si usas `master` como rama por defecto, reemplaza `main` por `master`.

---

## ✅ Entrega

1. Copia la URL de tu repositorio (de tu cuenta).
2. Entra a Google Classroom.
3. Busca la tarea correspondiente y **entrega el enlace a tu repositorio de GitHub**.

---

## 📂 Estructura sugerida de la actividad

<pre>
App/ 
└── models/ 
    ├── ModelInterface.php ← Interfaz con métodos comunes 
    ├── Model.php ← Clase base que implementa la interfaz 
    └── User.php ← Clase que hereda de Model
    </pre>

## 🧠 Criterios de evaluación

<pre>
| Criterio                                                             | Puntos      |
|----------------------------------------------------------------------|-------------|
| Getters y setters en `User.php`                                      | 20 puntos   |
| Interfaz `ModelInterface` definida correctamente                     | 15 puntos   |
| Clase `Model` implementa los métodos de la interfaz                  | 20 puntos   |
| Herencia correcta de `Model` en `User`                               | 15 puntos   |
| Implementacion en `IndexController.php`.                             | 20 puntos   |
| Repositorio organizado y entregado correctamente                     | 10 puntos   |

**Total: 100 puntos**  
**Mínimo para acreditar la tarea: 70 puntos**

</pre>

---

## 💡 Tips

- No es necesario usar una base de datos real, puedes simularla.
- Usa `private` para atributos y `public` para métodos.
- Sigue las buenas prácticas: nombres claros, código ordenado y uso correcto de `namespace`.

---
