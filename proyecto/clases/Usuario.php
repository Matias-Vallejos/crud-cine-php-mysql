<?php
class Usuario
{
    private $id;
    private $email;
    private $nombre;
    private $apellido;
    private $fechaNacimiento;
    private $contrasenia;
    private $rol;
    private $entradasGratis;

    public function getUsuarios($pdo)
    {
        $sql = "SELECT * FROM usuarios";
        $stmt = $pdo->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, Usuario::class);
        $stmt->execute();
        $usuarios = $stmt->fetchAll();

        return $usuarios;
    }

    public function getUsuarioByEmail($pdo, $email)
    {
        $sql = "SELECT * FROM usuarios WHERE email = :email ";
        $stmt = $pdo->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, Usuario::class);
        $stmt->execute([":email"=>$email]);
        $usuario = $stmt->fetch();

        return $usuario;
    }

    public function registrar($pdo)
    {
        $sql = "INSERT INTO `usuarios` (`id`, `email`, `nombre`, `apellido`, `fechaNacimiento`, `contrasenia`, `rol`, `entradasGratis`) VALUES (NULL, :email, :nombre, :apellido, :fechaNacimiento, :contrasenia, 0, 0)";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ":email" => $this->email,
            ":nombre"=> $this->nombre,
            ":apellido"=> $this->apellido,
            ":fechaNacimiento"=> $this->fechaNacimiento,
            ":contrasenia"=> $this->contrasenia
        ]);
    }
    public function cambiarRol($pdo)
    {
        $sql = "UPDATE `usuarios` SET `rol` = :rol, `entradasGratis` = :entradasGratis WHERE `usuarios`.`id` = :id;";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ":rol" => $this->rol,
            ":entradasGratis" => $this->entradasGratis,
            ":id"=> $this->id
        ]);
    }
    public function actualizarDatosPersonales($pdo)
    {
        $sql = "UPDATE `usuarios` SET `nombre` = :nombre, `email` = :email, `apellido` = :apellido, `fechaNacimiento` = :fechaNacimiento, `contrasenia` = :contrasenia WHERE `usuarios`.`id` = :id;";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ":email" => $this->email,
            ":nombre" => $this->nombre,
            ":apellido" => $this->apellido,
            ":fechaNacimiento" => $this->fechaNacimiento,
            ":contrasenia"=> $this->contrasenia,
            ":id"=>$this->id
        ]);
    }


    public function getId(){
        return $this->id;
    }
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email= $email;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        $this->nombre= $nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function setApellido($apellido){
        $this->apellido= $apellido;
    }
    public function getFechaNacimiento(){
        return $this->fechaNacimiento;
    }
    public function setFechaNacimiento($fechaNacimiento){
        $this->fechaNacimiento= $fechaNacimiento;
    }
    public function getContrasenia(){
        return $this->contrasenia;
    }
    public function setContrasenia($contrasenia){
        $this->contrasenia= $contrasenia;
    }
    public function getRol(){
        return $this->rol;
    }
    public function setRol($rol){
        $this->rol= $rol;
    }
    public function getEntradasGratis(){
        return $this->entradasGratis;
    }
    public function setEntradasGratis($entradasGratis){
        $this->entradasGratis= $entradasGratis;
    }
}
?>