Portfolio made with HTML, CSS and JavaScript whose function is to allow the user once logged to create their web portfolio with the different components.
All information is stored in an SQL database and PHP is also used.
The design part of the page uses the Bootstrap framework.


-- Structure --


htdocs/
├── controllers/
│   ├── UserController.php          
│   └── PortfolioController.php     
│
├── models/
│   ├── User.php                     
│   └── Portfolio.php              
│
├── views/
│   ├── auth/
│   │   ├── login.php                
│   │   └── register.php             
│   ├── portfolio/
│   │   ├── portfolio_form.php      
│   │   └── view_portfolio.php      
│   ├── templates/
│   │   └── header.php              
│   └── templates/
│       └── footer.php               
│
├── assets/
│   ├── css/
│   │   └── sign-in.css             
│   ├── js/
│   │   ├── color-modes.js           
│   │   └── main.js                  
│   └── images/
│       └── icons8-trifuerza.png     
│
├── config/
│   └── database.php                 
│
├── index.php                       
├── favicon/
│   └── favicon.ico                  
├── sql/
│   └── mi_portfolio.sql            
└── README.md                        
