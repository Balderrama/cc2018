<?php

namespace FrontBundle\Controller;

use FrontBundle\Entity\Contacto;
use FrontBundle\Form\ContactoType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('FrontBundle:Default:index.html.twig');
    }

    public function empresaAction()
    {
        return $this->render('FrontBundle:Default:empresa.html.twig');
    }

    public function productosAction()
    {
        return $this->render('FrontBundle:Default:productos.html.twig');
    }

    public function productoDetalleAction()
    {
        return $this->render('FrontBundle:Default:productoDetalle.html.twig');
    }

    public function serviciosAction()
    {
        return $this->render('FrontBundle:Default:servicios.html.twig');
    }

    public function contactoAction(Request $request)
    {
        $formType = new Contacto();
        $form = $this->createForm(ContactoType::class,$formType);
        $form->handleRequest($request);
        if($form->isValid()){
                        $data = array();
                        $data['nombre'] = $form->get('nombre')->getData();
                        $data['apellido'] = $form->get('email')->getData();
                        $data['telefono'] = $form->get('email')->getData();
                        $data['email'] = $form->get('telefono')->getData();
                        $data['motivo'] = $form->get('mensaje')->getData();
                        $data['mensaje'] = $form->get('mensaje')->getData();
                        $this->sendMail($data);
            return $this->render('FrontBundle:Default:contacto.html.twig',array('formUser'=>$form->createView(),'enviado'=>true));

        }

        return $this->render('FrontBundle:Default:contacto.html.twig',array('formUser'=>$form->createView()));
    }


    public function sendMail($data)
    {


        try {
            // Create the Transport the call setUsername() and setPassword()
            $transport = \Swift_SmtpTransport::newInstance("dime126.dizinc.com", 465,"ssl")
                ->setUsername("envios@zipvisual.com")
                ->setPassword("enviosZip15");
            // Create the Mailer using your created Transport
            $mailer = \Swift_Mailer::newInstance($transport);
            $message = \Swift_Message::newInstance("Contacto - Compucompentes")
                ->setFrom(array("envios@zipvisual.com" => "De"))
                ->setTo(array("francisco@zipvisual.com"=> "Para"))
                ->setCharset('UTF-8')
                ->setContentType('text/html')
                ->setBody($this->renderView("FrontBundle:Default:_mensaje.html.twig",$data));

            $mailer->send($message);
        } catch (\Exception $e) {
            throw new \Error($e->getMessage());
            //  return new JsonResponse(array("estado" + $e->getMessage() =>"error"));
        }

        return new JsonResponse(array("estado"=>"success"));


    }
}
