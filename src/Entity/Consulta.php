<?php

namespace App\Entity;

use App\Repository\ConsultaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ConsultaRepository::class)
 * @ORM\HasLifecycleCallbacks()
 */
class Consulta
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $tareas;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $comentario1;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $documento;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $comentario2;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $academico;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $comentario3;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $comision;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $comentario4;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $fecha;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isTareas(): ?bool
    {
        return $this->tareas;
    }

    public function setTareas(?bool $tareas): self
    {
        $this->tareas = $tareas;

        return $this;
    }

    public function getComentario1(): ?string
    {
        return $this->comentario1;
    }

    public function setComentario1(?string $comentario1): self
    {
        $this->comentario1 = $comentario1;

        return $this;
    }

    public function isDocumento(): ?bool
    {
        return $this->documento;
    }

    public function setDocumento(?bool $documento): self
    {
        $this->documento = $documento;

        return $this;
    }

    public function getComentario2(): ?string
    {
        return $this->comentario2;
    }

    public function setComentario2(?string $comentario2): self
    {
        $this->comentario2 = $comentario2;

        return $this;
    }

    public function isAcademico(): ?bool
    {
        return $this->academico;
    }

    public function setAcademico(?bool $academico): self
    {
        $this->academico = $academico;

        return $this;
    }

    public function getComentario3(): ?string
    {
        return $this->comentario3;
    }

    public function setComentario3(?string $comentario3): self
    {
        $this->comentario3 = $comentario3;

        return $this;
    }

    public function isComision(): ?bool
    {
        return $this->comision;
    }

    public function setComision(?bool $comision): self
    {
        $this->comision = $comision;

        return $this;
    }

    public function getComentario4(): ?string
    {
        return $this->comentario4;
    }

    public function setComentario4(?string $comentario4): self
    {
        $this->comentario4 = $comentario4;

        return $this;
    }

    /**
     * @ORM\PrePersist
     */
    public function setFechaValue(): void
    {
        $this->fecha = new \DateTimeImmutable();
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(?\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }
}
