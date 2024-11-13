Portfolio made with HTML, CSS and JavaScript whose function is to allow the user once logged to create their web portfolio with the different components.
All information is stored in an SQL database and PHP is also used.
The design part of the page uses the Bootstrap framework.


-- Structure --


htdocs/
├── controllers/
│   ├── UserController.php          # Controlador para la autenticación del usuario
│   └── PortfolioController.php      # Controlador para gestionar el portafolio
│
├── models/
│   ├── User.php                     # Modelo de usuario (clase User)
│   └── Portfolio.php                # Modelo de portafolio (clase Portfolio)
│
├── views/
│   ├── auth/
│   │   ├── login.php                # Vista para la página de inicio de sesión
│   │   └── register.php             # Vista para la página de registro
│   ├── portfolio/
│   │   ├── portfolio_form.php       # Formulario de edición del portafolio
│   │   └── view_portfolio.php       # Vista de visualización de portafolio
│   ├── templates/
│   │   └── header.php               # Encabezado común para las vistas
│   └── templates/
│       └── footer.php               # Pie de página común para las vistas
│
├── assets/
│   ├── css/
│   │   └── sign-in.css              # Estilos CSS
│   ├── js/
│   │   ├── color-modes.js           # Scripts de color
│   │   └── main.js                  # Otros scripts de JavaScript
│   └── images/
│       └── icons8-trifuerza.png     # Imágenes y favicon
│
├── config/
│   └── database.php                 # Configuración de la base de datos
│
├── index.php                        # Página principal o punto de entrada
├── favicon/
│   └── favicon.ico                  # Icono de la página
├── sql/
│   └── mi_portfolio.sql             # Script SQL para crear las tablas en la base de datos
└── README.md                        # Documentación del proyecto
