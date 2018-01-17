<?php
 namespace FrontBundle\Form;
 use Symfony\Component\Form\AbstractType;
 use Symfony\Component\Form\Extension\Core\Type\EmailType;
 use Symfony\Component\Form\Extension\Core\Type\SubmitType;
 use Symfony\Component\Form\Extension\Core\Type\TextType;
 use Symfony\Component\Form\Extension\Core\Type\TextareaType;
 use Symfony\Component\Form\FormBuilderInterface;


 class ContactoType extends  AbstractType
 {
     public function  buildForm(FormBuilderInterface $builder, array $options)
     {
        $builder->add('nombre',TextType::class,array("attr"=>array("class"=>"field"),'label'=>'Nombre:'))->getForm();
        $builder->add('apellido',TextType::class,array("attr"=>array("class"=>"field"),'label'=>'Apellido:'))->getForm();
        $builder->add('telefono',TextType::class,array("attr"=>array("class"=>"field"),'label'=>'Teléfono o Celular:'))->getForm();
         $builder->add('email',EmailType::class,array("attr"=>array("class"=>"field"),'label'=>'Correo Electrónico:'))->getForm();
         $builder->add('motivo',TextType::class,array("attr"=>array("class"=>"field"),'label'=>'Motivo de contacto:'))->getForm();
         $builder->add('mensaje',TextareaType::class,array("attr"=>array("class"=>"field message"),'label'=>'Mensaje:'))->getForm();
        $builder->add('submit',SubmitType::class,array("attr"=>array("class"=>"send"),'label'=>'Enviar'));
     }
 }
