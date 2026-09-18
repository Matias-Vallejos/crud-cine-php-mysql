<?php 

class Pelicula {
    private $id;
    private $titulo;
    private $director;
    private $genero;
    private $poster;
    private $duracion;
    private $sinopsis;
    private $horarios;
    private $anio;

    public function nueva($pdo)
    {
        $sql = "INSERT INTO `peliculas` (`id`, `titulo`, `director`, `genero`, `poster`, `duracion`, `sinopsis`, `horarios`, `anio`) VALUES (NULL, :titulo, :director, :genero, :poster, :duracion, :sinopsis, :horarios, :anio)";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ":titulo" => $this->titulo,
            ":director"=> $this->director,
            ":genero"=> $this->genero,
            ":poster"=> $this->poster,
            ":duracion"=> $this->duracion,
            ":sinopsis"=> $this->sinopsis,
            ":horarios"=> $this->horarios,
            ":anio"=> $this->anio
        ]);
    }
    
    public function borrar($pdo)
    {   
        if(!empty($this->poster) && file_exists("../imagenes/posters/"."$this->poster") && !unlink("../imagenes/posters/"."$this->poster")){
            throw new Exception;
        }

        $sql = "DELETE FROM `peliculas` WHERE `peliculas`.`id` = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ":id" => $this->id
        ]);
    }
    public function modificar($pdo){
            
        $sql = "UPDATE `peliculas` SET `titulo` = :titulo, `director` = :director, `genero` = :genero, `poster`= :poster, `duracion` = :duracion, `sinopsis` = :sinopsis, `horarios` = :horarios, `anio`= :anio WHERE `peliculas`.`id` = :id;";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ":titulo" => $this->titulo,
            ":director"=> $this->director,
            ":genero"=> $this->genero,
            ":poster"=> $this->poster,
            ":duracion"=> $this->duracion,
            ":sinopsis"=> $this->sinopsis,
            ":horarios"=> $this->horarios,
            ":anio"=> $this->anio,
            ":id"=>$this->id
        ]);
    }
    

    public function getId(){
        return $this->id;
    }
    public function getTitulo(){
        return $this->titulo;
    }
    public function setTitulo($titulo){
        $this->titulo=$titulo;
    }
    public function getDirector(){
        return $this->director;
    }
    public function setDirector($director){
        $this->director=$director;
    }
    public function getGenero(){
        return $this->genero;
    }
    public function setGenero($genero){
        $this->genero=$genero;
    }
    public function getPoster(){
    $rutaPosters = "imagenes/posters/" . $this->poster;

    if (!empty($this->poster) && file_exists($rutaPosters)) {
        return $rutaPosters;
    }
    return "imagenes/posters/default.png";
    }
    public function setPoster($poster){
        $this->poster=$poster;
    }
    public function getDuracion($flag = true){
        if ($flag){
        $horas = floor($this->duracion/60);
        $minutos = $this->duracion%60;
        return $horas . "h " . $minutos . "m";
        }
        return $this->duracion;
    }
    public function setDuracion($duracion){
        $this->duracion=$duracion;
    }
    public function getSinopsis($flag = true){
        if ($flag){
            return substr($this->sinopsis, 0, 100) . "...";
    }
        return $this->sinopsis;
    }
    public function setSinopsis($sinopsis){
        $this->sinopsis=$sinopsis;
    }
    public function getHorarios(){
        return $this->horarios;
    }
    public function setHorarios($horarios){
        $this->horarios=$horarios;
    }
    public function getAnio(){
        return $this->anio;
    }
    public function setAnio($anio){
        $this->anio=$anio;
    }

    public function getPeliculaPaginado ($pagina, $cantidad, $pdo){
        $offset = ($pagina-1) * $cantidad;
        $sql = "SELECT * FROM peliculas LIMIT $cantidad OFFSET $offset";
        $stmt = $pdo->prepare($sql);
        $stmt -> execute();        
        $peliculas = $stmt -> fetchAll(PDO::FETCH_CLASS, Pelicula::class);
        return $peliculas;
    }

    public function getPeliculaPorId ($pdo, $id) {
        $sql = "SELECT * FROM peliculas WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt -> execute([":id"=>$id]);
        $stmt ->setFetchMode(PDO::FETCH_CLASS, Pelicula::class);
        $pelicula = $stmt->fetch();
        return $pelicula;
    }

    public function getPeliculas ($pdo){
        $sql = "SELECT * FROM peliculas";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $peliculas = $stmt->fetchAll(PDO::FETCH_CLASS, Pelicula::class);
        return $peliculas;
    }
}
?>