<?php

namespace App\Controller;

use App\Entity\Consulta;
use App\Form\ConsultaType;
use App\Repository\ConsultaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/consulta")
 */
class ConsultaController extends AbstractController
{
    /**
     * @Route("/", name="app_consulta_index", methods={"GET"})
     */
    public function index(): Response
    {
        return $this->render('consulta/index.html.twig', []);
    }

    /**
     * @Route("/resultados", name="app_consulta_resultados", methods={"GET"})
     */
    public function resultados(ConsultaRepository $consultaRepository): Response
    {

        $consultas = $consultaRepository->findAll();

        $votos = [0, 0, 0, 0, 0, 0, 0, 0];

        $si1 = $si2 = $si3 = $si4 = 0;
        $no1 = $no2 = $no3 = $no4 = 0;

        foreach($consultas as $consulta) {
             if($consulta->isTareas())
                 $votos[0]++;
             else
                 $votos[1]++;

            if($consulta->isDocumento())
                $votos[2]++;
            else
                $votos[3]++;

            if($consulta->isAcademico())
                $votos[4]++;
            else
                $votos[5]++;

            if($consulta->isComision())
                $votos[6]++;
            else
                $votos[7]++;
        }

        return $this->render('consulta/resultados.html.twig', [
            'consultas' => $consultas,
            'votos' => $votos,
        ]);
    }

    /**
     * @Route("/comentarios/{pregunta}", name="app_consulta_comentarios", methods={"GET"}, requirements={"pregunta"="\b[0-4]\b"})
     */
    public function comentarios(int $pregunta, ConsultaRepository $consultaRepository): Response
    {
        $consultas = $consultaRepository->findAll();

        return $this->render('consulta/comentarios.html.twig', [
            'pregunta' => $pregunta,
            'consultas' => $consultas,
        ]);
    }


    /**
     * @Route("/new", name="app_consulta_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ConsultaRepository $consultaRepository): Response
    {
        $consultum = new Consulta();
        $form = $this->createForm(ConsultaType::class, $consultum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $consultaRepository->add($consultum, true);

            return $this->redirectToRoute('app_consulta_resultados', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('consulta/new.html.twig', [
            'consultum' => $consultum,
            'form' => $form,
        ]);
    }
}
