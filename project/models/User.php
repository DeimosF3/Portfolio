class User {
    private $db;
    private $id;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=portfolio_db', 'root', '');
    }

    public function login($email, $password) {
        $stmt = $this->db->prepare('SELECT * FROM usuarios WHERE email = :email');
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $this->id = $user['id'];
            return true;
        }
        return false;
    }

    public function getId() {
        return $this->id;
    }
}
