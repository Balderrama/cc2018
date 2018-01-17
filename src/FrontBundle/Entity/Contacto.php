<?php
    namespace FrontBundle\Entity;
    use Symfony\Component\Validator\Constraints as Assert;
/**
 * Created by PhpStorm.
 * User: Balderrama
 * Date: 16/08/2017
 * Time: 12:59
 */
class Contacto
{
    /*
     * Assert\NotBlank()
     */
    protected $nombre;

    /*
     * Assert\NotBlank()
     */
    protected $apellido;

    /*
     * Assert\NotBlank()
     */
    protected $telefono;


    /*
     * Assert\NotBlank()
     * Assert\Email();
     */
    protected $email;
    /*
     * Assert\NotBlank()
     */
    protected $motivo;
    /*
     * Assert\NotBlank()
     */
    protected $mensaje;

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * @param mixed $apellido
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    /**
     * @return mixed
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * @param mixed $telefono
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getMotivo()
    {
        return $this->motivo;
    }

    /**
     * @param mixed $motivo
     */
    public function setMotivo($motivo)
    {
        $this->motivo = $motivo;
    }

    /**
     * @return mixed
     */
    public function getMensaje()
    {
        return $this->mensaje;
    }

    /**
     * @param mixed $mensaje
     */
    public function setMensaje($mensaje)
    {
        $this->mensaje = $mensaje;
    }



}