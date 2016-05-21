<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Task;
use AppBundle\Form\Type\CategoryType;
use AppBundle\Form\Type\TaskTypeII;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);
    }

    /**
     * @Route("default/new")
     */
    public function newAction(Request $request)
    {
        // just setup a fresh $task object (remove the dummy data)
        $task = new Task();

        /*

        $form = $this->createFormBuilder($task)
            ->add('task', null, array('attr' => array('maxlength' => 4)))
            ->add('dueDate', DateType::class, array(
                'label' => 'Due date:',
                'required' => false
            ))
            ->add('save', SubmitType::class, array('label' => 'Create Task','attr'=>array('formnovalidate'=>'formnovalidate')))
            ->add('saveAndAdd', SubmitType::class, array('label' => 'Save and Add'))
            ->getForm();
        */


        $form = $this->createForm(TaskTypeII::class, $task);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $nextAction = $form->get('saveAndAdd')->isClicked()
                ? 'task_new'
                : 'task_success';

            return $this->redirectToRoute($nextAction);
        }

        return $this->render('default/new.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("default/category")
     */
    public function categoryAction(Request $request)
    {
        // just setup a fresh $task object (remove the dummy data)
        $task = new Task();
        
        $form = $this->createForm(TaskTypeII::class, $task);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $nextAction = $form->get('saveAndAdd')->isClicked()
                ? 'task_new'
                : 'task_success';

            return $this->redirectToRoute($nextAction);
        }

        return $this->render('default/new.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
